<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = [
        'user_id', 
        'music_id', 
        'review'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function music()
    {
        return $this->belongsTo(musics::class);
    }
}
