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
use App\MachineReports;
use App\CashBoxes;
use App\ProductDefinitions;
use Session;
use Carbon\Carbon;
use URL;
use Input;
use DateTime;

class MachineReportsController extends Controller {

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
                                , 'machine_reports.pkup_volt as pkup_volt'
                                , 'machine_reports.ret_volt as ret_volt', 'machine_reports.owed_win as owed_win', 'machine_reports.excess_win as excess_win'
                                , 'machine_reports.last_visit as last_visit','machine_reports.date_created as date_created'
                                , 'route.route as route', 'area.area as area', 'sites.state as state', 'sites.site_name as site')
                        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
                        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
                        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
                        ->leftJoin('machine_reports', 'machines.id', '=', 'machine_reports.machine_id')
                        ->leftJoin('route', 'sites.route_id', '=', 'route.id')
                        ->leftJoin('area', 'sites.area_id', '=', 'area.id')                        
                        ->where('machines.status', '1');     
        if ( !$data ) :
        else:            
            if($data['startdate'] || $data['enddate']):
                $machines = $machines->where(function($query) use ($startnewformat,$endnewformat){                    
                    $query->whereBetween('machine_reports.date_created', [$startnewformat, $endnewformat]);               
                });            
            endif;
        endif;
        
        $machines = $machines->latest('machine_reports.date_created')->get();     
         
        return view('machines-mgmt/reports', ['start' => Input::get('startdate'),'end' => Input::get('enddate'), 'machines' => $machines]);
        
    }

 
}
