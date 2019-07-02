<?php

namespace pruebatecnicaoet;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_tipo_documento',
        'numero_documento',
        'id_tipo_persona',
        'primer_nombre',
        'segundo_nombre',
        'apellidos',
        'direccion',
        'telefono',
        'id_ciudad',
        'fecha_registro',
        'id_usuario_registra',
        'estado',

    ];

    protected $guarded = [

    ];
}
