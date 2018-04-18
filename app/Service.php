<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'rate',
        'rate_info',
        'description',
        'featured',
        'photo_url'
    ];
}
