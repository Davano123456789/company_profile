<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('home', [
            'projects' => Project::with('category')->latest()->take(6)->get(),
            'clients' => Client::latest()->get(),
            'categories' => ProjectCategory::all()
        ]);
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
        return view('portfolio', [
            // ambil semua projek sama kategorynya juga
            'projects' => Project::with('category')->latest()->get(),
            // ambil semua kategory
            'categories' => ProjectCategory::all()
        ]);
    }

    public function clients()
    {
        return view('clients', [
            'clients' => Client::latest()->get()
        ]);
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
