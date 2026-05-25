<?php

namespace App\Http\Controllers;

use App\Models\Vpn;
use Illuminate\Http\Request;

class VpnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $buscar = $request->buscar;
    $stats = $this->getStats();

    $vpns = Vpn::when($buscar, function ($query) use ($buscar) {
        $query->where('nombre_usuario', 'like', "%{$buscar}%")
              ->orWhere('direccion_ip', 'like', "%{$buscar}%")
              ->orWhere('usuario', 'like', "%{$buscar}%")
              ->orWhere('telefono', 'like', "%{$buscar}%");
    })->paginate(20);

    return view('Vpn.vpn', compact('vpns', 'buscar', 'stats'));
    }
    private function getStats()
    {
        return [
            'Registros' => Vpn::count(),
        ];
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vpn::create($request->all());

        return redirect()->route('vpn.index')
            ->with('success', 'Usuario agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vpn $vpn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vpn $vpn)
    {
        return view('vpn.edit', compact('vpn'));
    }

  
    public function update(Request $request, Vpn $vpn)
    {
          $vpn->update($request->only([
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
            'cargo'
        ]));
        return redirect()->route('vpn.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vpn $vpn)
    {
        $vpn->delete();

        return redirect()->route('vpn.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
