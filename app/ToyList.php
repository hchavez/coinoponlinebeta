<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToyList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'toys';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
