<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'mst_customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_name','email','tel_num','address'];
}
