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

    public function getPopular()
    {
        $service = Service::where('popular', 1)->orderBy('order', 'asc')->limit(4);

        return $service;
    }
}
