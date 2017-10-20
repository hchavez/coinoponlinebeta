<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\SiteGroup;

class SiteGroupController extends Controller
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
        $sitegroups = SiteGroup::paginate(10);
        return view('site-group/index', ['sitegroups' => $sitegroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sitegroup = SiteGroup::all();
        return view('site-group/create', ['sitegroup' => $sitegroup]);
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
        SiteGroup::create([
            'name' => $request['name']
        ]);

        return redirect()->intended('system-management/site-group');
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
        $sitegroup = SiteGroup::find($id);
        // Redirect to site_group list if updating site_group wasn't existed
        if ($sitegroup == null || count($sitegroup) == 0) {
            return redirect()->intended('/system-management/site_group');
        }

        return view('site-group/edit', ['sitegroup' => $sitegroup]);
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
        $site_group = SiteGroup::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name']
        ];
        SiteGroup::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/site-group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SiteGroup::where('id', $id)->delete();
         return redirect()->intended('system-management/site-group');
    }

    /**
     * Search site_group from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $sitegroups = $this->doSearchingQuery($constraints);
       return view('site-group/index', ['sitegroups' => $sitegroups, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = SiteGroup::query();
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
        'name' => 'required|max:60|unique:site_group'
    ]);
    }
}
