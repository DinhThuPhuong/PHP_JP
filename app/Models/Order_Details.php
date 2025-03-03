<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    protected $table = "order_details";
    //Tat tu dong tang gia tri chyo khoa chinhchinh
    public $incrementing = false;

    
    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'product_id',
        'order_id',
    ];
}