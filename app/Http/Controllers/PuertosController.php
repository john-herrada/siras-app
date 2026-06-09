<?php

namespace App\Http\Controllers;

use App\Models\Puertos;
use Illuminate\Http\Request;

class PuertosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $puertos = Puertos::when($buscar, function ($query) use ($buscar) {

            $query->where('nombre_equipo', 'like', "%{$buscar}%")
                ->orWhere('serie', 'like', "%{$buscar}%")
                ->orWhere('fila', 'like', "%{$buscar}%")
                ->orWhere('posicion_rack', 'like', "%{$buscar}%")
                ->orWhere('id_html', 'like', "%{$buscar}%");
                
        })->paginate(20);

        return view('Puertos.index', compact('puertos', 'buscar'));
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
        Puertos::create($request->all());

        return redirect()->route('puertos.index')
            ->with('success', 'puerto agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puertos $puertos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puertos $puerto)
    {
        return view('Puertos.edit', compact('puerto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puertos $puerto)
    {
        $puerto->update($request->only([
            'nombre_equipo',
            'id_html',
            'serie',
            'fila',
            'rack',
            'posicion_rack',
            'puerto_origen',
            'puerto_destino',
            'fila_destino',
            'rack_destino',
            'unidad_destino',
            'equipo_destino',
            'serie_destino'
        ]));
        return redirect()->route('puertos.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puertos $puerto)
    {
        $puerto->delete();

        return redirect()->route('puertos.index')
            ->with('success', 'Registro eliminado correctamente');
    }

    public function buscar(Request $request)
    {
        $datos = Puertos::where(
            'id_html',
            $request->id_html
        )
            ->where(
                'fila',
                $request->fila
            )
            ->where(
                'rack',
                $request->rack
            )
            ->orderBy('puerto_origen')
            ->get();

        return response()->json($datos);
    }
}
