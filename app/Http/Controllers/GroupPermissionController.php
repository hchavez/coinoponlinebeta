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
    public function index(Request $request)
    {
        $app_object = DB::table('group_app_object')
                    ->select('group_app_object.*', 'group_app_object.id as obj_id' , 'group_security.security_type as sec_type','group_permission.*','group_permission.id as gp_id')
                    ->leftJoin('group_security', 'group_app_object.security_type', '=', 'group_security.id')
                    ->leftJoin('group_permission','group_app_object.id','=','group_permission.application_object');
        
        $user_group = DB::table('users_group')->get();
        
        $data = Input::all();          
        if ( !empty($data) ) :
            $model = Input::get();          
            $this->edit($model,$request);
            $myCheckboxes = $request->input('read_all_access');
            //print_r($myCheckboxes);
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
              
        return view('group-permission/index',['app_object' => $app_object, 'user_group' => $user_group, 'getData' => $model]);
        
    }
    
    public function edit($data,$request){      
             
        $read_all_access = $request->input('read_all_access');
        $add_new_access = $request->input('add_new_access');
        $edit_all_access = $request->input('edit_all_access');
        $read_access = $request->input('read_access');
        $edit_access = $request->input('edit_access');
        $delete_access = $request->input('delete_access');
        $update = DB::table('group_permission');
        
        if ( !empty($read_all_access) ) : 
            foreach($read_all_access as $key => $value):
                $explode = explode('-',$value);                  
                $update_z = DB::table('group_permission')->where('id','!=', $explode[1])->where('user_groups', $explode[2])->update(['read_all_access' => '0']);               
            endforeach;  
            foreach($read_all_access as $key => $value):
                $explode = explode('-',$value);     
                $update = $update->where(function($query) use ($explode){ 
                   $query->where('application_object', $explode[0])->where('id', $explode[1])->update(['read_all_access' => '1']);           
                })->orderBy('id','asc');                         
            endforeach; 
        endif;
        
        if ( !empty($add_new_access) ) : 
            foreach($add_new_access as $key => $value):
                $explode = explode('-',$value);                  
                $update_z = DB::table('group_permission')->where('id','!=', $explode[1])->where('user_groups', $explode[2])->update(['add_new_access' => '0']);               
            endforeach;  
            foreach($add_new_access as $key => $value):
                $explode = explode('-',$value);     
                $update = $update->where(function($query) use ($explode){ 
                   $query->where('application_object', $explode[0])->where('id', $explode[1])->update(['add_new_access' => '1']);           
                })->orderBy('id','asc');                         
            endforeach; 
        endif;
        
        if ( !empty($edit_all_access) ) : 
            foreach($edit_all_access as $key => $value):
                $explode = explode('-',$value);                  
                $update_z = DB::table('group_permission')->where('id','!=', $explode[1])->where('user_groups', $explode[2])->update(['edit_all_access' => '0']);               
            endforeach;  
            foreach($edit_all_access as $key => $value):
                $explode = explode('-',$value);     
                $update = $update->where(function($query) use ($explode){ 
                   $query->where('application_object', $explode[0])->where('id', $explode[1])->update(['edit_all_access' => '1']);           
                })->orderBy('id','asc');                         
            endforeach; 
        endif;
        
        if ( !empty($read_access) ) : 
            foreach($read_access as $key => $value):
                $explode = explode('-',$value);                  
                $update_z = DB::table('group_permission')->where('id','!=', $explode[1])->where('user_groups', $explode[2])->update(['read_access' => '0']);               
            endforeach;  
            foreach($read_access as $key => $value):
                $explode = explode('-',$value);     
                $update = $update->where(function($query) use ($explode){ 
                   $query->where('application_object', $explode[0])->where('id', $explode[1])->update(['read_access' => '1']);           
                })->orderBy('id','asc');                         
            endforeach; 
        endif;
        
        if ( !empty($edit_access) ) : 
            foreach($edit_access as $key => $value):
                $explode = explode('-',$value);                  
                $update_z = DB::table('group_permission')->where('id','!=', $explode[1])->where('user_groups', $explode[2])->update(['edit_access' => '0']);               
            endforeach;  
            foreach($edit_access as $key => $value):
                $explode = explode('-',$value);     
                $update = $update->where(function($query) use ($explode){ 
                   $query->where('application_object', $explode[0])->where('id', $explode[1])->update(['edit_access' => '1']);           
                })->orderBy('id','asc');                         
            endforeach; 
        endif;
        
        if ( !empty($delete_access) ) : 
            foreach($delete_access as $key => $value):
                $explode = explode('-',$value);                  
                $update_z = DB::table('group_permission')->where('id','!=', $explode[1])->where('user_groups', $explode[2])->update(['delete_access' => '0']);               
            endforeach;  
            foreach($delete_access as $key => $value):
                $explode = explode('-',$value);     
                $update = $update->where(function($query) use ($explode){ 
                   $query->where('application_object', $explode[0])->where('id', $explode[1])->update(['delete_access' => '1']);           
                })->orderBy('id','asc');                         
            endforeach; 
        endif;
        
        $update = $update->get();
                   
        return $update;
    }

    public function add(){
        //$data = Input::all(); 
        //print_r($data);
        echo 'kimmmm';
        /*$insert = DB::table('group_app_object')->insert(
            ['app_object_type' => $data['groupName']]
        );*/
        
        return view('group-permission/index');
    }
    
    public function edit_group(){
        
    }
    
    
}
