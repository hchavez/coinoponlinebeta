<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GroupAppicationObject;
use App\GroupSecurity;
use App\GroupPermission;
use Response;
use Session;
use App\User;
use Input;


class GroupPermissionController extends Controller
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
        $app_object = DB::table('group_app_object')
                    ->select('group_app_object.*', 'group_app_object.id as obj_id' , 'group_security.security_type as sec_type','group_permission.*')
                    ->leftJoin('group_security', 'group_app_object.security_type', '=', 'group_security.id')
                    ->leftJoin('group_permission','group_app_object.id','=','group_permission.application_object');
        
        $user_group = DB::table('users_group')->get();
        
        $data = Input::all();          
        if ( !empty($data) ) :
            $model = Input::get();           
            $app_object = $app_object->where(function($query) use ($model){                    
                    $query->where('group_permission.user_groups', '=', $model['user_group']);               
                })->orderBy('date_updated','desc');
                
        else:
            $model = array('user_group'=>'0');           
            $app_object = $app_object->where(function($query) use ($model){                    
                    $query->where('group_permission.user_groups', '=', '0');               
                })->orderBy('date_updated','desc'); 
        endif;
        
        $app_object = $app_object->get();
        //print_r($app_object);
        return view('group-permission/index',['app_object' => $app_object, 'user_group' => $user_group, 'getData' => $model]);
        
    }

    
}
