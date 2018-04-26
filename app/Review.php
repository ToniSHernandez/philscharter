<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'author',
        'body',
        'featured',
        'submitted_on',
        'source',
        'rating'
    ];

    public function scopeFeatured()
    {
        return Review::where('featured', true)->orderBy('created_at', 'desc')->get();
    }
}
