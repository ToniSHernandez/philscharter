<?php

namespace App;

use App\Lead;
use App\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'service_request_id');
    }
}
