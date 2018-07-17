<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ThemeList;
use App\ProductList;

class ThemeListsController extends Controller
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
       $themelists = ThemeList::orderBy('theme_name', 'asc')->get();
       return view('theme-lists/index', ['themelists' => $themelists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themelists = ThemeList::all();
        $productlist = ProductList::orderBy('product_name')->get();
        return view('theme-lists/create', ['themelists' => $themelists,'productlist' => $productlist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         ThemeList::create([
            'theme_name' => $request['theme_name'],
            'avgWeight' => $request['avgWeight'],
             'slipVoltage' => $request['slipVoltage'],
             'pkVoltage' => $request['pkVoltage'],
             'retVoltage' => $request['retVoltage'],
             'slipPWM' => $request['slipPWM'],
             'pkupPWM' => $request['pkupPWM'],
             'retPWM' => $request['retPWM'],
             'diffPickRetPWM' => $request['diffPickRetPWM'],
             'totalToyPurchaseCost' => $request['totalToyPurchaseCost'],
             'playsPerWin' => $request['playsPerWin'],
             'stockLeft' => $request['stockLeft'],
             'productCode' => $request['productCode'],
              'status' => '1',
        ]);
                                

        return redirect()->intended('theme-lists');
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
        $theme = ThemeList::find($id);
        // Redirect to theme list if updating theme wasn't existed
        if ($theme == null || count($theme) == 0) {
            return redirect()->intended('theme-lists');
        }

        $themelists = ThemeList::all();
        return view('theme-lists/edit', ['themelists' => $themelists]);
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
        $theme = ThemeList::findOrFail($id);
         //$this->validate($request, ['theme_name' => 'required']);
        $input = [
             'theme_name' => $request['theme_name'],
            'avgWeight' => $request['avgWeight'],
             'slipVoltage' => $request['slipVoltage'],
             'pkVoltage' => $request['pkVoltage'],
             'retVoltage' => $request['retVoltage'],
             'slipPWM' => $request['slipPWM'],
             'pkupPWM' => $request['pkupPWM'],
             'retPWM' => $request['retPWM'],
             'diffPickRetPWM' => $request['diffPickRetPWM'],
             'totalToyPurchaseCost' => $request['totalToyPurchaseCost'],
             'playsPerWin' => $request['playsPerWin'],
             'stockLeft' => $request['stockLeft'],
             'productCode' => $request['productCode'],
              'status' => '1',
        ];
        ThemeList::where('id', $id)
            ->update($input);
        
        return redirect()->intended('theme-lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ThemeList::where('id', $id)->delete();
         return redirect()->intended('theme-lists');
    }

    /**
     * Search theme from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['theme_name']
            ];

       $cities = $this->doSearchingQuery($constraints);
       return view('theme-lists/index', ['cities' => $cities, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = ThemeList::query();
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
        'name' => 'required|max:60|unique:theme'
    ]);
    }
}
