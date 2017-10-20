<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoneyLogs extends Model
{
    //
    protected $table = 'moneylogs';
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
