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


class MachineErrorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {               
        $currerntUserRole = Auth::User()->id;
        $machinelogs = DB::table('machines')
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
            ->where('errorlogs.status','!=','2')
            ->whereDate('errorlogs.created_at', '=', Carbon::today());
                        
        if(!empty(Input::get())):
            $model = Input::get('machine_model');
            $type = Input::get('machine_type');
            $error_msg = Input::get('error_msg');
            $machine_site = Input::get('machine_site');
            $startdate = Input::get('startdate');
            $enddate = Input::get('enddate');
            if($model):
                $machinelogs = $machinelogs->where(function($query) use ($model){                    
                    $query->where('machine_models.machine_model', '=', $model);               
                })->orderBy('date_created','desc');            
            endif;
            
            if($type):
                $machinelogs = $machinelogs->where(function($query) use ($type){                    
                    $query->where('machine_types.machine_type', '=', $type);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($error_msg):
                $machinelogs = $machinelogs->where(function($query) use ($error_msg){                    
                    $query->where('type', '=', $error_msg);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($machine_site):
                $machinelogs = $machinelogs->where(function($query) use ($machine_site){                    
                    $query->where('site_name', '=', $machine_site);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($enddate):
                $machinelogs = $machinelogs->where(function($query) use ($startdate,$enddate){                    
                    $query->whereBetween('machines.created_at', [$startdate, $enddate]);          
                })->orderBy('date_created','desc');            
            endif; 
        endif;
                
        $machinelogs = $machinelogs->orderBy('errorlogs.type','asc')->paginate(15);
        $machinelogsgroup =  DB::table('errorlogs_list')
            ->select('errorlogs_list.*')            
            ->whereDate('errorlogs_list.created_at', '=', Carbon::today())
            ->orderBy('type','asc')
            ->get();
         
        $machineModel = MachineModel::orderBy('created_at', 'desc')->get();
        $site = Site::orderBy('site_name', 'asc')->get();
        $machineType = MachineType::orderBy('created_at', 'desc')->get();
                
        $filterData = array(            
            'machine_model' => Input::get('machine_model'),
            'machine_type' => Input::get('machine_type'),
            'machine_site' => Input::get('machine_site'),
            'error_msg' => Input::get('error_msg'),
            'machine_site' => Input::get('machine_site'),
            'startdate' => Input::get('startdate'),
            'enddate' => Input::get('enddate')
        );
         
        $online = DB::table('machines')->where('status','=', '1')->count('status'); 
        $offline = DB::table('machines')->where('status','=', '0')->count('status'); 
        $wh = DB::table('machines')->where('status','=', '3')->count('status'); 
        $ttlMachines = $online + $offline; 
        
        $totalStatus = array('error'=>$this->totalError('0'), 'warning'=>$this->totalWarning('0'), 'notice'=>$this->totalNotice('0'));
        $offlineLists = $this->offlineMachineLists(); 
        $onlineLists = $this->onlineMachineLists();
        $totalLists = $this->totalMachineLists();
        
        return view('machine-error-reports/index', ['machinelogs' => $machinelogs,'machinelogsgroup' => $machinelogsgroup ,'model'=>$machineModel,'machine_type'=>$machineType, 'site'=>$site , 'filterData'=>$filterData,'online'=>$online, 'offline'=>$offline,'wh'=>$wh, 'total'=>$totalStatus, 'ttlMachines'=>$ttlMachines, 'offlineList'=>$offlineLists, 'onlineLists' => $onlineLists, 'totalLists'=>$totalLists, 'userID'=>$currerntUserRole]);
        
    }  

    public function historyLogs(){

    }
    
    public function history(){

        $currerntUserRole = Auth::User()->id;
        $machinelogs = DB::table('machines')
            ->select('machines.*','errorlogs.id as error_id','sites.site_name as site_name',
                    'sites.street as street','sites.suburb as suburb','state.state_code as statecode',
                    'machine_models.machine_model as machine_model','machine_types.machine_type as machine_type',
                    'machines.machine_serial_no as serial_no','machines.id as machine_id',
                    'machines.comments as comments','errorlogs.log_id as log_id',
                    'errorlogs.error as error','errorlogs.type as errortype','errorlogs.created_at as date_created','errorlogs.id as error_id',
                    'users.firstname as firstname','users.lastname as lastname')
            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
            ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
            ->leftJoin('state', 'sites.state', '=', 'state.id')   
            ->leftJoin('errorlogs_history','errorlogs_history.error_type','=','errorlogs.id')
            ->leftJoin('users','users.id','=','errorlogs_history.user_id')
            ->where('errorlogs.status','=','2');
                        
        if(!empty(Input::get())):
            $model = Input::get('machine_model');
            $type = Input::get('machine_type');
            $error_msg = Input::get('error_msg');
            $machine_site = Input::get('machine_site');
            $startdate = Input::get('startdate');
            $enddate = Input::get('enddate');
            if($model):
                $machinelogs = $machinelogs->where(function($query) use ($model){                    
                    $query->where('machine_models.machine_model', '=', $model);               
                })->orderBy('date_created','desc');            
            endif;
            
            if($type):
                $machinelogs = $machinelogs->where(function($query) use ($type){                    
                    $query->where('machine_types.machine_type', '=', $type);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($error_msg):
                $machinelogs = $machinelogs->where(function($query) use ($error_msg){                    
                    $query->where('type', '=', $error_msg);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($machine_site):
                $machinelogs = $machinelogs->where(function($query) use ($machine_site){                    
                    $query->where('site_name', '=', $machine_site);               
                })->orderBy('date_created','desc');            
            endif; 
            
            if($enddate):
                $machinelogs = $machinelogs->where(function($query) use ($startdate,$enddate){                    
                    $query->whereBetween('machines.created_at', [$startdate, $enddate]);          
                })->orderBy('date_created','desc');            
            endif; 
        endif;
                
        $machinelogs = $machinelogs->orderBy('date_created','desc')->paginate(10);
        $machinelogsgroup =  DB::table('errorlogs_list')
            ->select('errorlogs_list.*') 
            ->orderBy('created_at','desc')
            ->get();
         
        $machineModel = MachineModel::orderBy('created_at', 'asc')->get();
        $site = Site::orderBy('site_name', 'asc')->get();
        $machineType = MachineType::orderBy('created_at', 'asc')->get();
                
        $filterData = array('machine_model' => Input::get('machine_model'),'machine_type' => Input::get('machine_type'),'machine_site' => Input::get('machine_site'),
            'error_msg' => Input::get('error_msg'),'machine_site' => Input::get('machine_site'),'startdate' => Input::get('startdate'),'enddate' => Input::get('enddate'));
        
        $totalStatus = array('error'=>$this->totalError('1'), 'warning'=>$this->totalWarning('1'), 'notice'=>$this->totalNotice('1'));
        $offlineLists = $this->offlineMachineLists(); 
        $onlineLists = $this->onlineMachineLists();
        $totalLists = $this->totalMachineLists();

        return view('machine-error-reports/history', ['machinelogs' => $machinelogs,'machinelogsgroup' => $machinelogsgroup ,'model'=>$machineModel,'machine_type'=>$machineType, 'site'=>$site , 'filterData'=>$filterData, 'total'=>$totalStatus, 'offlineList'=>$offlineLists, 'onlineLists' => $onlineLists, 'totalLists'=>$totalLists]);
        
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
    public function totalError($type){        
        $statusCount = $this->statusCount($type);
        $error = $statusCount->where('type','=','1')->count(); 
        return $error;
    }
    public function totalWarning($type){        
        $statusCount = $this->statusCount($type);
        $warning = $statusCount->where('type','=','2')->count(); 
        return $warning;
    }
    public function totalNotice($type){        
        $statusCount = $this->statusCount($type);
        $notice = $statusCount->where('type','=','3')->count(); 
        return $notice;
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
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id');
        
        return $machineLists;
    }
    function offlineMachineLists(){
        $machineList = $this->machinesCount();
        $lists = $machineList->where('machines.status','=','0')->orderBy('updated_at','desc')->get(); 
        return $lists;
    }
    function onlineMachineLists(){
        $machineList = $this->machinesCount();
        $online = $machineList->where('machines.status','=','1')->orderBy('updated_at','desc')->get(); 
        return $online;
    }
    function totalMachineLists(){
        $machineList = $this->machinesCount();
        $online = $machineList->where('machines.status','=','1')
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
