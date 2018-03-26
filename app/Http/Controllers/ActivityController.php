<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Activity;
use Session;
use URL;
use Input;
use DateTime;

class ActivityController extends Controller
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
        $role = Auth::user()->role;
        $profile = DB::Table('users')->get();        
        
        $fname = Auth::user()->firstname;
        $lname = Auth::user()->lastname;
        $username = Auth::user()->username;
        $email = Auth::user()->email;
        $id = Auth::user()->id; 
        
        return view('activity/index', ['users' => $profile, 'user_id' => $id, 'user_role' => $role, 'fname' => $fname, 'lname' => $lname, 'username' => $username, 'email' => $email ]);
   
    }

    public function show($id)
    {
        $role = Auth::user()->role;
        $get_user = DB::Table('users')->where('id', $id)->first();
        print_r($get_user);
       // return view('activity/show');
        return view('activity/show', ['users' => $get_user]);
   
    }
   
}
