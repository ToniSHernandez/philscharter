<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function leads()
    {
        return view('dashboard.leads');
    }

    public function reviews()
    {
        return view('dashboard.reviews');
    }

    public function services()
    {
        return view('dashboard.services');
    }

    public function contact()
    {
        return view('dashboard.contact');
    }

    public function pages()
    {
        return view('dashboard.pages');
    }
}
