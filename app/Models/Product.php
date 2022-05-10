<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='mst_product';
    protected $primaryKey = 'product_id';
    protected $keyType = 'string';
    public $incrementing = 'false';
}
