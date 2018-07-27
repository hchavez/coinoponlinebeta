<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MachineAccounts;
use Session;    
use URL;

class MachineAccountsController extends Controller {

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
        $machine_settings = MachineAccounts::paginate(10);
        return view('machine-accounts/index', ['machine_settings' => $machine_settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $machine_settings = MachineAccounts::all();
        return view('machine-accounts/create', ['machine_settings' => $machine_settings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validateInput($request);
        MachineAccounts::create([
             'machine_id' => $request['machine_id'],
            'total_dollar_in' => $request['total_dollar_in'],
            'total_won' => $request['total_won'],
            'status' => '2'
        ]);


        return redirect()->intended('/machine-accounts');
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
        $url = url()->current();
        $objectID = \AppHelper::objectId($url);
        $var = $this->permission($objectID);  
        
        $machine_accounts = DB::table('machine_accounts')
                        ->select('machine_accounts.*','machine_id as id')
                        ->where('machine_id', $id)->first();

        if ($machine_accounts == null || count($machine_accounts) == 0) {
            return redirect()->intended('/machine-accounts');
        }
             
        if($var['permit']['read']):
             return view('machine-accounts/edit', ['permit' => $var['permit'], 'machine' => $machine_accounts])
                        ->with('myreferrer', Session::get('myreferrer', URL::previous()));
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
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
            'ipAdd' => $request['ipAdd'],
            'total_dollar_in' => $request['total_dollar_in'],
            'total_won' => $request['total_won'],
            'status' => '2'
        ];

         if (MachineAccounts::where('machine_id', $id)->update($input)) {
            \LogActivity::addToLog('Updated Machine Accounts Settings');
            return back()->with('success', 'Machine Accounts successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        MachineAccounts::where('id', $id)->delete();
        return redirect()->intended('machine-accounts/show');
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
        $query = MachineAccounts::query();
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
    
    public function permission($id)
    {                
        $userDetails = \AppHelper::currentUser();     
        $userRole = \AppHelper::getRole($userDetails[0]['userID']);  
        $permission = \AppHelper::userPermission(Auth::User()->id, $id);      
        $permit = array(
            'readAll' => \AppHelper::isReadAll($permission),
            'addAll' => \AppHelper::isAddAll($permission),
            'editAll' => \AppHelper::isEditAll($permission),
            'read' => \AppHelper::isRead($permission),
            'edit' => \AppHelper::isEdit($permission),
            'delete' => \AppHelper::isDelete($permission),
        );        
        $permitDetails = array('userDetails' => $userDetails, 'userRole' => $userRole, 'permit' => $permit);        
        return $permitDetails;
    }

}
