<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "order";
    public $timestamps = false;

    protected $fillable = [
        'totalPrice',
        'user_id',
        'isValidated',
        'paymentMethod'
    ];
}
