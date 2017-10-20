<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\SiteType;

class SiteTypeController extends Controller
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
        $sitetypes = SiteType::paginate(10);
        return view('site-type/index', ['sitetypes' => $sitetypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitetype = SiteType::all();
        return view('site-type/create', ['sitetype' => $sitetype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        SiteType::create([
            'name' => $request['name']
        ]);

        return redirect()->intended('system-management/site-type');
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
        $sitetype = SiteType::find($id);
        // Redirect to site-type list if updating site-type wasn't existed
        if ($sitetype == null || count($sitetype) == 0) {
            return redirect()->intended('/system-management/site-type');
        }

        return view('site-type/edit', ['sitetype' => $sitetype]);
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
        $sitetype = SiteType::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name']
        ];
        SiteType::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/site-type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SiteType::where('id', $id)->delete();
         return redirect()->intended('system-management/site-type');
    }

    /**
     * Search site-type from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $sitetypes = $this->doSearchingQuery($constraints);
       return view('site-type/index', ['sitetypes' => $sitetypes, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = SiteType::query();
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
        'name' => 'required|max:60|unique:site-type'
    ]);
    }
}
