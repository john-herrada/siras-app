<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entrega;

class Prestamo extends Model
{
    protected $table = 'prestamo';

    protected $fillable = [
        'codigo_cinta',
        'usuario_solicitud',
        'fecha_prestamo',
    ];

    public function entrega()
    {
        return $this->hasOne(Entrega::class, 'id_prestamo');
    }
}


