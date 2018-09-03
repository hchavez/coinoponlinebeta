<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'route';
    public $timestamps = false;


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
