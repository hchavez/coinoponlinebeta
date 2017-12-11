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


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $machinelogs = DB::table('machines')
        ->select('machines.*','errorlogs.id as error_id','sites.site_name as site_name',
                'sites.street as street','sites.suburb as suburb','state.state_code as statecode',
                'machine_models.machine_model as machine_model','machine_types.machine_type as machine_type',
                 'machines.machine_serial_no as serial_no','machines.comments as comments',
                'errorlogs.error as error','errorlogs.type as errortype')
        ->leftJoin('machine_models', 'machines.machine_model_id', '=', 'machine_models.id')
        ->leftJoin('machine_types', 'machines.machine_type_id', '=', 'machine_types.id')
        ->leftJoin('errorlogs', 'machines.id', '=', 'errorlogs.machine_id')
        ->leftJoin('sites', 'machines.site_id', '=', 'sites.id')
        ->leftJoin('state', 'sites.state', '=', 'state.id')
        ->where('errorlogs.type','1')
        ->whereDate('errorlogs.created_at', '=', Carbon::today())
         ->get();

        return view('dashboard/index', ['machinelogs' => $machinelogs]);
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
