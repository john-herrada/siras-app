<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CintasClean extends Model
{
    protected $table = 'cintas_clean';

    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'caja_resguardo',
        'anaquel',
        'nivel'
    ];
}
