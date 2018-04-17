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
}
