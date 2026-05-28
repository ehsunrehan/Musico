<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class musics extends Model
{
    protected $fillable = [   
        'name',
        'artist_name',
        'year',
        'music',
        'album',
        'language',
        'image', 
    ];

    public function bookmarkedBy()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'music_id', 'user_id')->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?? 0;
    }
}