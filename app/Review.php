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

    public function getLatest()
    {
        $review = Review::where('featured', 1)->orderBy('created_at', 'desc')->first();

        return $review;
    }
}
