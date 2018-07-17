<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_permission';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
