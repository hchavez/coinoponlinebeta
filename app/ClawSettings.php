<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClawSettings extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'claw_settings';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
