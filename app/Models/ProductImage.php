<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
     protected $table = 'product_image';
    use HasFactory;
       protected $fillable = [
        'foreign',
        'branchid',
        'images',
    ];
 }
