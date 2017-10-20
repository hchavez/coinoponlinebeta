<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineModelCheckList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'machine_model_check_list';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
