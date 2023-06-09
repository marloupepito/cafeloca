<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';
    use HasFactory;
       protected $fillable = [
            'userid',
            'documents',
            'status',
    ];
}
