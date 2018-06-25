<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GraphLogs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'graph_logs';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
