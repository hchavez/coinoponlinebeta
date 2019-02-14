<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\Site;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
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
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);         
        $var = $this->permission();        
               
        if($var['permit']['readAll']):
            return view('site/index', ['userRole' =>$var['userRole'][0]['user_id']]);
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
    }
    
    public function site_api()
    {                   
        $sites = DB::table('sites')
            ->select('sites.*','route.route as route_name','area.area as area','site_types.site_type as site_type','site_groups.site_group_name as site_group')
            ->leftJoin('route', 'sites.route_id', '=', 'route.id')
            ->leftJoin('area', 'sites.area_id', '=', 'area.id')
            ->leftJoin('site_types', 'sites.site_type_id', '=', 'site_types.id')
            ->leftJoin('site_groups', 'sites.group_id', '=', 'site_groups.id')
            ->orderBy('sites.site_name', 'asc')->get();
        $data = array('data' => $sites);
        return $data;
    }

    public function permission()
    {                
        $userDetails = \AppHelper::currentUser();     
        $userRole = \AppHelper::getRole($userDetails[0]['userID']);  
        $permission = \AppHelper::userPermission(Auth::User()->id,'17');      
        $permit = array(
            'readAll' => \AppHelper::isReadAll($permission),
            'addAll' => \AppHelper::isAddAll($permission),
            'editAll' => \AppHelper::isEditAll($permission)
        );        
        $permitDetails = array('userDetails' => $userDetails, 'userRole' => $userRole, 'permit' => $permit);        
        return $permitDetails;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $var = $this->permission();
        $states = State::all();
        if($var['permit']['addAll']):
            return view('site/create', ['states' => $states]);
        else:
            return view('profile/index', ['permit' => $var['permit'],'userDetails' => $var['userDetails'],'user_id' => $var['userDetails'][0]['id'],'userGroup' => $var['userRole'][0]['users_group']]);
        endif;
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
         Site::create([
            'site_name' => $request['site_name'],
            'state' => $request['state']
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
        $site = site::find($id);
        // Redirect to site list if updating site wasn't existed
        if ($site == null || count($site) == 0) {
            return redirect()->intended('/system-management/site');
        }

    
        return view('site/edit', ['site' => $site]);
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
        $site = City::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name'],
            'state_id' => $request['state_id']
        ];
        City::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/site');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::where('id', $id)->delete();
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
        $query = City::query();
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
