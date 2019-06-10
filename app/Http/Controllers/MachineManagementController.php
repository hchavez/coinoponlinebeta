<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\Machine;
use App\City;
use App\State;
use App\Site;
use App\Theme;
use App\Errorlogs;
use App\GoalsLogs;
use App\WinLogs;
use App\MoneyLogs;
use App\GraphLogs;
use App\MachineType;
use App\MachineModel;
use App\MachineSettings;
use App\ClawSettings;
use App\GameSettings;
use App\MachineAccounts;
use App\CashBoxes;
use App\ProductDefinitions;
use Session;
use Carbon\Carbon;
use URL;
use Input;
use DateTime;
use App\User;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Auth;
use View;


class MachineManagementController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);        
        $data = Input::all();     
         $from = $to = null; 
         $machines = null;
         
         //echo Carbon::today()->toDateString(); exit();
         
         if(empty($data)):  
           
            $machines = DB::table('machines')
                            ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model','machines.category as category'
                                    , 'machines.status as statusq','machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                    , 'machine_reports.total_money as total_money', 'machine_reports.total_toys_win as total_toys_win', 'machine_reports.stock_left as stock_left'
                                    , 'machine_reports.slip_volt as slip_volt', 'machine_reports.pkup_volt as pkup_volt','machine_reports.date_created as date_created'
                                    , 'machine_reports.ret_volt as ret_volt', 'machine_reports.owed_win as owed_win', 'machine_reports.excess_win as excess_win'
                                    , 'machine_reports.last_visit as last_visit', 'machine_reports.last_played as last_played'
                                    , 'machines.route as m_route', 'machines.area as m_area' 
                                    , 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                            ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                            ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                            ->leftJoin('area', 'sites.area_id', '=', 'area.id') 
                            ->whereIn('machines.status', ['1','0']);
                        
            $machines = $machines->whereDate('machine_reports.date_created', '=', Carbon::today()->toDateString());
             $machines = $machines->orderBy('machines.status','desc')->get()->toArray();  
            
        else:  

           
                $dateRange = Input::get('dateRange'); 
                
                $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
                $day = $explode_to[0];
                $to_queryday = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
                $to = date('Y-m-d',strtotime($to_queryday . "+1 days"));
     
                
                
          
        
//            $machines = DB::table("machines")
//                            ->select(DB::raw("machines.*, machines.id as machine_id, round(sum(total_money),2) as total_money, machine_models.machine_model as machine_model, machines.category as category, 
//                                machines.status as statusq, machine_types.machine_type as machine_type,machines.ip_address as ip_address, round(sum(total_toys_win),2) as total_toys_win,
//                                round(sum(stock_left),2) as stock_left,machine_reports.slip_volt as slip_volt, machine_reports.pkup_volt as pkup_volt,
//                                machine_reports.date_created as date_created,machine_reports.ret_volt as ret_volt,machine_reports.owed_win as owed_win,
//                                machine_reports.excess_win as excess_win,machine_reports.last_visit as last_visit,machine_reports.last_played as last_played,
//                                route.route as route,area.area as area,sites.state as state,sites.site_name as site"))
//                            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
//                            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
//                            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
//                            ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
//                            ->leftJoin('route', 'sites.route_id', '=', 'route.id')
//                            ->leftJoin('area', 'sites.area_id', '=', 'area.id') 
//                            ->whereIn('machines.status', ['1','0'])
//                            ->whereBetween('machine_reports.date_created', [$from, $to])
//                            ->groupBy(DB::raw("machine_id,machine_model,category,machine_type,ip_address,total_toys_win,stock_left,slip_volt,pkup_volt,date_created,
//                                ret_volt,owed_win,excess_win,last_visit,last_played,route,area,state,site"));    
                
                $machines = DB::table('machines')
                            ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model','machines.category as category'
                                    , 'machines.status as statusq','machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                    , 'machine_reports.total_money as total_money', 'machine_reports.total_toys_win as total_toys_win', 'machine_reports.stock_left as stock_left'
                                    , 'machine_reports.slip_volt as slip_volt', 'machine_reports.pkup_volt as pkup_volt','machine_reports.date_created as date_created'
                                    , 'machine_reports.ret_volt as ret_volt', 'machine_reports.owed_win as owed_win', 'machine_reports.excess_win as excess_win'
                                    , 'machine_reports.last_visit as last_visit', 'machine_reports.last_played as last_played'
                                    , 'machines.route as m_route', 'machines.area as m_area' 
                                    , 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                            ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                            ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                            ->leftJoin('area', 'sites.area_id', '=', 'area.id') 
                            ->whereBetween('machine_reports.date_created', [$from, $to])
                            ->whereIn('machines.status', ['1','0']);
                
                 $machines = $machines->orderBy('machines.id','desc')->get()->toArray();  
                  //$machines = $machines->orderBy('machines.status','desc')->toSql();  
                  
        endif;
        
       
        
        $input = ['status' => '1'];
        if (Machine::where('activation_date','!=', NULL)->update($input)) { }
        
               
        if($var['permit']['read']):
            return view('machines-mgmt/index', ['start' => $from,'end' => $to, 'permit' => $var['permit'], 'machines' => $machines,'data'=>$data]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif; 
        
        
    }     
    
    public function machine_listing_api()
    {
        $machines = DB::table('machines')
                            ->select('machines.*', 'machines.id as machine_id', 'machine_models.machine_model as machine_model','machines.category as category'
                                    , 'machines.status as statusq','machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                    , 'machine_reports.total_money as total_money', 'machine_reports.total_toys_win as total_toys_win', 'machine_reports.stock_left as stock_left'
                                    , 'machine_reports.slip_volt as slip_volt', 'machine_reports.pkup_volt as pkup_volt','machine_reports.date_created as date_created'
                                    , 'machine_reports.ret_volt as ret_volt', 'machine_reports.owed_win as owed_win', 'machine_reports.excess_win as excess_win'
                                    , 'machine_reports.last_visit as last_visit', 'machine_reports.last_played as last_played'
                                    , 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                            ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                            ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                            ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                            ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                            ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                            ->leftJoin('area', 'sites.area_id', '=', 'area.id')    
                            ->where('machines.status','<>', '1111');
                        
        $machines = $machines->whereDate('machine_reports.date_created', '=', Carbon::today()->toDateString());
        $machines = $machines->orderBy('machines.status','desc')->get()->toArray(); 
        $data = array('data' => $machines);
        return $data;
    }
    
    public function date_filter() {
        // $reservations = Reservation::whereBetween('reservation_from', [$from, $to])->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $cities = City::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        $machine_types = MachineType::orderBy('machine_type')->get();
        $machine_models = MachineModel::orderBy('machine_model')->get();
        $sites = Site::orderBy('site_name')->get();
        $themes = Theme::orderBy('theme')->get();

        return view('machines-mgmt/create', ['machine_types' => $machine_types, 'themes' => $themes, 'machine_models' => $machine_models, 'sites' => $sites, 'cities' => $cities, 'states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validateInput($request);
        
        Machine::create([
            'database_id' => '1',
            //'ip_address' => $request['ipaddress'],
            'machine_description' => $request['description'],
            'comments' => $request['comments'],
            'machine_type_id' => $request['machine_type'],
            'machine_model_id' => $request['machine_model'],
            'machine_serial_no' => $request['serial_no'],
            'machine_theme_id' => $request['theme'],
            'site_id' => $request['site'],
            'category' => $request['category'],
            'version' => $request['version'],
            'teamviewer' => $request['teamviewer'],
            'activation_date' => $request['activation_date'],
            'route' => $request['route'],
            'area' => $request['area'],
            'carrier' => $request['carrier'],
            'franchisee' => $request['franchisee'],
            'status' => '3' //1 = online 0 = offline 2 = warehouse 1111 = dummy status
        ]);

        $getmachine = Machine::orderBy('created_at', 'desc')->first();

        //Set defaults settings on machine. set to 0
        MachineSettings::create([
            'machine_id' => $getmachine->id,
            'xTime' => '0',
            'yTime' => '0',
            'xSpeed' => '0',
            'ySpeed' => '0',
            'zSpeed' => '0',
            'status' => '0'
        ]);

        ClawSettings::create([
            'machine_id' => $getmachine->id,
            'max_voltage' => '0',
            'min_voltage' => '0',
            'max_PWM' => '0',
            'min_PWM' => '0',
            'voltDecRetPercentage' => '0',
            'latest_voltage' => '0',
            'latest_PWM' => '0',
            'plusPick' => '0',
            'plusPickUpPWM' => '0',
            'startPWM' => '0',
            'startVolt' => '0',
            'retPWM' => '0',
            'retVolt' => '0',
            'pickPWM' => '0',
            'pickVolt' => '0',
            'pickUpLoLimitPWM' => '0',
            'incVolt' => '0',
            'decVolt' => '0',
            'diffPickRet' => '0',
            'voltSupply' => '0',
            'insuffVoltInc' => '0',
            'voltReso' => '0',
            'status' => '0'
        ]);

        GameSettings::create([
            'machine_id' => $getmachine->id,
            'playIndex' => '0',
            'owedWin' => '0',
            'excessWin' => '0',
            'prevEwin' => '0',
            'luckyToWin' => '0',
            'winGap' => '0',
            'prevWinIndex' => '0',
            'numberOfPlaysStayVoltage' => '0',
            'gameLeft' => '0',
            'randomedTime' => '0',
            'gameTime' => '0',
            'status' => '0'
        ]);

        MachineAccounts::create([
            'machine_id' => $getmachine->id,
            'ipAdd' => $request['ipaddress'],
            'total_dollar_in' => '0',
            'total_won' => '0'
        ]);

        CashBoxes::create([
            'machine_id' => $getmachine->id,
            'coin1_total_in' => '0',
            'coin2_total_in' => '0',
            'coin3_total_in' => '0',
            'coin4_total_in' => '0',
            'total_game' => '0',
            'total_test' => '0',
            'insuffMonPlay' => '0',
            'rejectionCounter' => '0',
            'insuffMonClick' => '0',
            'status' => '0'
        ]);

        ProductDefinitions::create([
            'machine_id' => $getmachine->id,
            'coinPerPlay' => '0',
            'winPercentage' => '0',
            'ttlPurCost' => '0',
            'numberOfPlays' => '0',
            'stockLeft' => '0',
            'stockAdded' => '0',
            'stockRemoved' => '0',
            'status' => '0'
        ]);
        
        $currdatei = date('Y-m-d H:i:s');
        DB::insert('insert into machine_status (machine_id, system, created_at, updated_at,status) values (?, ?, ?, ?, ?)', [$getmachine->id, 'machine to be updated',$currdatei,$currdatei,'0']);


        Session::flash('message', 'New Machine successfully added!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->intended('/machine-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        //Get machine information

        $url = url()->current();
        $objectID = \AppHelper::objectId($url);

        $var = $this->permission('7');
        $machine = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machines.machine_serial_no as serial_no', 'machine_models.machine_model as machine_model'
                                , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                                , 'machines.comments as machine_comments', 'route.route as route', 'area.area as area', 'sites.state as state'
                                , 'sites.site_name as site', 'themes.theme as theme')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('themes', 'machines.machine_theme_id', '=', 'themes.id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                        ->where('machines.id', $id)->first();

        //Get all the machine settings
        $machine_settings = DB::table('machine_settings')->where('machine_id', $id)->first();
        $claw_settings = DB::table('claw_settings')->where('machine_id', $id)->first();
        if (!$claw_settings) {
            $claw_settings = null;
        }
        $game_settings = DB::table('game_settings')->where('machine_id', $id)->first();
        $machine_accounts = DB::table('machine_accounts')->where('machine_id', $id)->first();
        $product_def = DB::table('product_definitions')->where('machine_id', $id)->first();
        $cash_boxes = DB::table('cash_boxes')->where('machine_id', $id)->first();

        //Get Machine records
        $machinerecords = DB::table('winlogs')
                        ->select('winlogs.stockLeft as stockLeft', 'winlogs.totalWon as totalWon', 'winlogs.playIndex as playIndex')
                        ->where('winlogs.machine_id', $id)
                        ->whereDate('winlogs.created_at', '=', Carbon::today()->toDateString())
                        ->orderBy('winlogs.created_at', 'desc')->first();

        $totalMoneyquery = DB::table('moneylogs')
                        ->select('moneylogs.ttlMoneyIn as ttlMoneyIn')
                        ->where('moneylogs.machine_id', $id)
                        ->whereDate('moneylogs.created_at', '=', Carbon::today()->toDateString())
                        ->orderBy('moneylogs.created_at', 'desc')->first();

        //Get Win Result Data for graphview
        $graphdatawinquery = DB::table('winlogs')->select('winResult')->where('machine_id', $id)
                            //->whereMonth('created_at', '=', date('m'))
                            //->where('testPlay', 'play')
                            //->whereDate('created_at', date("Y-m-d", strtotime( '-1 days' ) ) )
                            ->get();
        
        $totalPlay = $graphdatawinquery->count();

        if ($graphdatawinquery->count() > 0) {
            foreach ($graphdatawinquery as $value) {
                if ($value->winResult == 'won') {
                    $tempval = '20';
                } else {
                    $tempval = '0';
                }
                $graphdataresult[] = $tempval;
            }
            $graphdataWinResult = join($graphdataresult, ',');
        } else {
            $graphdataWinResult = null;
        }

        //Get Excess Win Data for graphview
        $graphdataExcessWinQuery = DB::table('winlogs')->select('excessWin')->where('machine_id', $id)
                                    //->whereMonth('created_at', '=', date('m'))
                                    //->where('testPlay', 'play')
                                   //->whereDate('created_at', date("Y-m-d", strtotime( '-1 days' ) ) )
                                    ->get();
        
        if ($graphdataExcessWinQuery->count() > 0) {
            foreach ($graphdataExcessWinQuery as $value) {
                $graphdataExcessWinresult[] = $value->excessWin;
            }
            $graphdataExcessWinResult = join($graphdataExcessWinresult, ',');
        } else {
            $graphdataExcessWinResult = null;
        }

        //Get Owned Win Data for graphview
        $graphdataOwnedWinQuery = DB::table('winlogs')->select('owedWin')->where('machine_id', $id)
                                       // ->whereMonth('created_at', '=', date('m'))
                                        //->where('testPlay', 'play')
                                        //->whereDate('created_at', date("Y-m-d", strtotime( '-1 days' ) ) )
                                        ->get();
        
        if ($graphdataOwnedWinQuery->count() > 0) {
            foreach ($graphdataOwnedWinQuery as $value) {
                $graphdataOwnedWinresult[] = $value->owedWin * -1;
            }
            $graphdataOwnedWinResult = join($graphdataOwnedWinresult, ',');
        } else {
            $graphdataOwnedWinResult = null;
        }

        //Get RetVolt Data for graphview
        $graphdataDropVoltQuery = DB::table('goalslogs')->select('dropVolt')->where('machine_id', $id)
                               // ->whereMonth('created_at', '=', date('m'))    
                                ->where('startEndFlag','=',  '2')
                               // ->whereDate('created_at', date("Y-m-d", strtotime( '-1 days' ) ) )
                                ->get();
        
        if ($graphdataDropVoltQuery->count() > 0) {
            foreach ($graphdataDropVoltQuery as $value) {
                $graphdataDropVoltresult[] = $value->dropVolt;
            }
            $graphdataDropVoltResult = join($graphdataDropVoltresult, ',');
        } else {
            $graphdataDropVoltResult = null;
        }

        //Get pickupvolt Data for graphview
        $graphdataPkVoltQuery = DB::table('goalslogs')->select('pkVolt')->where('machine_id', $id)
                                //->whereMonth('created_at', '=', date('m'))
                                ->where('dropCount','=', '1')
                                // ->whereDate('created_at', date("Y-m-d", strtotime( '-1 days' ) ) )
                                ->get();
           
        if ($graphdataPkVoltQuery->count() > 0) {
            foreach ($graphdataPkVoltQuery as $value) {
                $graphdataPkVoltresult[] = $value->pkVolt;
            }
            $graphdataPkVoltResult = join($graphdataPkVoltresult, ',');
        } else {
            $graphdataPkVoltResult = null;
        }
        
        $graphdataPkVoltQuery2 = DB::table('goalslogs')->select('created_at','pkVolt','dropVolt','slipVolt')->where('machine_id', $id)
                                //->whereMonth('created_at', '=', date('m'))
                                ->where('startEndFlag','=',  '2')
                                // ->whereDate('created_at', date("Y-m-d", strtotime( '-1 days' ) ) )
                                ->get();
        
         if ($graphdataPkVoltQuery2->count() > 0) {
            foreach ($graphdataPkVoltQuery2 as $value) {
                

                $asdate = strtotime($value->created_at) * 1000;
                $graphdataPkVoltQuery2result[] = "[". $asdate .",". $value->pkVolt .",". $value->dropVolt .",".$value->slipVolt."]";

            }
            $graphdataPkVoltResult2 = join($graphdataPkVoltQuery2result, ',');

        }else{
             $graphdataPkVoltResult2 = null;
        }
        
        //var_dump($graphdataPkVoltResult2); exit();
        
         //Win Result with graph data display
         $graphdataWinResultwithDateQuery = DB::table('winlogs')->select('created_at','winResult','excessWin','owedWin')
                                ->where('machine_id', $id)
                                //->where('testPlay', 'play')
                                ->get();
         
         if ($graphdataWinResultwithDateQuery->count() > 0) {
            foreach ($graphdataWinResultwithDateQuery as $value) {
                
                $asdate = strtotime($value->created_at) * 1000;
                $ownedWin = $value->owedWin * -1;
                
                 if ($value->winResult == 'won') {
                    $tempwinResult = '1';
                } else {
                    $tempwinResult = '0';
                }
                
                $graphdataWinResultwithDateresult[] = "[". $asdate .",". $ownedWin .",". $value->excessWin.",". $tempwinResult."]";
                //$graphdataWinResultwithDateresult[] = "[". $asdate .",". $tempwinResult ."]";
                
            }
            $graphdataWinResultwithDate = join($graphdataWinResultwithDateresult, ',');

         }else{
             $graphdataWinResultwithDate = null;
         }
        
         $totalCoin = $this->getTotal('coinIn',$id);
        $totalBill = $this->getTotal('billIn',$id);
        $totalSwipe = $this->getTotal('swipeIn',$id);
  
        
//        
        if($var['permit']['read']):
            return view('machines-mgmt/show', ['machine' => $machine, 'machine_settings' => $machine_settings, 
            'claw_settings' => $claw_settings, 
            'game_settings' => $game_settings,
            'machine_accounts' => $machine_accounts, 
            'product_def' => $product_def, 
            'cash_boxes' => $cash_boxes,
            'graphdataWinResult' => $graphdataWinResult,
            'graphdataExcessWinResult' => $graphdataExcessWinResult,
            'graphdataOwnedWinResult' => $graphdataOwnedWinResult,
            'graphdataDropVoltResult' => $graphdataDropVoltResult,
            'graphdataPkVoltResult' => $graphdataPkVoltResult,
            'machinerecords' => $machinerecords,
            'totalPlay' => $totalPlay,
            'totalMoneyquery' => $totalMoneyquery,
            'newgraphdataPkVoltQuery2' => $graphdataPkVoltResult2,
            'graphdataWinResultwithDate' => $graphdataWinResultwithDate,
            'coin' => $totalCoin,'bill'=>$totalBill,'card'=>$totalSwipe,
            'permit' => $var['permit']
        ]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
    }  
     
     public function getTotal($type,$id){
           $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));        
        $today = date("Y-m-d");
        $month = date("Y-m");
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $weekFrom = date('Y-m-d',strtotime("-7 days"));
        $thisYear = date('Y-m-d',strtotime(date('Y-01-01')));
        
       if(date("m") > 06) {
               $d = date("Y-m-d", strtotime("+ 1 year"));
               $finfrom = date("Y-07-01");
               $finto = date("Y-06-30", strtotime($d));
               //$finfrom = date('Y-m-d',strtotime(date('Y-06-01')));
            } else {
              $d = date("Y-m-d", strtotime("-1 years"));
              $finto = date("Y-06-30");
               $finfrom = date("Y-07-01", strtotime($d));
            }
            
      
         
        $Today = MoneyLogs::whereIn('status',['1','2'])->where('machine_id', $id)->where('created_at','like','%'.$today.'%')->sum($type);   
        $Yesterday = MoneyLogs::whereIn('status',['1','2'])->where('machine_id', $id)->where('created_at','like','%'.$yesterday.'%')->sum($type);
        $Week = MoneyLogs::whereIn('status',['1','2'])->where('machine_id', $id)->whereBetween('created_at',[$weekFrom, $today])->sum($type);
        $Month = MoneyLogs::whereIn('status',['1','2'])->where('machine_id', $id)->where('created_at','LIKE','%'.$month.'%')->sum($type);
        $financial = MoneyLogs::whereIn('status',['1','2'])->where('machine_id', $id)->whereBetween('created_at',[$finfrom,$finto])->sum($type);
        $Year = MoneyLogs::whereIn('status',['1','2'])->where('machine_id', $id)->whereBetween('created_at',[$thisYear, $today])->sum($type);
        
        
        $total = array('today'=>$Today,'yesterday'=>$Yesterday,'thisWeek'=>$Week,'thisMonth'=>$Month,'thisFinancial'=>$financial,'thisYear'=>$Year);
        return $total;
        

    } 
    
    
    public function error($id) {
                
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID); 
        $currerntUserRole = Auth::User()->id;        
        $machine = $this->machinelogs($id); 
        
        $machinelogs = DB::table('machines')
                     ->select(DB::raw(' machines.*, errorlogs.created_at as date_created, errorlogs.id as error_id, sites.site_name as site_name,'
                             . 'sites.street as street, sites.suburb as suburb, state.state_code as statecode, machine_models.machine_model as machine_model,'
                             . 'machine_types.machine_type as machine_type, machines.machine_serial_no as serial_no, machines.id as machine_id, machines.comments as comments,'
                             . 'errorlogs.log_id as log_id, errorlogs.error as error, errorlogs.type as errortype, errorlogs.id as error_id'))
                    ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                    ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                    ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
                    ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                    ->leftJoin('state', 'sites.state', '=', 'state.id')          
                    ->where('errorlogs.status','!=','2')
                    //->where('machines.status','=','1')
                    ->where('errorlogs.machine_id' ,'=', $id);       
        
        $dateRange = Input::get('dateRange');     
      
        $from = $to = ''; 
        
          $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $dayfr = $explode_from[0];
                $from = str_replace(' ','',$explode_from[2].'-'.$dayfr.'-'.$explode_from[1]);
                $day = $explode_to[0];
                $to = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
                
               
        
        if($dateRange !=''):
            $explode = explode('-',$dateRange);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);          
            $to = date('Y-m-d', strtotime('+1 day', strtotime($explode[1])));
        endif;
        
        $dateCheck = Input::get('dateRange');
        $date = new DateTime();        
        $today = $date->format('Y-m-d H:i:s');
        $toDate = $date->format('Y-m-d');
        $newdate = strtotime ( '+1 day' , strtotime ( $today ) ) ;
        
        if(!empty($dateCheck)):            
            $machinelogs = $machinelogs->where(function($query) use ($from,$to){                    
                $query->whereBetween('errorlogs.created_at', [$from, $to]);          
            })->orderBy('errorlogs.created_at','desc'); 
        else:
            $machinelogs = $machinelogs->where(function($query) use ($newdate, $toDate){                    
                $query->where('errorlogs.created_at', 'like', '%'.$toDate.'%');                        
            }); 
        endif;
        
        $machinelogs = $machinelogs->groupBy(DB::raw('errorlogs.log_id,errorlogs.created_at, errorlogs.id, sites.site_name, sites.street, sites.suburb, state.state_code, machine_models.machine_model,'
                            . 'machine_types.machine_type, machines.machine_serial_no, machines.id, machines.comments, errorlogs.error, errorlogs.type, errorlogs.id'));        
                
        $machinelogs = $machinelogs->orderBy('errorlogs.created_at','desc')->paginate(15);
        
        $machinelogsgroup =  DB::table('errorlogs_list')->select('errorlogs_list.*');        
        
        if(!empty($dateCheck)):            
            $machinelogsgroup = $machinelogsgroup->where(function($query) use ($from,$to){                    
                $query->whereBetween('errorlogs_list.created_at', [$from, $to]);          
            })->orderBy('errorlogs_list.created_at','desc'); 
        else:
            $machinelogsgroup = $machinelogsgroup->where(function($query){                    
                $query->whereDate('errorlogs_list.created_at', '=', Carbon::today());                 
            }); 
        endif;
        
        $machinelogsgroup =  $machinelogsgroup->orderBy('type','asc')->get();         
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
       
        if($var['permit']['readAll']):
            return view('machines-mgmt/error', ['machine' => $machine, 'permit' => $var['permit'], 'machinelogsgroup' => $machinelogsgroup ,'model'=>$machineModel,'machine_type'=>$machineType, 'site'=>$site , 'filterData'=>$filterData,'wh'=>$wh, 'userID'=>$currerntUserRole,'getID'=>$id]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
        
    }     

    public function win($id) {
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);
        $machine = $this->machinelogs($id);  
        
        if($var['permit']['readAll']):
            return view('machines-mgmt/win', ['id'=>$id,'machine' => $machine]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
    }

    public function money($id) {        
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);
        $machine = $this->machinelogs($id);         
        
        if($var['permit']['readAll']):
            return view('machines-mgmt/money', ['id'=>$id, 'machine' => $machine]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
    }   

    public function goals($id) {
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);
        $machine = $this->machinelogs($id);         
        
        if($var['permit']['readAll']):
            return view('machines-mgmt/goals', ['id'=>$id, 'machine' => $machine]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
    }
    
    public function machinelogs($id){
        
        $machine = DB::table('machines')
                    ->select('machines.*', 'machines.id as machine_id', 'machines.machine_serial_no as serial_no', 'machine_models.machine_model as machine_model'
                            , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                            , 'machines.comments as machine_comments', 'route.route as route', 'area.area as area'
                            , 'sites.state as state', 'sites.site_name as site','themes.theme as theme')
                    ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                    ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                    ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                    ->leftJoin('themes', 'machines.machine_theme_id', '=', 'themes.id')
                    ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                    ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                    ->where('machines.id', $id)->first();   
        
        return $machine;
    }
   
    public function filterDate($filterParam){           
        
        $result = DB::table( $filterParam['logType'])
                ->where('machine_id', $filterParam['id']) 
                ->whereBetween('created_at', array($filterParam['startdate'], $filterParam['enddate']))                
                ->paginate(10);         
        $newarray = json_decode(json_encode($result), True);
        
        return  $newarray;
    }  
       
    public function accounts($id) {
        $machine = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'city.name as city_name', 'machine_model.title as machine_model', 'machine_type.title as machine_type')
                        ->leftJoin('city', 'machines.city', '=', 'city.id')
                        ->leftJoin('machine_model', 'machines.machine_type', '=', 'machine_model.id')
                        ->leftJoin('machine_type', 'machine_model.type_id', '=', 'machine_type.id')
                        ->where('machines.id', $id)->first();

  
        $errorlogs = Machine::find($id)->errorlogs()->orderBy('created_at', 'desc')->paginate(20);
        $moneylogs = Machine::find($id)->moneylogs()->orderBy('created_at', 'desc')->paginate(20);
        $winlogs = Machine::find($id)->winlogs()->orderBy('created_at', 'desc')->paginate(20);
        $goalslogs = Machine::find($id)->goalslogs()->orderBy('created_at', 'desc')->paginate(20);

        return view('machines-mgmt/goals', ['machine' => $machine, 'errorlogs' => $errorlogs, 'moneylogs' => $moneylogs, 'winlogs' => $winlogs, 'goalslogs' => $goalslogs]);
    }
       
    public function errorapi($id){
        
                $from = $to = null; 
                $dateRange = Input::get('dateRange'); 
                
                $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
                $day = $explode_to[0];
                $to = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
         
                $userall = Errorlogs::where('machine_id',$id)
                        ->whereDate('created_at','>=', $from)
                        ->whereDate('created_at','<=', $to)
                    ->orderBy('created_at','desc')->get();
  
                return new UserCollection($userall);
     
    }
    
    public function moneyapi($id){

        
                $from = $to = null; 
                $dateRange = Input::get('dateRange'); 
                
                $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
                $day = $explode_to[0];
                $to = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
                
          
                             
                   $userall = MoneyLogs::where('machine_id',$id)
                        ->whereDate('created_at','>=', $from)
                        ->whereDate('created_at','<=', $to)
                    ->orderBy('created_at','desc')->get();
                     
     
        
        return new UserCollection($userall);

    }
    
    public function winapi($id){

         $from = $to = null; 
                $dateRange = Input::get('dateRange'); 
                
                $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
                $day = $explode_to[0];
                $to = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
         
                $userall = WinLogs::where('machine_id',$id)
                        ->whereDate('created_at','>=', $from)
                        ->whereDate('created_at','<=', $to)
                    ->orderBy('created_at','desc')->get();
  
                return new UserCollection($userall);
                
      
    }
    
    public function goalsapi($id){
        
         $from = $to = null; 
                $dateRange = Input::get('dateRange'); 
                
                $explode = explode('-',$dateRange);
                $explode_from = explode('/',$explode[0]);
                $explode_to = explode('/',$explode[1]);
                $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
                $day = $explode_to[0];
                $to = str_replace(' ','',$explode_to[2].'-'.$day.'-'.$explode_to[1]);
         
                $userall = GoalsLogs::where('machine_id',$id)
                        ->whereDate('created_at','>=', $from)
                        ->whereDate('created_at','<=', $to)
                    ->orderBy('created_at','desc')->get();
  
                return new UserCollection($userall);
                
     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        //Get machine information
        $var = $this->permission('7');
        $machine = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machines.machine_serial_no as serial_no'
                                , 'machine_models.machine_model as machine_model'
                                , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address', 'sites.id as site_id'
                                , 'machines.route as m_route', 'machines.area as m_area'
                                , 'machines.comments as machine_comments', 'route.route as route', 'area.area as area', 'sites.state as state'
                                , 'sites.site_name as site', 'themes.theme as theme')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('themes', 'machines.machine_theme_id', '=', 'themes.id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                        ->where('machines.id', $id)->first();


        if ($machine == null || count($machine) == 0) {
            return redirect()->intended('/machine-management');
        }

        $machine_types = MachineType::orderBy('machine_type', 'ASC')->get();
        $machine_models = MachineModel::orderBy('machine_model', 'ASC')->get();
        $sites = Site::orderBy('site_name', 'ASC')->get();
        $themes = Theme::orderBy('theme', 'ASC')->get();
        
        if($var['permit']['read']):
            return view('machines-mgmt/edit', ['machine' => $machine, 'machine_types' => $machine_types,
                            'machine_models' => $machine_models, 'sites' => $sites, 'themes' => $themes])
                        ->with('myreferrer', Session::get('myreferrer', URL::previous()));
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id) {
        $machine = Machine::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($machine == null || count($machine) == 0) {
            return redirect()->intended('/machine-management');
        }
        $cities = City::all();
        $states = State::all();

        $machine_types = MachineType::all();
        $machine_models = MachineModel::all();
        return view('machines-mgmt/edit', ['machine' => $machine, 'cities' => $cities, 'states' => $states, 'machine_types' => $machine_types,
            'machine_models' => $machine_models]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //$this->validateInput($request);
 
        
        $input = [
            'machine_type_id' => $request['machine_type'],
            'machine_model_id' => $request['machine_model'],
            'machine_serial_no' => $request['serial_no'],
            'ip_address' => $request['ip_address'],
            'site_id' => $request['site'],
            'category' => $request['category'],
            'machine_theme_id' => $request['theme'],
            'machine_description' => $request['description'],
            'comments' => $request['comments'],
            'version' => $request['version'],
            'status' => $request['status'],
            'teamviewer' => $request['teamviewer'],
            'route' => $request['route'],
            'area' => $request['area'],
            'carrier' => $request['carrier'],
            'franchisee' => $request['franchisee'],
            'sitegroup' => $request['sitegroup'],
            'activation_date' => $request['activation_date'],
        ];

        if (Machine::where('id', $id)->update($input)) {
            return back()->with('success', 'Machine Info successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Machine::where('id', $id)->delete();
        return redirect()->intended('/machine-management');
    }

    /**
     * Show the form for updating claw settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function claw_settings($id) {

        $machine = DB::table('machines')
                        ->select('machines.*', 'claw_settings.*', 'machines.id as machine_id')
                        ->leftJoin('claw_settings', 'machines.id', '=', 'claw_settings.machine_id')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->where('machines.id', $id)->first();

        return view('machines-mgmt/claw', ['machine' => $machine]);
    }

    public function productdefinitions_settings($id) {

        $machine = DB::table('machines')
                        ->select('machines.*', 'product_definitions.*', 'machines.id as machine_id')
                        ->leftJoin('product_definitions', 'machines.id', '=', 'product_definitions.machine_id')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->where('machines.id', $id)->first();

//        dd($machine);
        return view('machines-mgmt/product-definitions', ['machine' => $machine]);
    }

    public function cashboxes_settings($id) {

        $machine = DB::table('machines')
                        ->select('machines.*', 'cash_boxes.*', 'machines.id as machine_id')
                        ->leftJoin('cash_boxes', 'machines.id', '=', 'cash_boxes.machine_id')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->where('machines.id', $id)->first();

//        dd($machine);
        return view('machines-mgmt/cash-boxes', ['machine' => $machine]);
    }

    public function account_settings($id) {

        $machine = DB::table('machines')
                        ->select('machines.*', 'machine_accounts.*', 'machines.id as machine_id')
                        ->leftJoin('machine_accounts', 'machines.id', '=', 'machine_accounts.machine_id')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->where('machines.id', $id)->first();

//        dd($machine);
        return view('machines-mgmt/accounts', ['machine' => $machine]);
    }

    public function info_settings($id) {

        $machine = DB::table('machines')
                        ->select('machines.*', 'machine_settings.*', 'machines.id as machine_id')
                        ->leftJoin('machine_settings', 'machines.id', '=', 'machine_settings.machine_id')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->where('machines.id', $id)->first();

//        dd($machine);
        return view('machines-mgmt/info', ['machine' => $machine]);
    }

    public function updateinfo_settings(Request $request, $id) {


        $machinesettings = MachineSettings::where('machine_id', '=', $id)->first();

        $this->validate($request, [
            'xTime' => 'required|numeric',
            'yTime' => 'required|numeric',
            'xSpeed' => 'required|numeric',
            'ySpeed' => 'required|numeric',
            'zSpeed' => 'required|numeric'
        ]);

        $machinesettings->xTime = Input::get('xTime');
        $machinesettings->yTime = Input::get('yTime');
        $machinesettings->xSpeed = Input::get('xSpeed');
        $machinesettings->ySpeed = Input::get('ySpeed');
        $machinesettings->zSpeed = Input::get('zSpeed');
        $machinesettings->save();
        //dd($request);
        // redirect
//            Session::flash('message', 'Macine Settings Successfully Updated!');
        //return redirect('/info');
    }

    /**
     * Show the form for updating game settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function game_settings($id) {

        $machine = DB::table('machines')
                        ->select('machines.*', 'game_settings.*', 'machines.id as machine_id')
                        ->leftJoin('game_settings', 'machines.id', '=', 'game_settings.machine_id')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->where('machines.id', $id)->first();

//        dd($machine);
        return view('machines-mgmt/game', ['machine' => $machine]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateclawsettings(Request $request, $id) {
        
    }

    public function editsettings(Request $request, $id) {
        
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'machine_name' => $request['machinename'],
            'city.name' => $request['city']
        ];
        $machines = $this->doSearchingQuery($constraints);
        $constraints['city_name'] = $request['city_name'];
        return view('machines-mgmt/index', ['machines' => $machines, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        //$query = DB::table('machines')
        //->leftJoin('city', 'machines.city', '=', 'city.id')
        //->select('machines.machine_name as machine_name', 'machines.*','city.name as city_name');

        $query = DB::table('machines')
                ->select('machines.*', 'machines.id as machine_id', 'city.name as city_name', 'machine_model.title as machine_model', 'machine_type.title as machine_type')
                ->leftJoin('city', 'machines.city', '=', 'city.id')
                ->leftJoin('machine_model', 'machines.machine_type', '=', 'machine_model.id')
                ->leftJoin('machine_type', 'machine_model.type_id', '=', 'machine_type.id');


        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%' . $constraint . '%');
            }

            $index++;
        }
        return $query->paginate(5);
    }

    /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
        $path = storage_path() . '/app/avatars/' . $name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    private function validateInput($request) {
        $this->validate($request, [
            'machine_type' => 'required',
            'machine_model' => 'required',
            'site' => 'required',
            'serial_no' => 'required',
            'teamviewer' => 'required'
        ]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for ($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
    
    
     /**
     * Search functions and use ajax to process data 
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */

     public function ajax_getmachinemodel($id){
          $machinemodels = DB::table("machine_models")
                    ->select('machine_model','id')
                    ->where("machine_type_id",$id)
                    ->get();
          
        return json_encode($machinemodels);
     }
     
        /**
     * Test Go button function
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testGo() {
        $id = Input::get('id');
        $playcredits = Input::get('playcredits');
        
        $game = GameSettings::where('machine_id', $id)->first();
        $game->gameLeft = $playcredits;
        $game->status = "2";
        $game->save();
        
        return response()->json($game);
        

    }
     
    public function queryLogs($type,$id){

        $queryMachine = DB::table('moneylogs')
                     ->select(DB::raw('DATE(moneylogs.created_at) as created_at, machine_id, sum('.$type.') as '.$type.' '))
                     ->where('moneylogs.machine_id', $id)->where('moneylogs.'.$type,'>=', $type)
                     ->groupBy(DB::raw('DATE(moneylogs.created_at), machine_id'))->get();      
        
    
        return $queryMachine;
    }
    
   
    public function excesswin($id){
    $userallexcesswin = WinLogs::select('created_at','excessWin')->where('machine_id','=', $id)->get();

     if ($userallexcesswin->count() > 0) {
            foreach ($userallexcesswin as $value) {
                
                   $asdate = strtotime($value->created_at) * 1000;

                $excessWin = $value->excessWin;

                 $graphdataExcessWinResultwithDateresult[] = "[". $asdate .",". $excessWin ."]";
                
            }
            $graphdataExcessWinResultwithDate = join($graphdataExcessWinResultwithDateresult, ',');

         }else{
             $graphdataExcessWinResultwithDate = null;
         }
         
    return "[". $graphdataExcessWinResultwithDate . "]";
    }
    
    public function owedwin($id){
        
   $userall = WinLogs::select('created_at','owedWin')->where('machine_id','=', $id)->get();
   
    if ($userall->count() > 0) {
            foreach ($userall as $value) {
            
                $asdate = strtotime($value->created_at) * 1000;
                $ownedWin = $value->owedWin * -1;

                 $graphdataOwnedWinResultwithDateresult[] = "[". $asdate .",". $ownedWin ."]";
                
            }
            $graphdataOwnedWinResultwithDate = join($graphdataOwnedWinResultwithDateresult, ',');

         }else{
             $graphdataOwnedWinResultwithDate = null;
         }
         
     return "[". $graphdataOwnedWinResultwithDate . "]";
    }
    
    public function winresult($id){
        $graphdataWinResultwithDate = null;
      $userallwinresult = WinLogs::select('created_at','winResult')->where('machine_id','=', $id)->get();

     if ($userallwinresult->count() > 0) {
        
            foreach ($userallwinresult as $temp) {
                $tempwinResult = 0;
            
                $asdate = strtotime($temp->created_at) * 1000;
                $aswiresult = $temp->winResult;
       
                if ($aswiresult == "won") {
                    $tempwinResult = 10 * 1;
                } else {
                    $tempwinResult = 0 * 1;
                }
                
                $graphdataWinResultwithDateresult[] = "[". $asdate .",". $tempwinResult ."]";
                
            }
            $graphdataWinResultwithDate = join($graphdataWinResultwithDateresult, ",");


         }else{
             $graphdataWinResultwithDate = null;
         }
         
    return "[". $graphdataWinResultwithDate . "]";
    }
    
    public function machinegraphdata($id){
        
      $graphdataWinResultwithDate = null;
     
       $userallgoalsresult = GraphLogs::orderBy('date_created')->select('machine_id','winResult','owedWin','excessWin','dropVolt','slipVolt','pkVolt','retVolt','counter','date_created')->where('machine_id','=', $id)->where('testPlay', 'play')->get();
     if ($userallgoalsresult->count() > 0) {
        
            foreach ($userallgoalsresult as $temp) {

                $asdate = strtotime($temp['date_created']) * 1000;
                $aswiresult = $temp->winResult;
       
                if ($aswiresult == "won") {
                    $tempwinResult = 5 * 1;
                } else {
                    $tempwinResult = 0 * 1;
                }
                
                $asowedWin = $temp->owedWin * -1;
                $asexcessWin = $temp->excessWin;
                $asslipVolt = $temp->slipVolt;
                $asdropVolt = $temp->dropVolt;
                $aspkVolt = $temp->pkVolt;
             
                $graphdataWinResultwithDateresult[] = "[". $asdate .",". $asslipVolt .",". $asdropVolt .",". $aspkVolt .",". $tempwinResult .",". $asowedWin .",". $asexcessWin  ."]";
                
            }
            $graphdataWinResultwithDate = join($graphdataWinResultwithDateresult, ",");

         }else{
             $graphdataWinResultwithDate = null;
         }
         
        return "[". $graphdataWinResultwithDate . "]";
    }
    

    public function dailyCoin($id){
        $georgieCoin = $this->queryLogs('coinIn',$id);
        
        if ($georgieCoin->count() > 0) {
            foreach ($georgieCoin as $value) { 
                $asdate = strtotime($value->created_at) * 1000;
                $coin = $value->coinIn;                
                $financialGraph[] = "[". $asdate .",". $coin ."]";    
            }
            $financialGraph[] = "[". strtotime(now()) * 1000 .",". 0 ."]";  
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    public function dailyBill($id){
        $georgieBill = $this->queryLogs('billIn',$id);
        if ($georgieBill->count() > 0) {
            foreach ($georgieBill as $value) { 
                $asdate = strtotime($value->created_at) * 1000;
                $billIn = $value->billIn;                
                $financialGraph[] = "[". $asdate .",". $billIn ."]";    
            }
            $financialGraph[] = "[". strtotime(now()) * 1000 .",". 0 ."]";  
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    public function dailyCard($id){
        $georgieCard = $this->queryLogs('swipeIn',$id);
        if ($georgieCard->count() > 0) {
            foreach ($georgieCard as $value) {
                $asdate = strtotime($value->created_at) * 1000;                
                $swipeIn = ($value->swipeIn == null)? '0' : $value->swipeIn;  
                //$swipeIn = $value->swipeIn; 
                $financialGraph[] = "[". $asdate .",". $swipeIn ."]";    
            }
            $financialGraph[] = "[". strtotime(now()) * 1000 .",". '0' ."]";  
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    

      
}
