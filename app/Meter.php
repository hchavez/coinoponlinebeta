<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meters';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
