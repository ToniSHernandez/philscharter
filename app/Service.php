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
        'photo_url',
        'slug'
    ];

    public function trips()
    {
        return $this->hasMany(TripRequest::class);
    }

    public function scopeFeatured()
    {
        return Service::where('featured', true)->orderBy('id', 'asc')->limit(4)->get();
    }
}
