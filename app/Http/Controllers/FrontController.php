<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function clients()
    {
        return view('clients');
    }

    public function certifications()
    {
        return view('certifications');
    }

    public function contact()
    {
        return view('contact');
    }
}
