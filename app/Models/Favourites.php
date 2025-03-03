<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    protected $table = "favourites";

    //Tat tinh nang tu dong tang khoa chinhchinh
    public $incrementing = false;

    
    public $timestamps = true;

    
    protected $fillable = [
        'product_id',
        'user_id',
    ];
}