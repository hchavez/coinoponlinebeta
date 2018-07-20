<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ThemeList;
use App\ToyList;

class ToyListsController extends Controller
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
       $toylists = ToyList::orderBy('toy_name', 'asc')->get();
       return view('toy-lists/index', ['toylists' => $toylists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toylist = ToyList::orderBy('toy_name')->get();
        return view('toy-lists/create', ['toylists' => $toylist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
         ToyList::create([
            'toy_name' => $request['toy_name'],
            'toy_code' => $request['toy_code'],
            'status' => '1',
        ]);
                                

        return redirect()->intended('toy-lists');
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
        $toylist = ToyList::find($id);
        // Redirect to theme list if updating theme wasn't existed
        if ($theme == null || count($theme) == 0) {
            return redirect()->intended('toy-lists');
        }

        $states = ToyList::all();
        return view('toy-lists/edit', ['toylist' => $toylist]);
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
        $toylist = ToyList::findOrFail($id);
    
        $input = [
            'toy_name' => $request['toy_name'],
            'toy_code' => $request['toy_code'],
            'updated_at' => now(),
            'status' => '1',
        ];
        ToyList::where('id', $id)
            ->update($input);
        
        return redirect()->intended('toy-lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ToyList::where('id', $id)->delete();
         return redirect()->intended('toy-lists');
    }

    /**
     * Search theme from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['toy_name']
            ];

       $cities = $this->doSearchingQuery($constraints);
       return view('toy-lists/index', ['cities' => $cities, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = ToyList::query();
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
