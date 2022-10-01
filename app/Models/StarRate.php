<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarRate extends Model
{
   protected $table = 'star_rates';
    use HasFactory;
       protected $fillable = [
         'userid',
         'postid',
         'mac_address',
         'rate',
         'who',
    ];
}
