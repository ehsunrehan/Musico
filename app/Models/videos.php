<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
     protected $fillable = [
        'title',
        'artist',
        'year',
        'video',
        'category',
        'image', 
    ];
}
