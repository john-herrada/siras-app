<?php

namespace App\Http\Controllers;

use App\Models\Cintas;
use App\Models\CintasClean;
use App\Models\Entrega;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\UserFile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $files = UserFile::where(
        'user_id',
        auth()->id()
        )->latest()->get();

     $stats = $this->getStats();

        return view('dashboard.dashboard', compact('files', 'stats'));
    }


    private function getStats()
    {
        return [
            'usuarios' => User::count(),
            'cintas' => Cintas::count(),
            'prestamos' => Prestamo::count(),
            'entregas' => Entrega::count(),
            'cintas_clean' => CintasClean::count()
        ];
    }




}
