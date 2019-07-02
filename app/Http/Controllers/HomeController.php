<?php

namespace pruebatecnicaoet\Http\Controllers;

use DB;
use pruebatecnicaoet\Vehiculo;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CanVehiculos = Vehiculo::count();
        $CanPerCon = DB::table('personas')
            ->where('id_tipo_persona', '=', '1')->count();
        $CanPerpro = DB::table('personas')
            ->where('id_tipo_persona', '=', '2')->count();
        return view('home.index', ['CanVe' => $CanVehiculos, 'CanPerCon' => $CanPerCon, 'CanPerpro' => $CanPerpro]);
    }
}
