<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'check_list';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
