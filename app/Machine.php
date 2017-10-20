<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model {

    //
    protected $table = 'machines';
    protected $guarded = [];

    public function errorlogs() {
        return $this->hasMany(Errorlogs::class);
    }

    public function moneylogs() {
        return $this->hasMany(moneylogs::class);
    }

    public function winlogs() {
        return $this->hasMany(Winlogs::class);
    }

    public function goalslogs() {
        return $this->hasMany(Goalslogs::class);
    }

}
