<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puertos extends Model
{
    protected $fillable = [

        'id_html',

        'nombre_equipo',
        'serie',

        'fila',
        'rack',
        'posicion_rack',

        'puerto_origen',
        'puerto_destino',

        'fila_destino',
        'rack_destino',
        'unidad_destino',

        'equipo_destino',
        'serie_destino'

    ];
}
