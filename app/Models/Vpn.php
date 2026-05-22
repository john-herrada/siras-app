<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vpn extends Model
{
    protected $table = 'vpn';

    public $timestamps = false;
    protected $primaryKey = 'Id';


    protected $fillable = [
        'nombre_usuario',
        'puesto',
        'telefono',
        'extension',
        'correo',
        'area',
        'direccion_ip',
        'usuario',
        'clave',
        'jefe_inmediato',
        'cargo',
        'fecha_incorporacion'
            ];
}
