<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', ['user' => auth()->user()]);
    }
}
