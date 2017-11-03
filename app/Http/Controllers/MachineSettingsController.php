<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MachineSettings;
use Session;    
use URL;

class MachineSettingsController extends Controller {

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
        $machine_settings = MachineSettings::paginate(10);
        return view('machine-settings/index', ['machine_settings' => $machine_settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $machine_settings = MachineSettings::all();
        return view('machine-settings/create', ['machine_settings' => $machine_settings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validateInput($request);
        MachineSettings::create([
            'machine_id' => 2,
            'xTime' => $request['xTime'],
            'yTime' => $request['yTime'],
            'xSpeed' => $request['xSpeed'],
            'ySpeed' => $request['ySpeed'],
            'zSpeed' => $request['zSpeed']
        ]);


        return redirect()->intended('/machine-settings');
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
        $machine = DB::table('machine_settings')
                        ->select('machine_settings.*','machine_id as id')
                        ->where('machine_id', $id)->first();

        if ($machine == null || count($machine) == 0) {
            return redirect()->intended('/machine-settings');
        }

        return view('machine-settings/edit', ['machine' => $machine])
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

        $this->validateInput($request);

        $input = [
            'machine_id' => $id,
            'xTime' => $request['xTime'],
            'yTime' => $request['yTime'],
            'xSpeed' => $request['xSpeed'],
            'ySpeed' => $request['ySpeed'],
            'zSpeed' => $request['zSpeed']
        ];
        
        
        if (MachineSettings::where('machine_id', $id)->update($input)) {
           return back()->with('success', 'Machine Settings successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        MachineSettings::where('id', $id)->delete();
        return redirect()->intended('machine-settings/show');
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
        $query = MachineSettings::query();
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
            'xTime' => 'required|numeric',
            'yTime' => 'required|numeric',
            'xSpeed' => 'required|numeric',
            'ySpeed' => 'required|numeric',
            'zSpeed' => 'required|numeric'
        ]);
    }

}
