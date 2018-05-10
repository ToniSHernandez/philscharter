<?php

namespace App;

use App\ServiceRequest;
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

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function scopeFeatured()
    {
        return Service::where('featured', true)->orderBy('id', 'asc')->limit(4)->get();
    }
}
