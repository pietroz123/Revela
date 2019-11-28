<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Landing page
     */
    public function landing()
    {
        if (auth()->check())
            return redirect()->route('dashboard');
        return view('pages.landing');
    }
}
