<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Errorlogs extends Model
{
    //
    protected $table = 'errorlogs';
    
    public function machine()
    {
        //return $this->belongsTo(Machine::class)->orderBy('machine_id','desc');
    }
}
