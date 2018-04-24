<?php

namespace App;

use App\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
