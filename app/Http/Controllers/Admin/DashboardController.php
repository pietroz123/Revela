<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Admin Dashboard INDEX
     */
    public function index()
    {
        return view('dashboard-admin.dashboard-admin-index');
    }

    public function pedidos()
    {
        return view('dashboard-admin.dashboard-admin-pedidos');
    }
}
