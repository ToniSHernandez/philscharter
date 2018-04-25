<?php

namespace App\Http\Controllers\Backend;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PopularServiceController extends Controller
{
    public function index()
    {
        return Service::featured();
    }
}
