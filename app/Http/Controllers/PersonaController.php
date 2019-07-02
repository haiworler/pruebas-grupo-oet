<?php

namespace pruebatecnicaoet\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use pruebatecnicaoet\http\Requests\PersonaFormRequest;
use pruebatecnicaoet\Persona;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * consulta las personas de tipo conductor para enviar los datos
     * a la vista en donde se imprimen.
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $persona = \DB::table("personas as person")
                ->leftjoin('tipo_documentos AS tdperson', 'tdperson.id', "=", 'person.id_tipo_documento')
                ->leftjoin('tipo_personas AS tperson', 'tperson.id', "=", 'person.id_tipo_persona')
                ->leftjoin('ciudads AS pciudad', 'pciudad.id', "=", 'person.id_ciudad')
                ->select('person.*', 'tdperson.nombre as nombretipodocumento', 'tperson.nombre as nombretipopersona', 'pciudad.nombre as nombreciudad')
                ->where('person.id_tipo_persona', '=', '1')
                ->where('person.primer_nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('person.id', 'desc')
                ->paginate(7);
            return view('persona.index', ['persona' => $persona, 'searchText' => $query]);
        }

    }

    /**
     * Consulta los datos necesarios para
     * el registro de la persona, luego los envia a la vista
     */
    public function create()
    {
        $ListaDocumentos = \DB::table("tipo_documentos")->get();
        $ListaCiudades = \DB::table("ciudads")->where('estado', '=', '1')->get();
        $ListaTiposPersona = \DB::table("tipo_personas")->get();
        return view('persona.create', ['ListaDocumentos' => $ListaDocumentos, 'ListaCiudades' => $ListaCiudades, 'ListaTiposPersona' => $ListaTiposPersona]);
    }
    /**
     * Registra Persona
     */
    public function store(PersonaFormRequest $request)
    {
        try {
            $now = new \DateTime();
            $Persona = new Persona();
            $Persona->id_tipo_documento = $request->get('tipodocumento');
            $Persona->numero_documento = $request->get('numerodocumento');
            $Persona->id_tipo_persona = $request->get('tipopersona');
            $Persona->primer_nombre = $request->get('primernombre');
            $Persona->segundo_nombre = $request->get('segundonombre');
            $Persona->apellidos = $request->get('apellidos');
            $Persona->direccion = $request->get('direccion');
            $Persona->telefono = $request->get('telefono');
            $Persona->id_ciudad = $request->get('ciudad');
            $Persona->fecha_registro = $now;
            $Persona->id_usuario_registra = auth()->user()->id;
            $Persona->estado = 1;
            $Persona->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/persona');
    }

    /**
     * Consulta los datos de la persona
     * para luego imprimirlos en el formulario de Edicion para su actualizacion
     */
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $persona = Persona::findOrfail($id);
        $ListaDocumentos = \DB::table("tipo_documentos")->get();
        $ListaCiudades = \DB::table("ciudads")->where('estado', '=', '1')->get();
        $ListaTiposPersona = \DB::table("tipo_personas")->get();
        return view('persona.edit', ['persona' => $persona, 'Arrayestado' => $Arrayestado, 'ListaDocumentos' => $ListaDocumentos, 'ListaCiudades' => $ListaCiudades, 'ListaTiposPersona' => $ListaTiposPersona]);
    }
    /**
     * Actualiza los datos de la persona
     */

    public function update(PersonaFormRequest $request, $id)
    {
        try {
            $Persona = Persona::findOrfail($id);
            $Persona->id_tipo_documento = $request->get('tipodocumento');
            $Persona->numero_documento = $request->get('numerodocumento');
            $Persona->id_tipo_persona = $request->get('tipopersona');
            $Persona->primer_nombre = $request->get('primernombre');
            $Persona->segundo_nombre = $request->get('segundonombre');
            $Persona->apellidos = $request->get('apellidos');
            $Persona->direccion = $request->get('direccion');
            $Persona->telefono = $request->get('telefono');
            $Persona->id_ciudad = $request->get('ciudad');
            $Persona->estado = $request->get('estado');
            $Persona->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/persona');
    }
    /**
     * Cambia el estado de una Persona a Inactivo
     */
    public function destroy($id)
    {
        $Persona = Persona::findOrfail($id);
        $Persona->estado = 2;
        $Persona->update();
        return Redirect::to('/persona');
    }
      /**
       * Muestra la lista de Personas tipo propietarias 
       * De vehiculos
       */
      public function ListaPropietario(Request $request)
      {
        if ($request) {
            $query = trim($request->get('searchText'));
            $persona = \DB::table("personas as person")
                ->leftjoin('tipo_documentos AS tdperson', 'tdperson.id', "=", 'person.id_tipo_documento')
                ->leftjoin('tipo_personas AS tperson', 'tperson.id', "=", 'person.id_tipo_persona')
                ->leftjoin('ciudads AS pciudad', 'pciudad.id', "=", 'person.id_ciudad')
                ->select('person.*', 'tdperson.nombre as nombretipodocumento', 'tperson.nombre as nombretipopersona', 'pciudad.nombre as nombreciudad')
                ->where('person.id_tipo_persona', '=', '2')
                ->where('person.primer_nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('person.id', 'desc')
                ->paginate(7);
            return view('persona.indexpropietario', ['persona' => $persona, 'searchText' => $query]);
        }
      }
}
