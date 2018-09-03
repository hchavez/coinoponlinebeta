<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'machine_types';
    public $timestamps = false;


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
