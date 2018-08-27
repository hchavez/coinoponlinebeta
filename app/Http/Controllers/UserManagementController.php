<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UsersRole;
use App\UsersGroup;
use Illuminate\Support\Facades\Auth;
use Input;

class UserManagementController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user-management';

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
        $users = User::get();       
        $currerntUserRole = Auth::User()->id;
        $get_user = DB::table('users')
                    ->select('users.*','users.id as userID', 'users_role.*')
                    ->leftJoin('users_role', 'users.id', '=', 'users_role.user_id') 
                    ->get(); 
           
        return view('users-mgmt/index', ['users' => $users,'userRole' =>$currerntUserRole,'getUser' => $get_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $usersGroup = DB::table('users_group')->get();
        $usersRole = DB::table('users_role')->where('user_id', '=', Auth::User()->id)->first();
        return view('users-mgmt/create', ['group' =>$usersGroup,'currentRole' => $usersRole]);
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
         User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname']
        ]);

        return redirect()->intended('/user-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $users = DB::table('users')->where('id', '=', $id)->get();
        $usersGroup = DB::table('users_group')->get();
        $usersRole = DB::table('users_role')->where('user_id', '=', $id)->first();
       
        $logs = \LogActivity::logActivityLists();  
            
        $get_user = DB::table('users')
                    ->select('users.*', 'users.id as users_id','users.username as username'
                            , 'log_activities.subject as subject', 'log_activities.url as url'
                            , 'log_activities.ip as ip', 'log_activities.agent as agent', 'log_activities.updated_at as updated_at')
                    ->leftJoin('log_activities', 'log_activities.user_id', '=', 'users.id')                                        
                    ->where('log_activities.user_id', $id);  
        $act = $get_user->latest('log_activities.updated_at')->get(); 
        $status = \AppHelper::getRole($id);  
        
        return view('users-mgmt/show', ['users' => $users, 'logs' => $act, 'group'=>$usersGroup, 'currentRole'=>$usersRole, 'status' => $status]);
    }
    
    public function set_permission(Request $request)
    {        
        $id = Input::get('user_id');
        $input = [
            'user_role' => Input::get('user_role')            
        ];
        if (UsersRole::where('user_id', $id)->update($input)) {
            return back()->with('success', 'Machine Info successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
    }
    
    public function update_status(Request $request)
    {        
        $id = Input::get('user_id');
        $input = [
            'status' => Input::get('status')            
        ];
        if (UsersRole::where('user_id', $id)->update($input)) {
            return back()->with('success', 'Machine Info successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
            return redirect()->intended('/user-management');
        }

        return view('users-mgmt/edit', ['user' => $user]);
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
        $user = User::findOrFail($id);
        $constraints = [
            'username' => 'required|max:20',
            'firstname'=> 'required|max:60',
            'lastname' => 'required|max:60'
            ];
        $input = [
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname']
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        User::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/user-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
         return redirect()->intended('/user-management');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'department' => $request['department']
            ];

       $users = $this->doSearchingQuery($constraints);
       return view('users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = User::query();
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
        'username' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'firstname' => 'required|max:60',
        'lastname' => 'required|max:60'
    ]);
    }
}
