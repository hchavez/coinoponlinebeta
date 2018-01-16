<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $profile = DB::Table('users')->get();        
        
        return view('profile/index', ['users' => $profile]);
    }

    public function edit($id)
    {        
        $get_user = DB::Table('users')->where('id', $id)->first();
        
        return view('profile/edit', ['id' => $get_user->id ,'username' => $get_user->username, 'firstname' => $get_user->firstname,
        'lastname' => $get_user->lastname, 'email' => $get_user->email])
        ->with('myreferrer', Session::get('myreferrer', URL::previous()));
    }

    public function update(Request $request, $id)
    {
        //echo 'Test ok';
        //$name = $request->input('name');
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
        $generated_password = $this->generate_password();
        return view('profile/create', ['pass' => $generated_password] );
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
            'password' => $crypt_pass,
            'role' => $request['user_role'],
            'status' => 'active'
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

        return view('profile/role');
    }
}
