<?php

namespace App\Http\Controllers;

use App\Review;
use App\Service;

class FrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::popular();
        $review   = Review::latest();
        return view('StaticPages.front', compact('review', 'services'));
    }
}
