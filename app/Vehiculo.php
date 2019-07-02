<?php

namespace pruebatecnicaoet;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'placa',
        'color',
        'id_marca',
        'id_tipovehiculo',
        'id_conductor',
        'id_propietario',
        'fecha_registro',
        'id_usuario_registra',
    ];

    protected $guarded = [

    ];
}
