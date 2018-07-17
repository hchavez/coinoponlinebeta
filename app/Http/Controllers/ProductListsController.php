<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ThemeList;
use App\ProductList;

class ProductListsController extends Controller
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
       $productlists = ProductList::orderBy('product_name', 'asc')->get();
       return view('product-lists/index', ['productlists' => $productlists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productlists = ProductList::all();
        $productlist = ProductList::orderBy('product_name')->get();
        return view('product-lists/create', ['productlists' => $productlists,'productlist' => $productlist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductList::findOrFail($request['id']);
        $this->validateInput($request);
         ProductList::create([
            'product_name' => $request['product_name'],
            'product_code' => $request['product_code'],
            'status' => '1',
        ]);
                                

        return redirect()->intended('themes');
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
        $productlist = ProductList::find($id);
        // Redirect to theme list if updating theme wasn't existed
        if ($theme == null || count($theme) == 0) {
            return redirect()->intended('product-lists');
        }

        $states = ProductList::all();
        return view('product-lists/edit', ['productlist' => $productlist]);
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
        $productlist = ProductList::findOrFail($id);
         $this->validate($request, ['theme_name' => 'required']);
        $input = [
            'product_name' => $request['product_name'],
            'product_code' => $request['product_code'],
            'updated_at' => now(),
            'status' => '1',
        ];
        ProductList::where('id', $id)
            ->update($input);
        
        return redirect()->intended('product-lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductList::where('id', $id)->delete();
         return redirect()->intended('product-lists');
    }

    /**
     * Search theme from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['product_name']
            ];

       $cities = $this->doSearchingQuery($constraints);
       return view('product-lists/index', ['cities' => $cities, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = ProductList::query();
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
