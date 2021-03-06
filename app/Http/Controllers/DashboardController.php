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
//use App\MachineModel;
use Carbon\Carbon;
use App\MachineStatus;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {        
        $usersRole = DB::table('users_role')->where('user_id', '=', Auth::User()->id)->first();       
        
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);     
        
        $userDetails = \AppHelper::currentUser();     
        $userRole = \AppHelper::getRole($userDetails[0]['userID']);  
        $permission = \AppHelper::userPermission(Auth::User()->id, $objectID);      
        $permit = array(
            'readAll' => \AppHelper::isReadAll($permission),
            'addAll' => \AppHelper::isAddAll($permission),
            'editAll' => \AppHelper::isEditAll($permission)
        );
                       
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
            //->where('errorlogs.type','!=','3')
            ->where('errorlogs.status','!=','2')
            ->whereDate('errorlogs.created_at', '=', Carbon::today())
            ->orderBy('date_created','DESC')
            ->paginate(15);
  
        $machinelogsgroup =  DB::table('errorlogs_list')
            ->select('errorlogs_list.*')
            //->leftJoin('errorlogs', 'errorlogs_list.log_id', '=', 'errorlogs.log_id')
            ->whereDate('errorlogs_list.created_at', '=', Carbon::today())
            ->orderBy('errorlogs_list.created_at','DESC')
            ->get();        
        
        $online = DB::table('machines')->where('status','=', '1')->count('status'); 
        $offline = DB::table('machines')->where('status','=', '0')->count('status');
        $wh = DB::table('machines')->where('status','=', '3')->count('status'); 
        $numMachine = $online + $offline + $wh; 
        $wh = DB::table('machine_status')->where('status','=', '2')->sum('status');        
        
        $get_user = DB::table('users')
                    ->select('users.*', 'users.id as users_id','users.username as username'
                            , 'log_activities.subject as subject', 'log_activities.url as url'
                            , 'log_activities.ip as ip', 'log_activities.agent as agent', 'log_activities.updated_at as updated_at')
                    ->leftJoin('log_activities', 'log_activities.user_id', '=', 'users.id');  
        $act = $get_user->latest('log_activities.updated_at')->paginate(10);    
       
        $fromDate = date('Y-m').'-01';
        $toDate = date('Y-m').'-31';
        $incomeNote = DB::table('moneylogs')->whereBetween('created_at', [$fromDate, $toDate])->count('ttlBillIn'); 
        $incomeCoin = DB::table('moneylogs')->whereBetween('created_at', [$fromDate, $toDate])->sum('coinIn'); 
        $incomeTap = DB::table('moneylogs')->whereBetween('created_at', [$fromDate, $toDate])->sum('swipeIn'); 
                
        $total = array(
            'note' => number_format($incomeNote),
            'coin' => number_format($incomeCoin),
            'tap' => number_format($incomeTap)
        );
        
        if($usersRole->status):
            if($permit['readAll']):
                return view('dashboard/index', ['permit' => $permit, 'machinelogs' => $machinelogs,'machinelogsgroup' => $machinelogsgroup, 'numMachine'=>$numMachine,'online'=>$online,'offline'=>$offline, 'logs'=>$act ,'total'=>$total,'userRole' =>$userRole[0]['user_id'] ]);
            else:
                return view('profile/index', ['permit' => $permit, 'userDetails' => $userDetails, 'user_id' => $userDetails[0]['id'], 'userGroup' => $userRole[0]['users_group']]);
            endif;
        else:
            Auth::logout();
            return view('auth/login');
        endif;
        
        
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
