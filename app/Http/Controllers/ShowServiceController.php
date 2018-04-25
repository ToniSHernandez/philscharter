<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ShowServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();
        return view('services.single-service', compact('service'));
    }
}
