<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
     //Dat ten cho table trong csdlcsdl
     protected $table = 'products';

     
     public $timestamps = false;
 
     
     protected $fillable = [
         'category_id',
         'productName',
         'remainQuantity',
         'price',
         'thumnail',
         'isValidated',
         'soldQuantity',
         'description',
     ];
}