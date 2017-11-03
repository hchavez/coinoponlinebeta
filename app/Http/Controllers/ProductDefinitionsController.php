<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProductDefinitions;
use Session;
use URL;

class ProductDefinitionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $prod_def = ProductDefinitions::paginate(10);
        return view('product-definitions/index', ['prod_def' => $prod_def]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = ProductDefinitions::all();
        return view('product-definitions/create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductDefinitions::findOrFail($request['state_id']);
        $this->validateInput($request);
        ProductDefinitions::create([
             'coinPerPlay' => $request['coinPerPlay'],
            'winPercentage' => $request['winPercentage'],
            'ttlPurCost' => $request['ttlPurCost'],
            'numberOfPlays' => $request['numberOfPlays'],
            'stockLeft' => $request['stockLeft'],
            'stockAdded' => $request['stockAdded'],
            'stockRemoved' => $request['stockRemoved'],
        ]);

        return redirect()->intended('system-management/site');
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
          $machine_prod_def = DB::table('product_definitions')
                         ->select('product_definitions.*','machine_id as id')
                        ->where('machine_id', $id)->first();

        if ($machine_prod_def == null || count($machine_prod_def) == 0) {
            return redirect()->intended('/product-definitions');
        }

        return view('product-definitions/edit', ['machine' => $machine_prod_def])
               ->with('myreferrer', Session::get('myreferrer', URL::previous()));
                                
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

        $input = [
            'coinPerPlay' => $request['coinPerPlay'],
            'winPercentage' => $request['winPercentage'],
            'winPercentage' => $request['ttlPurCost'],
            'numberOfPlays' => $request['numberOfPlays'],
            'stockLeft' => $request['stockLeft'],
            'stockAdded' => $request['stockAdded'],
            'stockRemoved' => $request['stockRemoved'],
        ];

        if (ProductDefinitions::where('machine_id', $id)->update($input)) {
            return back()->with('success', 'Machine Product Definitions successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductDefinitions::where('id', $id)->delete();
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
        $query = ProductDefinitions::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
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
