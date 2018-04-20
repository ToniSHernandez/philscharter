<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'rate',
        'short_description',
        'long_description',
        'popular'
    ];

    public function getPopular()
    {
        $service = Service::where('popular', 1)->orderBy('order', 'asc')->limit(4);

        return $service;
    }
}
