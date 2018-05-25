<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorlogsHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'errorlogs_history';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
