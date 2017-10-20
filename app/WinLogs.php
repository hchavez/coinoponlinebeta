<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinLogs extends Model
{
    //
    protected $table = 'winlogs';
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
