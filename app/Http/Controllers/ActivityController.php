<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myTestAddToLog()
    {               
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $id = Auth::user()->id; 
        $logs = \LogActivity::logActivityLists();  
        //$get_user = DB::Table('users')->where('id', $id)->first();        
        $get_user = DB::table('users')
                    ->select('users.*', 'users.id as users_id','users.username as username'
                            , 'log_activities.subject as subject', 'log_activities.url as url'
                            , 'log_activities.ip as ip', 'log_activities.agent as agent', 'log_activities.updated_at as updated_at')
                    ->leftJoin('log_activities', 'log_activities.user_id', '=', 'users.id')                                        
                    ->where('log_activities.user_id', $id);  
        $act = $get_user->latest('log_activities.updated_at')->paginate(10);     
        
        return view('activity/show', ['logs' => $logs, 'activity' => $act, 'user_id' => $id]);
    }
        
    
    
}