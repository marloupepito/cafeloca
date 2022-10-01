<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverPhoto extends Model
{
    protected $table = 'cover_photos';
    use HasFactory;
       protected $fillable = [
        'userid',
        'cover',
    ];
}
