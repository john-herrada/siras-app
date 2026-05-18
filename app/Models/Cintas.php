<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cintas extends Model
{
    protected $table = 'cintas';

    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'caja_resguardo',
        'anaquel',
        'nivel',
        'sede'
    ];

    public function getRouteKeyName()
    {
        return 'codigo';
    }
}