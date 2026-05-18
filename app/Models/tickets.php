<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    protected $table = 'tickets';

    public $timestamps = false;

    protected $fillable = [
        'ticket_referencia',
        'creado_por',
        'fecha_creacion',
        'nombre_usuario',
        'detalles',
        'piso',
        'ala',
        'referencia_ubicacion',
        'seguido_por',
        'fecha_cierre',
        'estatus',
        'observaciones_finales'
    ];

}
