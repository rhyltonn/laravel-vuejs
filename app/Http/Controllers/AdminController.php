<?php

namespace Benfeitoria\Http\Controllers;

use Illuminate\Http\Request;
use Benfeitoria\Artigo;
use Benfeitoria\User;

class AdminController extends Controller
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

      $totalUsuarios = User::count();
      $totalArtigos = Artigo::count();
      $totalAutores = User::where('autor','=','S')->count();

        return view('admin', compact('totalUsuarios','totalAutores','totalArtigos'));
    }
}
