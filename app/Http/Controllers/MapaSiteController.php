<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapaSiteController extends Controller
{
    public function show($vista)
    {
        
        $permitidas = [
            'aire_1',
            'aire_2',
            'fila_0',
            'fila_1',
            'fila_2',
            'fila_3',
            'fila_4',
            'croquis'
        ];

        if (!in_array($vista, $permitidas)) {
            abort(404);
        }

        return view("site.$vista");
    }
}