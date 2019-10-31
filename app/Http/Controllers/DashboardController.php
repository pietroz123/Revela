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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard-index');
    }

    public function albumDoMes()
    {
        return view('dashboard.dashboard-album-do-mes');
    }

    public function meusPedidos()
    {
        return view('dashboard.dashboard-meus-pedidos');
    }
}
