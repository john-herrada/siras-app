<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Entregas;
use App\Models\Prestamo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class EntregasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::all();
        $entregas = Entrega::all();

        return view('entregas.entregas', compact('prestamos', 'entregas'));
    }

    /**
     * Show the form for creating a new resource.∏
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrega $entregas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrega $entregas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entregas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrega $entregas)
    {
        //
    }
    public function entregar(Request $request)
    {
        $entrega = Entrega::where('id_prestamo', $request->id_prestamo)->firstOrFail();

        DB::table('entregas')
            ->where('id', $entrega->id)
            ->update([
                'usuario_entrega' => Auth::user()->nombre_apellido,
                'fecha_entrega' => now(),
                'estatus' => 'entregado'
        ]);

        $prestamo = Prestamo::findOrFail($request->id_prestamo);
        $prestamo->delete();

        return back()->with('success', 'OK');
    }




}