<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineReports extends Model {

    protected $table = 'machine_reports';
    
    public function machine() {
        return $this->belongsTo(Machine::class);
    }

}
