<?php

namespace App\Helpers;
use Request;
use App\User as User;
use App\UsersRole as UsersRole;
use App\UserGroup as UserGroup;
use Illuminate\Support\Facades\Auth;


class AppHelper
{
    public static function currentUser(){
        $currerntUserRole = Auth::User()->id;
        return $currerntUserRole;
    }
    
    public static function getRole($id){
        $users = UserRole::where('user_id','=',$id)->get();
        return $users->user_role;
    }
    
    public static function userPermission(){   
        $currerntID = Auth::User()->id;
        $users = UsersRole::where('user_id','=',$currerntID)->first()->toArray();        
       
        if($users['user_role']=='0'):
            $role = array('roleID'=>$users['user_role'],'type'=>'Super Admin');
        elseif($users['user_role']=='1'):
            $role = array('roleID'=>$users['user_role'],'type'=>'Admin');
        elseif($users['user_role']=='2'):
            $role = array('roleID'=>$users['user_role'],'type'=>'AMF Admin');
        elseif($users['user_role']=='3'):
            $role = array('roleID'=>$users['user_role'],'type'=>'Manager');
        elseif($users['user_role']=='4'):
            $role = array('roleID'=>$users['user_role'],'type'=>'Operator');
        elseif($users['user_role']=='5'):
            $role = array('roleID'=>$users['user_role'],'type'=>'Services');
        endif;   
        
        return $role;
    }
}

