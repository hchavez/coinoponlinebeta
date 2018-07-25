<?php

namespace App\Helpers;
use Request;
use App\User as User;
use App\UsersRole as UsersRole;
use App\UserGroup as UserGroup;
use App\GroupPermission as GroupPermission;
use Illuminate\Support\Facades\Auth;


class AppHelper
{
    public static function currentUser(){        
       // $userDetails = User::select('users.*')->where('id',Auth::User()->id)->get()->toArray();        
        $userDetails = User::select('users.*', 'users.id as userID', 'users_role.*')
                ->leftJoin('users_role', 'users.id', '=', 'users_role.user_role')
                ->where('users.id',Auth::User()->id)->get()->toArray();
        return $userDetails;
    }
    
    public static function getRole($id){
        $users = UsersRole::select('users_role.*', 'users_group.*')
                ->leftJoin('users_group', 'users_role.user_role', '=', 'users_group.id')
                ->where('user_id','=',$id)
                ->get()->toArray();
        
        return $users;        
    }
    
    public static function userPermission($user_id,$objectID){   
        
        $users = UsersRole::select('users_role.*')->where('user_id',$user_id)->get()->toArray();
        $userGroup = $users[0]['user_role'];
        
        $permission = GroupPermission::select('group_permission.*')
                ->where('user_groups',$userGroup)
                ->where('application_object',$objectID)
                ->get()->toArray();
        //print_r($permission);
        
        return $permission;
    }
        
    public static function isReadAll($permissionID){        
        $permission = GroupPermission::select('group_permission.*')->where('id',$permissionID[0]['id'])->get()->toArray();
        $access = $permission[0]['read_all_access'];        
        return $access;
    }
    
    public static function isAddAll($permissionID){
        $permission = GroupPermission::select('group_permission.*')->where('id',$permissionID[0]['id'])->get()->toArray();
        $access = $permission[0]['add_new_access'];        
        return $access;
    }
    
    public static function isEditAll($permissionID){
        $permission = GroupPermission::select('group_permission.*')->where('id',$permissionID[0]['id'])->get()->toArray();
        $access = $permission[0]['edit_all_access'];        
        return $access;
    }
    
    public static function isRead($permissionID){
        $permission = GroupPermission::select('group_permission.*')->where('id',$permissionID[0]['id'])->get()->toArray();
        $access = $permission[0]['read_access'];        
        return $access;
    }
    
    public static function isEdit($permissionID){
        $permission = GroupPermission::select('group_permission.*')->where('id',$permissionID[0]['id'])->get()->toArray();
        $access = $permission[0]['edit_access'];        
        return $access;
    }
    
    public static function isDelete($permissionID){
        $permission = GroupPermission::select('group_permission.*')->where('id',$permissionID[0]['id'])->get()->toArray();
        $access = $permission[0]['delete_access'];        
        return $access;
    }
        
    public static function objectId($url){       
        $uri_parts = explode('/', $url);        
        $uri_tail = end($uri_parts);
                
        if(count($uri_parts) >= 6):   
            $uri_tail = $uri_parts[5];
        else:
            $uri_tail = end($uri_parts);
        endif;
               
        if($uri_tail == 'site'): $id = '17';
        elseif($uri_tail == 'dashboard'): $id = '2';
        elseif($uri_tail == 'machine-management'): $id = '7';        
        elseif($uri_tail == 'prizes'): $id = '18';
        elseif($uri_tail == 'themes'): $id = '19';
        elseif($uri_tail == 'machine-error-reports'): $id = '15';
        elseif($uri_tail == 'financial-reports-graph'): $id = '14';
        elseif($uri_tail == 'financial-reports-graph'): $id = '14';
        elseif($uri_tail == 'admin-panel'): $id = '13';
        elseif($uri_tail == 'machine-settings'): $id = '20';
        elseif($uri_tail == 'claw-settings'): $id = '6';
        elseif($uri_tail == 'game-settings'): $id = '8';
        elseif($uri_tail == 'machine-accounts'): $id = '9';
        else: $id ='0';
        endif;        
        
        $mlogs = (count($uri_parts) > 6)?  $uri_parts[6] : '';        
        if($mlogs == 'error' || $mlogs == 'money' || $mlogs == 'win' || $mlogs == 'goals'): 
            $id = '5';
        endif;
                
        return $id;         
    }
}

