<?php

namespace pruebatecnicaoet\Http\Controllers;

use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use pruebatecnicaoet\http\Requests\VehiculoFormRequest;
use pruebatecnicaoet\Vehiculo;

class VehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * consulta los vehiculos  para enviar los datos
     * a la vista en donde se imprimen.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $vehiculo = \DB::table("vehiculos as ve")
                ->leftjoin('marcas AS ma', 'ma.id', "=", 've.id_marca')
                ->leftjoin('tipo_vehiculos AS tve', 'tve.id', "=", 've.id_tipovehiculo')
                ->leftjoin('personas AS pco', 'pco.id', "=", 've.id_conductor')
                ->leftjoin('personas AS ppr', 'ppr.id', "=", 've.id_propietario')
                ->select('ve.*', 'ma.nombre as nombremarca', 'tve.nombre as nombretipovehiculo', 'pco.primer_nombre as nombreconductor', 'ppr.primer_nombre as nombrepropietario')
                ->where('ve.placa', 'LIKE', '%' . $query . '%')
                ->orderBy('ve.id', 'desc')
                ->paginate(7);
            return view('vehiculo.index', ['vehiculo' => $vehiculo, 'searchText' => $query]);
        }

    }

    /**
     * Consulta los datos necesarios para
     * el registro del Vehiculo, luego los envia a la vista
     */
    public function create()
    {
        $ListaTipoVehiculo = \DB::table("tipo_vehiculos")->get();
        $ListaPersonaConductor = \DB::table("personas")->where('estado', '=', '1')->where('id_tipo_persona', '=', '1')->get();
        $ListaPersonaPropietario = \DB::table("personas")->where('estado', '=', '1')->where('id_tipo_persona', '=', '2')->get();
        $ListaMarca = \DB::table("marcas")->get();
        return view('vehiculo.create', ['ListaTipoVehiculo' => $ListaTipoVehiculo, 'ListaPersonaConductor' => $ListaPersonaConductor, 'ListaPersonaPropietario' => $ListaPersonaPropietario, 'ListaMarca' => $ListaMarca]);
    }
    /**
     * Registra Vehiculo
     */
    public function store(VehiculoFormRequest $request)
    {
        try {
            $now = new \DateTime();
            $Vehiculo = new Vehiculo();
            $Vehiculo->placa = $request->get('placa');
            $Vehiculo->color = $request->get('color');
            $Vehiculo->id_marca = $request->get('marca');
            $Vehiculo->id_tipovehiculo = $request->get('tipovehiculo');
            $Vehiculo->id_conductor = $request->get('conductor');
            $Vehiculo->id_propietario = $request->get('propietario');
            $Vehiculo->fecha_registro = $now;
            $Vehiculo->id_usuario_registra = auth()->user()->id;
            $Vehiculo->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/vehiculo');
    }

    /**
     * Consulta los datos del Vehiculo
     * para luego imprimirlos en el formulario de Edicion para su actualizacion
     */
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $vehiculo = Vehiculo::findOrfail($id);
        $ListaTipoVehiculo = \DB::table("tipo_vehiculos")->get();
        $ListaPersonaConductor = \DB::table("personas")->where('estado', '=', '1')->where('id_tipo_persona', '=', '1')->get();
        $ListaPersonaPropietario = \DB::table("personas")->where('estado', '=', '1')->where('id_tipo_persona', '=', '2')->get();
        $ListaMarca = \DB::table("marcas")->get();
        return view('vehiculo.edit', ['vehiculo' => $vehiculo, 'Arrayestado' => $Arrayestado, 'ListaTipoVehiculo' => $ListaTipoVehiculo, 'ListaPersonaConductor' => $ListaPersonaConductor, 'ListaPersonaPropietario' => $ListaPersonaPropietario, 'ListaMarca' => $ListaMarca]);
    }
    /**
     * Actualiza los datos del Vehiculo
     */

    public function update(VehiculoFormRequest $request, $id)
    {
        try {
            $Vehiculo = Vehiculo::findOrfail($id);
            $Vehiculo->placa = $request->get('placa');
            $Vehiculo->color = $request->get('color');
            $Vehiculo->id_marca = $request->get('marca');
            $Vehiculo->id_tipovehiculo = $request->get('tipovehiculo');
            $Vehiculo->id_conductor = $request->get('conductor');
            $Vehiculo->id_propietario = $request->get('propietario');
            $Vehiculo->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/vehiculo');
    }

    /**
     * Muestra la vista para el reporte del vehiculo
     *
     */
    public function Reporte()
    {
        return view('reporte.reportevehiculo');
    }

    /**
     * Genera el informe de los
     * Vehiculos segun las fechas de registro definidas
     */
    public function GenerarInformeVehiculo(Request $request)
    {
        try {
            // Consulta datos segun rangos de fechas indicados
            $Vehiculo = \DB::table("vehiculos as ve")
                ->leftjoin('marcas AS ma', 'ma.id', "=", 've.id_marca')
                ->leftjoin('tipo_vehiculos AS tve', 'tve.id', "=", 've.id_tipovehiculo')
                ->leftjoin('personas AS pco', 'pco.id', "=", 've.id_conductor')
                ->leftjoin('personas AS ppr', 'ppr.id', "=", 've.id_propietario')
                ->select('ve.placa', 'ma.nombre as nombremarca', DB::raw(' CONCAT(pco.primer_nombre ," ",pco.segundo_nombre , " " ,pco.apellidos) as nombreconductor'), DB::raw(' CONCAT(ppr.primer_nombre ," ",ppr.segundo_nombre , " " ,ppr.apellidos) as nombrepropietario'))
                ->where(DB::raw('DATE_FORMAT(ve.fecha_registro, "%Y-%m-%d")'), '>=', $request->get('fechainicio'))
                ->where(DB::raw('DATE_FORMAT(ve.fecha_registro, "%Y-%m-%d")'), '<=', $request->get('fechafin'))->get();
            // Function Create para la generacion del archivo
            Excel::create('Vehiculos', function ($excel) use ($Vehiculo) {
                $excel->sheet('Datos', function ($sheet) use ($Vehiculo) {
                    //Header
                    $sheet->mergeCells('A1:D1');
                    $sheet->row(1, [' Datos de Vehículos']);
                    $sheet->row(2, ['Placa', 'Marca', 'Conductor', 'Propietario']);
                    // Agregar datos
                    foreach ($Vehiculo as $result) {
                        $row = (array) $result;
                        $sheet->appendRow($row);
                    }
                });
            })->export('xlsx');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
