<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoalsLogs extends Model
{
    //
    protected $table = 'goalslogs';
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
