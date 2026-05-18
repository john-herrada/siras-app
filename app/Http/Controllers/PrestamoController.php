<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Entregas;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::all();

        return view('prestamos.prestamos', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_cinta' => 'required|unique:cintas,prestamo'],[

            'codigo_cinta.required' => 'Campo obligatorio',
            'codigo_cinta.unique' => 'Cinta en uso o no registrada'
            ]);

        $prestamo = Prestamo::create([
            'codigo_cinta' => $request->codigo_cinta,
            'usuario_solicitud' => $request->usuario_solicitud,
            'fecha_prestamo' => now(),
         ]);

    // 2. Insertar en entregas automáticamente
        Entrega::create([
            'id_prestamo' => $prestamo->id,
            'codigo_cinta' => $prestamo->codigo_cinta,
            'usuario_solicitud' => $prestamo->usuario_solicitud,
            'fecha_prestamo' => $prestamo->fecha_prestamo,
            'estatus' => 'pendiente'
    ]);

        return redirect()->back()->with('success', 'Préstamo registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
