<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Machine;
use App\City;
use App\State;
use App\Country;
use App\Department;
use App\Division;
use App\Errorlogs;
use App\GoalsLogs;
use App\WinLogs;
use App\MoneyLogs;
use App\MachineType;
use App\MachineModel;
use App\Site;
use App\ErrorlogsHistory;
use Carbon\Carbon;
use Input;
use App\Http\Resources\UserCollection;


class MachineErrorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);

        $online = Machine::where('status', '1')->count();
        $offline = Machine::where('status', '0')->count();
        $ttlMachines = $online + $offline; 
        
        $pass_data = array(
            'online' => $online,
            'offline' => $offline,
            'total' => $ttlMachines,
            'error' => $this->statusCount2(1),
            'warning' => $this->statusCount2(2),
            'notice' => $this->statusCount2(3),
            'logs' => $this->errorlogs()     
        );
      
        return view('machine-error-reports/index', [ 'data' => $pass_data, 'permit' => $var['permit'] ]);        
    }

    public function errorlogs()
    {
        $today = date("Y-m-d"); 
        $data = DB::table('errorlogs')
                    ->select(DB::raw('distinct machine_id, error, type'))
                    ->whereDate('created_at', '=', Carbon::today())
                    ->where('status','=','1')
                    ->get()->toArray(); 

        $mids = '';        
        foreach($data as $logs){            
            $mids .=$logs->machine_id.",";
        }
       
        $explode = explode(',',$mids);       
        $machines = DB::table('machines')
                    ->select( 'machines.id as machine_id','machine_models.machine_model as machine_model', 'machine_types.machine_type as machine_type',
                            DB::raw("CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"),
                            'sites.site_name as site')                   
                    ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                    ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                    ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                    ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                    ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                    ->leftJoin('area', 'sites.area_id', '=', 'area.id') 
                    ->whereIn('machines.status', ['1','0'])
                    ->whereIn('machines.id', $explode)
                    ->whereDate('machine_reports.last_played', '=', Carbon::today())
                    ->get();

        $logs = array(
            'errors' => $data,
            'machines' => $machines
        );
        return $logs;
    }
    
     public function get_errorlist()
    {           
        
        $check = Input::get('id'); 
        $machinelogs = '';
         if($check !=''):
            $data= $_GET['id'];
            $type= $_GET['type'];
            $machinelogs = DB::table('machines')
                ->select('errorlogs.created_at as date_created', 'errorlogs.id as error_id','sites.site_name as site_name'
                        , 'sites.street as street', 'sites.suburb as suburb', 'state.state_code as statecode', 'machine_models.machine_model as machine_model'
                        , 'machine_types.machine_type as machine_type', 'machines.machine_serial_no as serial_no', 'machines.id as machine_id'
                        ,'machines.comments as comments', 'errorlogs.log_id as log_id', 'errorlogs.error as error', 'errorlogs.type as errortype', 'errorlogs.id as error_id'
                        ,'errorlogs.resolve_by as resolve_by','errorlogs.resolve_date as resolve_date'
                        ,DB::raw("CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"))
                ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
                ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                ->leftJoin('state', 'sites.state', '=', 'state.id')      
                ->where('machines.status','!=','1111')  
                ->where('errorlogs.status','=','1')
                ->where('errorlogs.type','=', $type)
                ->where('errorlogs.machine_id','=', $data)
                ->whereDate('errorlogs.created_at', '=', Carbon::today());    
            $machinelogs = $machinelogs->get()->toArray(); 
         endif;
        
        //$data = array('data' => $machinelogs);
        return $machinelogs;
    }

    public function error_reports_api()
    {   
        
        $machinelogs = DB::table('machines')
                ->select('errorlogs.created_at as date_created','machine_models.machine_model as machine_model', 'machine_types.machine_type as machine_type',
                        DB::raw("CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"),'errorlogs.type as errortype','errorlogs.error as error',
                        'sites.site_name as site_name')
                /*->select('machines.*', 'errorlogs.created_at as date_created', 'errorlogs.id as error_id','sites.site_name as site_name'
                        , 'sites.street as street', 'sites.suburb as suburb', 'state.state_code as statecode', 'machine_models.machine_model as machine_model'
                        , 'machine_types.machine_type as machine_type', 'machines.machine_serial_no as serial_no', 'machines.id as machine_id'
                        ,'machines.comments as comments', 'errorlogs.log_id as log_id', 'errorlogs.error as error', 'errorlogs.type as errortype', 'errorlogs.id as error_id'
                        ,'errorlogs.resolve_by as resolve_by','errorlogs.resolve_date as resolve_date'
                        ,DB::raw("CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"))*/
                ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
                ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                ->leftJoin('state', 'sites.state', '=', 'state.id')      
                ->where('machines.status','!=','1111')  
                ->where('errorlogs.status','=','1')
                ->where('errorlogs.type','!=','4');    
               
        $dateCheck = Input::get('dateRange');         
        $from = $to = '';        
        
        if($dateCheck !=''):
            $explode = explode('-',$dateCheck);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.strtotime('-1 day', strtotime($explode_from[0])).'-'.$explode_from[1]);           
            $to = date('Y-m-d', strtotime($explode[1]));
        endif;
        //echo $from.'-'.$to;
        if(!empty($dateCheck)):            
            $machinelogs = $machinelogs->where(function($query) use ($from,$to){                    
                $query->whereBetween('errorlogs.created_at', [$from, $to]);          
            })->orderBy('errorlogs.created_at','desc'); 
        else:
            $machinelogs = $machinelogs->where(function($query){                    
                $query->whereDate('errorlogs.created_at', '=', Carbon::today());          
            }); 
        endif;
        
        $machinelogs = $machinelogs->groupBy(DB::raw('errorlogs.log_id,errorlogs.created_at, errorlogs.id, sites.site_name, sites.street, sites.suburb, state.state_code, machine_models.machine_model,'. 'machine_types.machine_type, machines.machine_serial_no, machines.id, machines.comments, errorlogs.error, errorlogs.type, errorlogs.id,errorlogs.resolve_by, errorlogs.resolve_date'));        
        $machinelogs = $machinelogs->LIMIT('100')->get()->toArray(); 
        $data = array('data' => $machinelogs);
        return $data;
    }
    
    
    public function permission($id)
    {                
        $userDetails = \AppHelper::currentUser();     
        $userRole = \AppHelper::getRole($userDetails[0]['userID']);  
        $permission = \AppHelper::userPermission(Auth::User()->id, $id);      
        $permit = array(
            'readAll' => \AppHelper::isReadAll($permission),
            'addAll' => \AppHelper::isAddAll($permission),
            'editAll' => \AppHelper::isEditAll($permission),
            'read' => \AppHelper::isRead($permission),
            'edit' => \AppHelper::isEdit($permission),
            'delete' => \AppHelper::isDelete($permission),
        );        
        $permitDetails = array('userDetails' => $userDetails, 'userRole' => $userRole, 'permit' => $permit);        
        return $permitDetails;
    }
   
    public function history_api()
    {
        $machinelogs = DB::table('machines')
                ->select('machines.*', 'errorlogs.created_at as date_created', 'errorlogs.id as error_id','sites.site_name as site_name'
                        , 'sites.street as street', 'sites.suburb as suburb', 'state.state_code as statecode', 'machine_models.machine_model as machine_model'
                        , 'machine_types.machine_type as machine_type', 'machines.machine_serial_no as serial_no', 'machines.id as machine_id'
                        ,'machines.comments as comments', 'errorlogs.log_id as log_id', 'errorlogs.error as error', 'errorlogs.type as errortype', 'errorlogs.id as error_id'
                        ,'errorlogs.resolve_by as resolve_by','errorlogs.resolve_date as resolve_date'
                        ,DB::raw("CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"))
                ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
                ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                ->leftJoin('state', 'sites.state', '=', 'state.id')      
                ->where('machines.status','!=','1111')  
                ->where('errorlogs.status','=','2')
                ->where('errorlogs.type','!=','4');    
               
        $dateCheck = Input::get('dateRange');         
        $from = $to = '';        
        
        if($dateCheck !=''):
            $explode = explode('-',$dateCheck);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.strtotime('-1 day', strtotime($explode_from[0])).'-'.$explode_from[1]);           
            $to = date('Y-m-d', strtotime($explode[1]));
        endif;
        
        if(!empty($dateCheck)):            
            $machinelogs = $machinelogs->where(function($query) use ($from,$to){                    
                $query->whereBetween('errorlogs.created_at', [$from, $to]);          
            })->orderBy('errorlogs.status','ASC'); 
        else:
            $machinelogs = $machinelogs->where(function($query){                    
                $query->whereDate('errorlogs.created_at', '=', Carbon::today());          
            }); 
        endif;
        
        $machinelogs = $machinelogs->groupBy(DB::raw('errorlogs.log_id,errorlogs.created_at, errorlogs.id, sites.site_name, sites.street, sites.suburb, state.state_code, machine_models.machine_model,'
                            . 'machine_types.machine_type, machines.machine_serial_no, machines.id, machines.comments, errorlogs.error, errorlogs.type, errorlogs.id,errorlogs.resolve_by, errorlogs.resolve_date'));        
        $machinelogs = $machinelogs->LIMIT('2000')->get()->toArray(); 
        $data = array('data' => $machinelogs);
        return $data;
    }
    
    public function error_reports_api_history()
    {     
        $today = date("Y-m-d H:i:s");
        $todate = date("Y-m-d");
        $days_ago = date('Y-m-d', strtotime('-1 days', strtotime($today)));
        $machine = DB::table('errorlogs')
                    ->select(DB::raw("distinct machine_id, machines.comments, errorlogs.error, machine_models.machine_model as machine_model, 
                        machine_types.machine_type as machine_type, sites.site_name as site_name, sites.street as street, sites.suburb as suburb, 
                        errorlogs.resolve_date as resolve_date, errorlogs.resolve_by as resolve_by, state.state_code as statecode, errorlogs.type as errortype, 
                        CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"))
                    ->leftJoin('machines', 'errorlogs.machine_id', '=', 'machines.id')
                    ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                    ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                    ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                    ->leftJoin('state', 'sites.state', '=', 'state.id')                        
                    ->where('errorlogs.created_at','like','%'.$todate.'%')
                    ->where('errorlogs.status','=','2')
                    ->where('errorlogs.type','!=','4')                    
                    ->get()->toArray();          
        
        $data = array('data' => $machine);
        return $data;
    }
    
    
    public function history()
    {       
        $data = $this->history_api();                    
          
        return view('machine-error-reports/history', ['data'=>$data]);
        
    }
      
   /* public function statusCount($type){

        $statusCount = DB::table('machines')
            ->select('machines.*','errorlogs.id as error_id','sites.site_name as site_name',
                    'sites.street as street','sites.suburb as suburb','state.state_code as statecode',
                    'machine_models.machine_model as machine_model','machine_types.machine_type as machine_type',
                     'machines.machine_serial_no as serial_no','machines.id as machine_id',
                    'machines.comments as comments','errorlogs.log_id as log_id',
                    'errorlogs.error as error','errorlogs.type as errortype',
                    'errorlogs.created_at as date_created','errorlogs.id as error_id')
            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
            ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
            ->leftJoin('state', 'sites.state', '=', 'state.id');

        if($type=='1'){ 
            $statusCount = $statusCount->where('errorlogs.status','=','2'); 
        }
        else{ 
            $statusCount = $statusCount->where('errorlogs.status','!=','2'); 
            $statusCount = $statusCount->whereDate('errorlogs.created_at', '=', Carbon::today());
        }
        
        return $statusCount;
    }*/
    
    public function statusCount2($type){        
        $today = date("Y-m-d");        
        $errorlogs_query = Errorlogs::where('created_at', 'like', '%'.$today.'%')->where('status','=','1')->where('type',$type)->count();
        return $errorlogs_query;
    }
    
    public function machinesCount(){       
        $machineLists = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model'
                                    , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                , 'machine_reports.total_money as total_money', 'machine_reports.total_toys_win as total_toys_win', 'machine_reports.stock_left as stock_left'
                                , 'machine_reports.slip_volt as slip_volt'
                                , 'machine_reports.pkup_volt as pkup_volt','machine_reports.date_created as date_created'
                                , 'machine_reports.ret_volt as ret_volt', 'machine_reports.owed_win as owed_win', 'machine_reports.excess_win as excess_win'
                                , 'machine_reports.last_visit as last_visit', 'machine_reports.last_played as last_played'
                                , 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                        ->where('machines.id','<>', 27);
        
        return $machineLists;
    }
    
     public function machinesOnlyLists(){       
        $machineLists = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model'
                                    , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                , 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                        ->where('machines.id','<>', 27);
        
        return $machineLists;
    }
    
    function offlineMachineLists(){
        //$machineList = $this->machinesOnlyLists();

        $machineLists = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model'
                                    , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                , 'route.route as route', 'area.area as area', 'sites.state as state'
                                , 'machine_status.updated_at as lastlog', 'sites.site_name as site')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('machine_status', 'machines.id', '=', 'machine_status.machine_id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                        ->where('machines.status','0')->orderBy('machines.updated_at','desc')->get(); 

        //$lists = $machineList->where('machines.status','=','0')->orderBy('updated_at','desc')->get(); 
        return $machineLists;
    }
    function onlineMachineLists(){
        $machineList = $this->machinesOnlyLists();
        $online = $machineList->where('machines.status','=','1')->orderBy('updated_at','desc')->get(); 
        return $online;
    }
    function totalMachineLists(){
        $machineList = $this->machinesOnlyLists();
        $online = $machineList->where('machines.status','=','1')
               // ->where('machine_reports.last_played','!=','null')
                ->orWhere('machines.status','=','0')                
                ->orderBy('updated_at','desc')->get(); 
        return $online;
    }
    /**
     * This will update status once machine is fixed.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_error_status(Request $request)
    {
        $today = date("Y-m-d H:i:s");
        $resolve = DB::table('errorlogs')->where('id', $request['errorid'] )->update(['status' => $request['resolve']]);    
        
        if($resolve):
                        
            DB::table('errorlogs_history')->insert(
                ['error_type' => $request['errorid'], 'user_id' => $request['resolve_by'], 'created_at' => $today ]
            );

            return back()->with('message','Resolve Successfully!');
        else:
            return back()->with('message','Error resolving!');
        endif;       
        
    }
    
     /**
     * Show Advam error watchlist page
     *
     * @return \Illuminate\Http\Response
     */
    
    public function advam_watchlist()
    {     
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID); 
        $currerntUserRole = Auth::User()->id;
        
        $machinelogsadvam = DB::table('machines')
            ->select('machines.*','errorlogs.id as error_id','sites.site_name as site_name',
                    'sites.street as street','sites.suburb as suburb','state.state_code as statecode',
                    'machine_models.machine_model as machine_model','machine_types.machine_type as machine_type',
                     'machines.machine_serial_no as serial_no','machines.id as machine_id',
                    'machines.comments as comments','errorlogs.log_id as log_id',
                    'errorlogs.error as error','errorlogs.type as errortype',
                    'errorlogs.created_at as date_created','errorlogs.id as error_id')
            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
            ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
            ->leftJoin('state', 'sites.state', '=', 'state.id')
            ->whereIn('errorlogs.error', ['card_NOT AUTHORISED', 'card_Settlement_Failed', 'card_MachineInhibit','machine_malfunction','authorization_not_attempted', 'Machine Offline','Machine Online']);
            
        
        $dateRange = Input::get('dateRange');
        
        $from = $to = '';        
        if($dateRange !=''):
            $explode = explode('-',$dateRange);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
            $plusoneday = $explode_to[1]+ 1;
            $to = str_replace(' ','',$explode_to[2].'-'.$explode_to[0].'-'.$plusoneday);   
       
             $machinelogsadvam = $machinelogsadvam->whereBetween('errorlogs.created_at', [$from, $to]);
            $machinelogsgroup =  DB::table('errorlogs_list')->select('*')->whereBetween('created_at',[$from, $to])->orderBy('created_at','asc')->get();
           
        else:
             $today = date('Y-m-d');
             $to = date('Y-m-d', strtotime('+1 day', strtotime($today)));
            $from = date('Y-m-d', strtotime('-1 day', strtotime($today)));

            $machinelogsadvam = $machinelogsadvam->whereBetween('errorlogs.created_at', [$from, $to]);
             $machinelogsgroup =  DB::table('errorlogs_list')->select('*')->whereBetween('created_at', [$from, $to])->orderBy('created_at','asc')->get();
                    
        endif;
        
        if(!empty(Input::get())):
            $model = Input::get('machine_model');
            $type = Input::get('machine_type');
            $error_msg = Input::get('error_msg');
            $machine_site = Input::get('machine_site');
            $startdate = Input::get('startdate');
            $enddate = Input::get('enddate');
            if($model):
                $machinelogsadvam = $machinelogsadvam->where(function($query) use ($model){                    
                    $query->where('machine_models.machine_model', '=', $model);               
                })->orderBy('date_created','desc');            
            endif;
            
            if($type):
                $machinelogsadvam = $machinelogsadvam->where(function($query) use ($type){                    
                    $query->where('machine_types.machine_type', '=', $type);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($error_msg):
                $machinelogsadvam = $machinelogsadvam->where(function($query) use ($error_msg){                    
                    $query->where('type', '=', $error_msg);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($machine_site):
                $machinelogsadvam = $machinelogsadvam->where(function($query) use ($machine_site){                    
                    $query->where('site_name', '=', $machine_site);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($enddate):
                $machinelogsadvam = $machinelogsadvam->where(function($query) use ($from,$to){                    
                    $query->whereBetween('errorlogs_history.created_at', [$from, $to]);          
                })->orderBy('date_created','desc');            
            endif; 
            
        endif;
        
        //$machinelogsadvam = $machinelogsadvam->where('machines.status','0');
        $machinelogsadvam = $machinelogsadvam->orderBy('errorlogs.created_at','asc')->paginate(20);
         
        $machineModel = MachineModel::orderBy('created_at', 'desc')->get();
        $site = Site::orderBy('site_name', 'asc')->get();
        $machineType = MachineType::orderBy('created_at', 'desc')->get();
                
        $filterData = array(            
            'machine_model' => Input::get('machine_model'),
            'machine_type' => Input::get('machine_type'),
            'machine_site' => Input::get('machine_site'),
            'error_msg' => Input::get('error_msg'),
            'machine_site' => Input::get('machine_site'),
            'startdate' => $from,
            'enddate' => $to
        );
         

        $wh = DB::table('machines')->where('status','=', '3')->count('status'); 
        $totalStatus = array('error'=>$this->totalError('0'), 'warning'=>$this->totalWarning('0'), 'notice'=>$this->totalNotice('0'));
        $offlineLists = $this->offlineMachineLists(); 
        $onlineLists = $this->onlineMachineLists();
        $totalLists = $this->totalMachineLists();
        $online = count($onlineLists);
        $offline = count($offlineLists);
        $ttlMachines = $online + $offline; 
        

        if($var['permit']['readAll']):
            return view('machine-error-reports/advam-watchlist', ['machinelogs' => $machinelogsadvam, 'permit' => $var['permit'], 'machinelogsgroup' => $machinelogsgroup ,'model'=>$machineModel,'machine_type'=>$machineType, 'site'=>$site , 'filterData'=>$filterData,'online'=>$online, 'offline'=>$offline,'wh'=>$wh, 'total'=>$totalStatus, 'ttlMachines'=>$ttlMachines, 'offlineList'=>$offlineLists, 'onlineLists' => $onlineLists, 'totalLists'=>$totalLists, 'userID'=>$currerntUserRole]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
        
    }
   
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advam() 
    {
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);  
        $currerntUserRole = Auth::User()->id;
        $data = Input::all();     
       
        
        if ( !$data ) :
            $from = $to = '';  
            $machines = DB::table('machines')
                            ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model','machines.category as category'
                                    , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                    , 'route.route as route', 'sites.state as state', 'sites.site_name as site')
                            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                           ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
                            ->leftJoin('route', 'sites.route_id', '=', 'route.id') 
                            ->whereIn('errorlogs.error', ['card_NOT AUTHORISED', 'card_Settlement_Failed', 'card_MachineInhibit']);
                        
            $machines = $machines->whereDate('errorlogs.created_at', '=', Carbon::today()->toDateString());
        else:  
            $dateRange = Input::get('dateRange');
            $today = date('m/d/Y');
            $from = $to = ''; 
            if(!empty($dateRange)):
                $dateRange = Input::get('dateRange');
            else:
                $dateRange = $today.' - '.$today;
            endif;
            $explode = explode('-',$dateRange);            
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
            $plusoneday = $explode_to[1]+ 1;
            $to = str_replace(' ','',$explode_to[2].'-'.$explode_to[0].'-'.$plusoneday);            
            
            $machines = DB::table("machines")
                            ->select(DB::raw("machines.*, machines.id as machine_id, round(sum(total_money),2) as total_money, machine_models.machine_model as machine_model, machines.category as category, 
                                machine_types.machine_type as machine_type,machines.ip_address as ip_address, round(sum(total_toys_win),2) as total_toys_win,
                                route.route as route,sites.state as state,sites.site_name as site"))
                            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                            ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
                            ->leftJoin('route', 'sites.route_id', '=', 'route.id') 
                            ->whereIn('errorlogs.error', ['card_NOT AUTHORISED', 'card_Settlement_Failed', 'card_MachineInhibit'])
                            ->whereBetween('errorlogs.created_at', [$from, $to]);
//                            ->groupBy(DB::raw("machine_id,machine_model,category,machine_type,ip_address,total_toys_win,stock_left,slip_volt,pkup_volt,date_created,
//                                ret_volt,owed_win,excess_win,last_visit,last_played,route,area,state,site"));              
           
        endif;
        
        $machines = $machines->orderBy('errorlogs.created_at','desc')->get();  
        
        //var_dump($machines); exit();
        
        $machineModel = MachineModel::orderBy('created_at', 'desc')->get();
        $site = Site::orderBy('site_name', 'asc')->get();
        $machineType = MachineType::orderBy('created_at', 'desc')->get();
        
            $machinelogsgroup =  DB::table('errorlogs_list')
            ->select('errorlogs_list.*')            
            ->whereDate('errorlogs_list.created_at', '=', Carbon::today())
            ->orderBy('type','asc')
            ->get();
            
                $wh = DB::table('machines')->where('status','=', '3')->count('status'); 
        $totalStatus = array('error'=>$this->totalError('0'), 'warning'=>$this->totalWarning('0'), 'notice'=>$this->totalNotice('0'));
        $offlineLists = $this->offlineMachineLists(); 
        $onlineLists = $this->onlineMachineLists();
        $totalLists = $this->totalMachineLists();
        $online = count($onlineLists);
        $offline = count($offlineLists);
        $ttlMachines = $online + $offline; 

            return view('machine-error-reports/advam', ['machines' => $machines, 'data'=>$data, 'start' => $from,'end' => $to, 'permit' => $var['permit'], 'machinelogsgroup' => $machinelogsgroup ,'model'=>$machineModel,'machine_type'=>$machineType, 'site'=>$site , 'online'=>$online, 'offline'=>$offline,'wh'=>$wh, 'total'=>$totalStatus, 'ttlMachines'=>$ttlMachines, 'offlineList'=>$offlineLists, 'onlineLists' => $onlineLists, 'totalLists'=>$totalLists, 'userID'=>$currerntUserRole]);

    }    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
