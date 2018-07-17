<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_listings';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
