<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashBoxes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cash_boxes';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
