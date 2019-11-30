<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \FileUploader;
use App\Plan;

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

    public function dadosCadastrais()
    {
        // Get all available plans
        $plans = Plan::all();

        // Avatar path
        $path = 'storage/user_images/';
        $avatar_url = auth()->user()->profile_picture;

        // Get user avatar
        $avatar = auth()->user()->profile_picture ? array(
            "name" => $avatar_url,
            "type" => FileUploader::mime_content_type($path . $avatar_url),
            "size" => filesize($path . $avatar_url),
            "file" => asset($path . $avatar_url),
            "data" => array(
                "readerForce" => true
            )
        ) : null;

        return view('dashboard.dashboard-dados-cadastrais', [
            'plans' => $plans,
            'avatar' => $avatar,
        ]);
    }
}
