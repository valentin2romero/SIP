<?php

namespace App\Http\Controllers;
use \App\Tables\SentenciasTable;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $table = (new SentenciasTable())->setup();
        return view('home', ['table' => $table]);
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function herramienta()
    {
        return view('herramienta');
    }
}