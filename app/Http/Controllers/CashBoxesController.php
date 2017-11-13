<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CashBoxes;
use Session;
use URL;

class CashBoxesController extends Controller {

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
        $machine_settings = CashBoxes::paginate(10);
        return view('cash-boxes/index', ['machine_settings' => $machine_settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $machine_settings = CashBoxes::all();
        return view('cash-boxes/create', ['machine_settings' => $machine_settings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validateInput($request);
        CashBoxes::create([
            'machine_id' => $request['machine_id'],
            'total_dollar_in' => $request['total_dollar_in'],
            'total_won' => $request['total_won'],
            'status' => '0'
        ]);


        return redirect()->intended('/cash-boxes');
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
        $machine_cash_boxes = DB::table('cash_boxes')
                        ->select('cash_boxes.*', 'machine_id as id')
                        ->where('machine_id', $id)->first();

        if ($machine_cash_boxes == null || count($machine_cash_boxes) == 0) {
            return redirect()->intended('/cash-boxes');
        }

        return view('cash-boxes/edit', ['machine' => $machine_cash_boxes])
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
            'coin1_total_in' => $request['coin1_total_in'],
            'coin2_total_in' => $request['coin2_total_in'],
            'coin3_total_in' => $request['coin3_total_in'],
            'coin4_total_in' => $request['coin4_total_in'],
            'total_game' => $request['total_game'],
            'total_test' => $request['total_test'],
            'insuffMonPlay' => $request['insuffMonPlay'],
            'rejectionCounter' => $request['rejectionCounter'],
            'insuffMonClick' => $request['insuffMonClick'],
            'status' => '0'
        ];


        if (CashBoxes::where('machine_id', $id)->update($input)) {
            return back()->with('success', 'Machine Cash Boxes successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        CashBoxes::where('id', $id)->delete();
        return redirect()->intended('cash-boxes/show');
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
        $query = CashBoxes::query();
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