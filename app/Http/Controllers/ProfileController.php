<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Resources\User as UserResource;
use Response;
use App\Profile;
use Session;
use URL;
use Input;
use DateTime;

class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $id;
    public function __construct()
    {
        $this->middleware('auth');
    }

      /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $userDetails = \AppHelper::currentUser();     
        $userRole = \AppHelper::getRole($userDetails[0]['userID']);   
       
        return view('profile/index', ['userDetails' => $userDetails, 'user_id' => Auth::user()->id, 'userGroup' => $userRole[0]['users_group']]);
    }
    
    public function user_type($id){
        $urole = ''; $color = '';
        if($id == '0'){ $urole = 'Super Admin'; $color = 'danger';}
        if($id == '1'){ $urole = 'Admin'; $color = 'warning';}
        if($id == '2'){ $urole = 'AMF Admin'; $color = 'info';}
        if($id == '3'){ $urole = 'Manager'; $color = 'success';}
        if($id == '4'){ $urole = 'Operator'; $color = 'primary';}
        if($id == '5'){ $urole = 'Service'; $color = 'dark';}
        return $urole;
    }
        
    public function edit($id)
    {                
        $get_user = DB::table('users')
                    ->select('users.*','users.id as userID', 'users_role.*')
                    ->leftJoin('users_role', 'users.id', '=', 'users_role.user_id') 
                    ->where('users.id','=', $id)
                    ->get()->toArray();
        
        return view('profile/edit', ['userDetails' => $get_user, 'user_id'=> Auth::user()->id ])
        ->with('myreferrer', Session::get('myreferrer', URL::previous()));
    }

    public function update(Request $request, $id)
    {
        $role = Auth::user()->role;
        $input = [
            'username' => $request['username'],
            'email' => $request['email'],
            'lastname' => $request['lastname'],
            'firstname' => $request['firstname']            
        ];

        if (Profile::where('id', $id)->update($input)) {
            return back()->with('success', 'User Info successfully updated!')->with('myreferrer', $request->get('myreferrer'));
        }        
    }
    
    public function create()
    {
        echo $this->id;
        $role = Auth::user()->role;
        $generated_password = $this->generate_password();
        return view('profile/create', ['pass' => $generated_password, 'user_role' => $role, 'user_id' => $this->id] );
    }

    public function store(Request $request)
    {
       // $this->validateInput($request);
        $crypt_pass = bcrypt($request['password']);
        
        Profile::create([
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => $crypt_pass      
            
        ]);

        Session::flash('message', 'New User successfully added!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->intended('/profile');
    }

    public function generate_password( $length = 8 )
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    public function role($id)
    {               
        /*$get_user = DB::Table('users')->where('id', $id)->first();
        
        return view('profile/role', ['id' => $get_user->id ,'username' => $get_user->username, 'firstname' => $get_user->firstname,
        'lastname' => $get_user->lastname, 'email' => $get_user->email])
        ->with('myreferrer', Session::get('myreferrer', URL::previous()));*/

        return view('profile/activities');
    }
    
    
}
