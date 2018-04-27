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
        $data = Input::all();
        $startnewformat = date("Y-m-d", strtotime(Input::get('startdate')) );     
        $endnewformat = date("Y-m-d", strtotime(Input::get('enddate')) );

        $machines = DB::table('machines')
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
                        ->where('machines.status', '1');
                        //->latest('machines.created_at')->paginate(100);   
        if ( !$data ) :
        else:            
            if($data['startdate'] || $data['enddate']):
                $machines = $machines->where(function($query) use ($startnewformat,$endnewformat){                    
                    $query->whereBetween('machine_reports.date_created', [$startnewformat, $endnewformat]);               
                });            
            endif;
        endif;
        $machines = $machines->latest('machines.created_at')->get(); 
       
        return view('machines-mgmt/index', ['start' => Input::get('startdate'),'end' => Input::get('enddate'), 'machines' => $machines]);
        
    }     

    public function date_filter() {
        // $reservations = Reservation::whereBetween('reservation_from', [$from, $to])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $cities = City::all();
        $states = State::all();
        $machine_types = MachineType::all();
        $machine_models = MachineModel::all();
        $sites = Site::all();
        $themes = Theme::all();

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
            'ip_address' => $request['ipaddress'],
            'machine_description' => $request['description'],
            'comments' => $request['comments'],
            'machine_type_id' => $request['machine_type'],
            'machine_model_id' => $request['machine_model'],
            'machine_serial_no' => $request['serial_no'],
            'site_id' => $request['site'],
            'purchase_amount' => $request['purchase_amount'],
            'purchase_date' => $request['purchase_date'],
            'sold_amount' => $request['sold_amount'],
            'sale_date' => $request['sold_date'],
            'version' => $request['version'],
            'status' => '1'
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
                            ->where('testPlay', 'play')->get();
        
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
                                    ->where('testPlay', 'play')->get();
        
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
                                        ->where('testPlay', 'play')->get();
        
        if ($graphdataOwnedWinQuery->count() > 0) {
            foreach ($graphdataOwnedWinQuery as $value) {
                $graphdataOwnedWinresult[] = $value->owedWin;
            }
            $graphdataOwnedWinResult = join($graphdataOwnedWinresult, ',');
        } else {
            $graphdataOwnedWinResult = null;
        }

        //Get RetVolt Data for graphview
        $graphdataDropVoltQuery = DB::table('goalslogs')->select('dropVolt')->where('machine_id', $id)
                               // ->whereMonth('created_at', '=', date('m'))    
                                ->where('startEndFlag','=',  '2')->where('testPlay', 'play')->get();
        
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
                                ->where('dropCount','=', '1')->where('testPlay', 'play')->get();
           
        if ($graphdataPkVoltQuery->count() > 0) {
            foreach ($graphdataPkVoltQuery as $value) {
                $graphdataPkVoltresult[] = $value->pkVolt;
            }
            $graphdataPkVoltResult = join($graphdataPkVoltresult, ',');
        } else {
            $graphdataPkVoltResult = null;
        }
        
        
        return view('machines-mgmt/show', ['machine' => $machine, 'machine_settings' => $machine_settings, 'claw_settings' => $claw_settings, 'game_settings' => $game_settings,
            'machine_accounts' => $machine_accounts, 'product_def' => $product_def, 'cash_boxes' => $cash_boxes,
            'graphdataWinResult' => $graphdataWinResult,
            'graphdataExcessWinResult' => $graphdataExcessWinResult,
            'graphdataOwnedWinResult' => $graphdataOwnedWinResult,
            'graphdataDropVoltResult' => $graphdataDropVoltResult,
            'graphdataPkVoltResult' => $graphdataPkVoltResult,
            'machinerecords' => $machinerecords,
            'totalPlay' => $totalPlay,
            'totalMoneyquery' => $totalMoneyquery
        ]);
        
        
    }  
       
    public function error($id) {
                                         
        $machine = $this->machinelogs($id);  
        $val = array(
            'id' =>  $id,
            'type' => 'errorlogs',
            'startdate' => date("Y-m-d", strtotime(Input::get('startdate'))),
            'enddate' => date("Y-m-d", strtotime(Input::get('enddate')))
        );        
        $errorLogs = $this->kLogs($val);    
       
        return view('machines-mgmt/error', ['error' => $errorLogs['data'],'total' => $errorLogs['total'], 'machine' => $machine]);
    }     

    public function win($id) {
        
        $machine = $this->machinelogs($id);  
        $val = array(
            'id' =>  $id,
            'type' => 'winlogs',
            'startdate' => date("Y-m-d", strtotime(Input::get('startdate'))),
            'enddate' => date("Y-m-d", strtotime(Input::get('enddate')))
        );        
        $winLogs = $this->kLogs($val);
        
        return view('machines-mgmt/win', ['win' => $winLogs['data'],'total' => $winLogs['total'], 'machine' => $machine]);
    }

    public function money($id) {        
        
        $machine = $this->machinelogs($id);  
        $val = array(
            'id' =>  $id,
            'type' => 'moneylogs',
            'startdate' => date("Y-m-d", strtotime(Input::get('startdate'))),
            'enddate' => date("Y-m-d", strtotime(Input::get('enddate')))
        );        
        $moneylogs = $this->kLogs($val);
        
        return view('machines-mgmt/money', ['money' => $moneylogs['data'], 'total' => $moneylogs['total'],'machine' => $machine]);
    }

    public function goals($id) {
        
        $machine = $this->machinelogs($id);  
        $val = array(
            'id' =>  $id,
            'type' => 'goalslogs',
            'startdate' => date("Y-m-d", strtotime(Input::get('startdate'))),
            'enddate' => date("Y-m-d", strtotime(Input::get('enddate')))
        );        
        $moneylogs = $this->kLogs($val);
        
        return view('machines-mgmt/goals', ['goals' => $moneylogs['data'], 'total' => $moneylogs['total'], 'machine' => $machine]);

    }

    public function machinelogs($id){
        
        $machine = DB::table('machines')
                    ->select('machines.*', 'machines.id as machine_id', 'machines.machine_serial_no as serial_no', 'machine_models.machine_model as machine_model'
                            , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address'
                            , 'machines.comments as machine_comments', 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                    ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                    ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                    ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                    ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                    ->leftJoin('area', 'sites.area_id', '=', 'area.id')
                    ->where('machines.id', $id)->first();   
        
        return $machine;
    }
    
    public function apiurl($log){
        
        $actual_link = 'http://'.$_SERVER['HTTP_HOST'];
        if($actual_link == 'http://localhost'){
            $actual_link = $actual_link.'/coinoponlinebeta/public/'.$log;
        }else{
            $actual_link = $actual_link.'/'.$log;
        }      
        
        return $actual_link;
    }
    
    public function jsondata($logType){
        
        $pageid = Input::get('page');        
        $actual_link = $this->apiurl($logType);
        $jsonurl = $actual_link."?page=".$pageid;
        $json = file_get_contents($jsonurl,0,null,null);
        $json_output = json_decode($json);
        $newarray = json_decode(json_encode($json_output), True);
        
        return $newarray;
        
    }
    
    public function mlogs($filterParam){           
        
        $result = DB::table( $filterParam['logType'])
                ->where('machine_id', $filterParam['id'])
                ->whereBetween('created_at', array($filterParam['startdate'], $filterParam['enddate']))
                ->paginate(10);         
        $newarray = json_decode(json_encode($result), True);
        
        return  $newarray;
    }
    
    public function kLogs($val){
        
        if($val['startdate'] != '1970-01-01'){            
            $filterParam = array(
                'id' => $val['id'],
                'logType' => $val['type'],
                'startdate' => $val['startdate'],
                'enddate' => $val['enddate']
            );   
            $result = $this->mlogs($filterParam);                   
            $data = $result['data'];    
            $totalPage = $result['total'];              
            $logs = array(
                'data' =>$data,
                'total' => $totalPage
            );
            
        }else{            
            $jsonData = $this->jsondata($val['type']);
            $totalPage = $jsonData['meta']['total'];
            $data = $jsonData['data'];     
            $logs = array(
                'data' =>$data,
                'total' => $totalPage
            );            
        } 
        
        return $logs;
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        //Get machine information

        $machine = DB::table('machines')
                        ->select('machines.*', 'machines.id as machine_id', 'machines.machine_serial_no as serial_no', 'machine_models.machine_model as machine_model'
                                , 'machine_types.machine_type as machine_type', 'machines.ip_address as ip_address', 'sites.id as site_id'
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

        $machine_types = MachineType::all();
        $machine_models = MachineModel::all();
        $sites = Site::all();
        $themes = Theme::all();

        return view('machines-mgmt/edit', ['machine' => $machine, 'machine_types' => $machine_types,
                            'machine_models' => $machine_models, 'sites' => $sites, 'themes' => $themes])
                        ->with('myreferrer', Session::get('myreferrer', URL::previous()));
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
            'machine_theme_id' => $request['theme'],
            'machine_description' => $request['description'],
            'comments' => $request['comments'],
            'version' => $request['version']
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
            'ipaddress' => 'required'
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

}
