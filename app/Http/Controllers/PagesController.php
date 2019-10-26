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
        return view('pages.landing');
    }
}
