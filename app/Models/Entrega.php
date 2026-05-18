<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = 'entregas';

    protected $fillable = [
        'id_prestamo',
        'codigo_cinta',
        'usuario_solicitud',
        'fecha_prestamo',
        'usuario_entrega',
        'fecha_entrega',
        'estatus'
    ];
    public function prestamo()
    {
    return $this->belongsTo(Prestamo::class, 'id_prestamo');
    }
}
