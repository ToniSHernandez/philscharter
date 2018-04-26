<?php

namespace App\Http\Controllers\Backend;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturedReviewController extends Controller
{
    public function index()
    {
        return Review::featured();
    }
}
