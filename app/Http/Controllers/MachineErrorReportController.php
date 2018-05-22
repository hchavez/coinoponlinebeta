<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use Carbon\Carbon;
use Input;


class MachineErrorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $remove = '';
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
            $remove = 'x';
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
                
        $machinelogs = $machinelogs->orderBy('date_created','desc')->paginate(15);
        $machinelogsgroup =  DB::table('errorlogs_list')
            ->select('errorlogs_list.*')            
            ->whereDate('errorlogs_list.created_at', '=', Carbon::today())
            ->orderBy('errorlogs_list.created_at','DESC')
            ->get();
         
        $machineModel = MachineModel::orderBy('created_at', 'desc')->get();
        $site = Site::orderBy('site_name', 'asc')->get();
        $machineType = MachineType::orderBy('created_at', 'desc')->get();
         
        //$get_model = Input::get('machine_model');
        $filterData = array(
            'removeFilter' => $remove,
            'machine_model' => Input::get('machine_model'),
            'machine_type' => Input::get('machine_type'),
            'machine_site' => Input::get('machine_site')
        );
        $ttlMachines = DB::table('machines')->count('status'); 
        $online = DB::table('machines')->where('status','=', '1')->count('status'); 
        $offline = DB::table('machines')->where('status','=', '0')->count('status'); 
        $wh = DB::table('machines')->where('status','=', '3')->count('status'); 
        
        $totalStatus = array('error'=>$this->totalError(), 'warning'=>$this->totalWarning(), 'notice'=>$this->totalNotice());
     
        return view('machine-error-reports/index', ['machinelogs' => $machinelogs,'machinelogsgroup' => $machinelogsgroup ,'model'=>$machineModel,'machine_type'=>$machineType, 'site'=>$site , 'filterData'=>$filterData,'online'=>$online, 'offline'=>$offline,'wh'=>$wh, 'total'=>$totalStatus, 'ttlMachines'=>$ttlMachines]);
        
    }  
    
    public function statusCount(){
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
            ->leftJoin('state', 'sites.state', '=', 'state.id')          
            ->where('errorlogs.status','!=','2')
            ->whereDate('errorlogs.created_at', '=', Carbon::today());
        
        return $statusCount;
    }
    public function totalError(){
        $statusCount = $this->statusCount();
        $error = $statusCount->where('type','=','1')->count(); 
        return $error;
    }
    public function totalWarning(){
        $statusCount = $this->statusCount();
        $warning = $statusCount->where('type','=','2')->count(); 
        return $warning;
    }
    public function totalNotice(){
        $statusCount = $this->statusCount();
        $notice = $statusCount->where('type','=','3')->count(); 
        return $notice;
    }
    
      /**
     * This will update status once machine is fixed.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_error_status(Request $request)
    {
        
        $resolve = DB::table('errorlogs')->where('id', $request['errorid'] )->update(['status' => $request['resolve']]);    
        
        if($resolve):
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
