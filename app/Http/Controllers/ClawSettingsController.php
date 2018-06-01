<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ClawSettings;
use Session;    
use URL;

class ClawSettingsController extends Controller {

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
    public function index() {
        $clawsettings = ClawSettings::paginate(10);
        return view('claw-settings/index', ['clawsettings' => $clawsettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $states = ClawSettings::all();
        return view('claw-settings/create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        ClawSettings::findOrFail($request['state_id']);
        $this->validateInput($request);
        site::create([
            'name' => $request['name'],
            'state_id' => $request['state_id']
        ]);

        return redirect()->intended('system-management/site');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //$machine = DB::table('claw_settings')->where('machine_id', $id)->first();

        $machine = DB::table('claw_settings')
                        ->select('claw_settings.*', 'machine_id as id')
                        ->where('machine_id', $id)->first();

        if ($machine == null || count($machine) == 0) {
            return redirect()->intended('/claw-settings');
        }

        return view('claw-settings/edit', ['machine' => $machine])
                        ->with('myreferrer', Session::get('myreferrer', URL::previous()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $input = [
            'max_voltage' => $request['max_voltage'],
            'min_voltage' => $request['min_voltage'],
            'max_PWM' => $request['max_PWM'],
            'min_PWM' => $request['min_PWM'],
            'voltDecRetPercentage' => $request['voltDecRetPercentage'],
            //'latest_voltage' => $request['latest_voltage'],
            //'latest_PWM' => $request['latest_PWM'],
            'plusPick' => $request['plusPick'],
            //'retPWM' => $request['retPWM'],
            //'retVolt' => $request['retVolt'],
            //'pickPWM' => $request['pickPWM'],
            //'pickVolt' => $request['pickVolt'],
            'incVolt' => $request['incVolt'],
            'decVolt' => $request['decVolt'],
            'voltSupply' => $request['voltSupply'],
            'insuffVoltInc' => $request['insuffVoltInc'],
            'voltReso' => $request['voltReso'],
            'status' => '2',
        ];
        
        
        if (ClawSettings::where('machine_id', $id)->update($input)) {
            \LogActivity::addToLog('Updated Machine Claw Settings');
            return back()->with('success', 'Machine Claw Settings successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        ClawSettings::where('id', $id)->delete();
        return redirect()->intended('system-management/site');
    }

    /**
     * Search site from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
        ];

        $cities = $this->doSearchingQuery($constraints);
        return view('site/index', ['cities' => $cities, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = ClawSettings::query();
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

    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required|max:60|unique:site'
        ]);
    }

}
