<?php

namespace App\Http\Controllers\Backend;

use Facades\Facebook;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        return Facebook::albums();
    }
}
