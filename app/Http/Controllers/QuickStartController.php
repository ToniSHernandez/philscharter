<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuickStartController extends Controller
{
    public function init(Request $request)
    {
        dd($request->all());
    }
}
