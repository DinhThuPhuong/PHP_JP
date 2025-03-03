<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageDetails extends Model
{
    protected $table = "images_detail";
    public $timestamps = false;

    
    protected $fillable = [
        'imageUrl',
        'product_id',
    ];
}