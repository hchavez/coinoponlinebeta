<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAppicationObject extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_app_object';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
