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
use App\MachineReports;
use App\MachineModel;
use App\Site;
use App\ErrorlogsHistory;
use Carbon\Carbon;
use Input;
use DateTime;
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
        
        $today = date("Y-m-d");
        $from = $to = $fdate = '';
        if(!empty($_GET['dateRange'])){
            //echo $_GET['dateRange'];
            $filter = Input::get('dateRange');
            $split = explode(' - ', $filter);        
            $splitFrm = explode('/',$split[0]);
            $splitTo = explode('/',$split[1]);
            $fromdata = $splitFrm[2].'-'.$splitFrm[0].'-'.$splitFrm[1];
            $todata = $splitTo[2].'-'.$splitTo[0].'-'.$splitTo[1];

            $from = (!empty($fromdata))? $fromdata : $today;
            $to = (!empty($todata))? $todata : $today;
            $logs = $this->errorlogs($from, $to);
            //print_r($logs);
            $fdate = $from;
        }else{
            $logs = $this->errorlogs($from, $to);
            $fdate = $today;
        }

       // $logs = $this->errorlogs($from, $to);
        //print_r($logs);
        $pass_data = array(
            'online' => $online,
            'offline' => $offline,
            'total' => $ttlMachines,           
            'logs' => $logs,
            'totalOnline' => $this->onlineMachineLists(),
            'totalOffline' => $this->offlineMachineLists(),
            'totalMachine' => $this->totalMachineLists(),
            'fdate' => $fdate     
        );
      
        return view('machine-error-reports/index', [ 'data' => $pass_data, 'permit' => $var['permit'] ]);        
    }

    public function errorlogs($from, $to)
    {
        //$from = '2018-11-22';
        //$to = Input::get('to');

        $today = date("Y-m-d");         
        $from = ($from != '')? $from : $today;

        $data = DB::table('errorlogs')
                    ->select(DB::raw('distinct machine_id, error, type')) 
                    ->where('created_at','like', '%'.$from.'%')    
                    ->where('status','=','1')
                    ->whereIn('type',['1','2','3'])
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
                    ->where('machine_reports.last_played','like', '%'.$from.'%')
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
        $today = date("Y-m-d"); 
        $machinelogs = '';
         if($check !=''):
            $data= $_GET['id'];
            $type= $_GET['type'];
            $errmsg= '%'.str_replace('-', '_', $_GET['errmsg']).'%';
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
                ->where('errorlogs.error','like',$errmsg)
                ->where('errorlogs.created_at', 'like', '%'.$today.'%');    
            $machinelogs = $machinelogs->get()->toArray(); 
         endif;
        
        //$data = array('data' => $machinelogs);
        return $machinelogs;
    }

    public function counter()
    {       
        

        $data= $_GET['id'];
        $type= $_GET['type'];
        $errmsg= '%'.str_replace('-', ' ', $_GET['errmsg']).'%';
        $machinelogs = DB::table('errorlogs')
                    ->select(DB::raw('machine_id'))
                    ->whereDate('created_at', '=', Carbon::today())
                    ->where('status','=','1')
                    ->where('machine_id','=',$data) 
                    ->where('error', '=', '%'.$errmsg.'%')
                    ->count(); 
       
        return $machinelogs;
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
        
    public function history()
    {       
        $today = date("Y-m-d");
        $from = $to = $fdate = '';
        if(!empty($_GET['dateRange'])){            
            $filter = Input::get('dateRange');
            $split = explode(' - ', $filter);        
            $splitFrm = explode('/',$split[0]);
            $splitTo = explode('/',$split[1]);
            $fromdata = $splitFrm[2].'-'.$splitFrm[0].'-'.$splitFrm[1];
            $todata = $splitTo[2].'-'.$splitTo[0].'-'.$splitTo[1];

            $from = (!empty($fromdata))? $fromdata : $today;
            $to = (!empty($todata))? $todata : $today;
            $logs = $this->errorlogs_history($from, $to);
            
            $fdate = $from;
        }else{
            $logs = $this->errorlogs_history($from, $to);
            $fdate = $today;
        }

        $pass_data = array(         
            'logs' => $logs,
            'fdate' => $fdate     
        );
        
        return view('machine-error-reports/history', [ 'data' => $pass_data ]);   
    }

    public function errorlogs_history($from, $to)
    {           

        $today = date("Y-m-d",strtotime("-10 day"));                 
        $from = ($from != '')? $from : $today;
        if($from == '' || $to == ''){
            $from = date("Y-m-d",strtotime("-10 day"));
            $to = date("Y-m-d H:i:s");
        }else{
            $from = $from;
            $to = $to;
        }
        
        $data = DB::table('errorlogs')
                    ->select(DB::raw('distinct machine_id, error, type, resolve_by','created_at'))                     
                    ->whereBetween('created_at',array($from,$to))                    
                    ->where('resolve_by','=','0')
                    ->whereIn('type',['1','2','3'])
                    ->get()->toArray();      

        $mids = '';        
        foreach($data as $logs){            
            $mids .=$logs->machine_id.",";
        }
       
        $explode = explode(',',$mids);  
        $machines = DB::table('machines')
                    ->select( 'machines.id as machine_id','machine_models.machine_model as machine_model', 'machine_types.machine_type as machine_type',
                            DB::raw("CONCAT(machines.comments,' ',machines.machine_serial_no) as name_serial"),
                            'sites.site_name as site', 'machines.updated_at as updated_at')                   
                    ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                    ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                    ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                    ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                    ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                    ->leftJoin('area', 'sites.area_id', '=', 'area.id') 
                    ->whereIn('machines.status', ['1','0'])
                    ->whereIn('machines.id', $explode)                   
                    ->where('machine_reports.last_played','like', '%'.$today.'%')
                    ->limit(100)->get();   

        $logs = array(
            'errors' => $data,
            'machines' => $machines
        );
        return $logs;
       
    }
    public function get_errorlist_history()
    {           
        
        $check = Input::get('id'); 
        $machinelogs = '';
         if($check !=''):
            $data= $_GET['id'];
            $type= $_GET['type'];
            $errmsg= '%'.str_replace('-', '_', $_GET['errmsg']).'%';

            $today = date("Y-m-d");   
            $fromDate = $_GET['fromDate'];
            $date = ($_GET['fromDate']=='')? $today : $fromDate;

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
                ->where('errorlogs.status','=','2')
                ->where('errorlogs.type','=', $type)
                ->where('errorlogs.machine_id','=', $data)
                ->where('errorlogs.error','like',$errmsg)
                ->whereDate('errorlogs.created_at', 'like', '%'.$date.'%');    
            $machinelogs = $machinelogs->get()->toArray(); 
         endif;
        
        //$data = array('data' => $machinelogs);
        return $machinelogs;
    }
    
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
    
 

    function offlineMachineLists(){
        //$machineList = $this->machinesOnlyLists();

        $machineLists = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model'
                                , 'machine_types.machine_type as machine_type', 'machines.status as status', 'machines.carrier as carrier', 'machines.franchisee as franchisee'
                                , 'machines.area as m_area', 'machines.sitegroup as m_sitegroup','machines.route as m_route', 'route.route as route', 'area.area as area', 'sites.state as state', 'site_groups.site_group_name as sitegroup'
                                , 'machine_status.updated_at as lastlog', 'sites.site_name as site')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('machine_status', 'machines.id', '=', 'machine_status.machine_id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('site_groups', 'sites.group_id', '=', 'site_groups.id')
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

    public function totalError($type){         
        $statusCount = $this->statusCount($type);
        $error = $statusCount->where('type','=','1')->count(); 
        //echo $this->statusCount2(1);       
        return $this->statusCount2(1);
    }
    public function totalWarning($type){        
        $statusCount = $this->statusCount($type);
        $warning = $statusCount->where('type','=','2')->count(); 
        return $this->statusCount2(2);
    }
    public function totalNotice($type){        
        $statusCount = $this->statusCount($type);
        $notice = $statusCount->where('type','=','3')->count(); 
        return $this->statusCount2(3);
    }

    public function statusCount($type){

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
    }
    
    
     public function error_history() {  
        
//        $machinelogs = DB::table('errorlogs')
//                     ->select(DB::raw('errorlogs.*, errorlogs.created_at as date_created, errorlogs.id as error_id,'
//                             . 'machines.machine_serial_no as serial_no, machines.id as machine_id,'
//                             . 'errorlogs.log_id as log_id, errorlogs.error as error, errorlogs.type as errortype, errorlogs.id as error_id'))
//                    ->leftJoin('machines', 'errorlogs.machine_id','=','machines.id')          
//                    ->where('errorlogs.type','!=','4');     
//        
        $dateRange = Input::get('dateRange');     
      
        $from = $to = '';        
        
        if($dateRange !=''):
            $explode = explode('-',$dateRange);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);          
            $to = date('Y-m-d', strtotime('+1 day', strtotime($explode[1])));
        endif;
//        
//        $dateCheck = Input::get('dateRange');
//        $date = new DateTime();        
//        $today = $date->format('Y-m-d H:i:s');
//        $toDate = $date->format('Y-m-d');
//        $newdate = strtotime ( '+1 day' , strtotime ( $today ) ) ;
//        
//        if(!empty($dateCheck)):            
//            $machinelogs = $machinelogs->where(function($query) use ($from,$to){                    
//                $query->whereBetween('errorlogs.created_at', [$from, $to]);          
//            })->orderBy('errorlogs.created_at','desc'); 
//        else:
//            $machinelogs = $machinelogs->where(function($query) use ($newdate, $toDate){                    
//                $query->where('errorlogs.created_at', 'like', '%'.$toDate.'%');                        
//            }); 
//        endif;
//        
//        $machinelogs = $machinelogs->groupBy(DB::raw('errorlogs.log_id,errorlogs.created_at, errorlogs.id,'
//                            . 'machines.machine_serial_no, machines.id, errorlogs.error, errorlogs.type, errorlogs.id'));        
                
        //$machinelogs = $machinelogs->orderBy('errorlogs.created_at','desc')->paginate(15);
        //$machinelogs = $machinelogs->orderBy('errorlogs.created_at','desc')->toSql();
                
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
      
        return view('machine-error-reports/error-history', ['filterData'=>$filterData,'wh'=>$wh]);
 
    }
    
        
    public function allerrorsapi(){ 
        $date = new DateTime('+1 day');        
        $thedate = date("Y-m-d H:i:s");
        $today = date('Y-m-d', strtotime('+1 days', strtotime($thedate))); 
        $days_ago = date('Y-m-d', strtotime('-5 days', strtotime($today)));  
        
        $dateRange = Input::get('dateRange');
        
        if($dateRange != ''):
            $from = $to = '';    
            $dateRange = Input::get('dateRange');
            if($dateRange !=''):
                $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $dayfr = $explode_from[0];
                $from = str_replace(' ','',$explode_from[2].'-'.$dayfr.'-'.$explode_from[1]);
                $day = $explode_to[0]+1;
                $to = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
                
            endif;
            
            $userall = Errorlogs::with('machine')->whereNotIn('type',['4','0'])
                    ->whereBetween('created_at', [$from,$to])
                    ->orderBy('created_at','asc')->get();
        else:
            $userall = Errorlogs::with('machine')->whereNotIn('type',['4','0'])
                    ->where('created_at','>=',$days_ago)    
                    ->orderBy('created_at','asc')
                    ->get(); 
        endif;

        return new UserCollection($userall);
       
    }
    
    public function advam_notap() {   
        
          $dateRange = Input::get('dateRange');     
      
        $from = $to = '';        
        
        if($dateRange !=''):
            $explode = explode('-',$dateRange);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);          
            $to = date('Y-m-d', strtotime('+1 day', strtotime($explode[1])));
        endif;
                
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
      
        return view('machine-error-reports/advam-notap', ['filterData'=>$filterData,'wh'=>$wh]);
    
    }
    
    public function advamnotap(){
     
        $thedate = date("Y-m-d");
        $today = date('Y-m-d', strtotime('+1 days', strtotime($thedate))); 
        $days = '-'.Input::get('days').' days';
        $days_ago = date('Y-m-d', strtotime($days, strtotime($today)));  
       
        $days = Input::get('days'); 
        
                      $machinenotap = MachineReports::select('machine_id',
                      DB::raw("count(machine_id) as count"),
                      DB::raw('(select machine_serial_no from machines where id = machine_reports.machine_id) as machine_serial'),
                      DB::raw('(select comments from machines where id = machine_reports.machine_id) as machine'),
                      DB::raw('(select last_tapped from machines where id = machine_reports.machine_id) as last_tapped'),
                      DB::raw('(select last_online from machines where id = machine_reports.machine_id) as last_online'),
                      //DB::raw('(select site from machines where id = machine_reports.machine_id) as site'),
                      DB::raw('(select site_name from sites left join machines on machines.site_id = sites.id where machines.id = machine_reports.machine_id) as site'),
                      DB::raw('(select machine_model from machine_models left join machines on machines.machine_model_id = machine_models.id where machines.id = machine_reports.machine_id) as machine_model'))
                        ->where('total_money','=','0')
                        ->whereIn('category',['cardreader','george system and cardreader'])
                        //->where('date_created','>',$days_ago)
                        ->whereBetween('date_created', [$days_ago,$today])
                        ->groupBy('machine_id')->get();
         
     
        $notaps = array();        
        foreach($machinenotap as $data){
            if($data['count'] == Input::get('days')){
                array_push($notaps,$data);
            }
        }
       
        return $notaps;

        
    }
    
     public function advam_notapdetail() {   
        
          $days = Input::get('days');     
          $machine_id = Input::get('machine_id');    
      
   
        $machineModel = MachineModel::orderBy('created_at', 'desc')->get();
        $site = Site::orderBy('site_name', 'asc')->get();
        $machineType = MachineType::orderBy('created_at', 'desc')->get();
                
        $filterData = array(            
            'machine_model' => Input::get('machine_model'),
            'machine_type' => Input::get('machine_type'),
            'machine_site' => Input::get('machine_site'),
            'error_msg' => Input::get('error_msg'),
            'machine_site' => Input::get('machine_site'),
        );         
      
        return view('machine-error-reports/advam-notapdetail', ['filterData'=>$filterData]);
    
    }
    
    public function notapmachinedetail()
    {
        $machine_id = Input::get('machine_id'); 
        
         $thedate = date("Y-m-d");
        $today = date('Y-m-d', strtotime('+1 days', strtotime($thedate))); 
        $days = '-'.Input::get('days').' days';
        $days_ago = date('Y-m-d', strtotime($days, strtotime($today)));  
        
        $machinenotapdetail = MachineReports::select( 'machine_reports.*', DB::raw("DATE_FORMAT(machine_reports.last_played, '%d/%m/%Y') as date_played"),
                 DB::raw('(select machine_serial_no from machines where id = machine_reports.machine_id) as machine_serial'),
                 DB::raw('(select comments from machines where id = machine_reports.machine_id) as machine'),
                 DB::raw('(select site_name from sites left join machines on machines.site_id = sites.id where machines.id = machine_reports.machine_id) as site'))
                        ->where('total_money','=','0')->where('machine_id',$machine_id)
                        ->whereIn('category',['cardreader','george system and cardreader'])
                        ->where('date_created','>=',$days_ago)
                        ->orderBy('date_created','desc')->get(); 
        
        //var_dump($machinenotapdetail);
        return new UserCollection($machinenotapdetail);
        
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
