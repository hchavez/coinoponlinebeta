<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    /**
     * Transform the resource into an array.
     * 
     * @param \Illuminate\Http\Request
     * @return array
     */
    
    public function toArray($request){
        
        /*return[
           'name' => $this->firstname. ' ' . $this->lastname,
           'email' =>$this->email
        ]; */
       
        return parent::toArray($request);
    }
    
    public function with($request){
        return[
            'version' => '2.0.0',            
        ];
    }
    
}