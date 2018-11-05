<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMachinePermission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_machine_permission';
    public $timestamps = false;

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
