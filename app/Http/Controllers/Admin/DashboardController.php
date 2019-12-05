<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

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
        $orders = Order::all();

        $solicitado = $orders->where('status', 'solicitado');
        $aprovado = $orders->where('status', 'aprovado');
        $em_producao = $orders->where('status', 'em-producao');
        $em_transito = $orders->where('status', 'em-transito');
        $entregue = $orders->where('status', 'entregue');
        $cancelado = $orders->where('status', 'cancelado');


        return view('dashboard-admin.dashboard-admin-pedidos', [
            'solicitado' => $solicitado,
            'aprovado' => $aprovado,
            'em_producao' => $em_producao,
            'em_transito' => $em_transito,
            'entregue' => $entregue,
            'cancelado' => $cancelado,
        ]);
    }
}
