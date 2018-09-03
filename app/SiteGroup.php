<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site_groups';
    public $timestamps = false;


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
