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
        $currerntUserRole = Auth::User()->id;
        return $currerntUserRole;
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
        
}

