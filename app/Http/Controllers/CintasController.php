<?php

namespace App\Http\Controllers;

use App\Models\Cintas;
use Illuminate\Http\Request;

class CintasController extends Controller
    {
            public function index(Request $request)
        {
            $buscar = $request->buscar;

                $cintas = Cintas::when($buscar, function ($query) use ($buscar) {
                $query->where('codigo', 'like', "%$buscar%")
                    ->orWhere('caja_resguardo', 'like', "%$buscar%")
                    ->orWhere('anaquel', 'like', "%$buscar%")
                    ->orWhere('nivel', 'like', "%$buscar%")
                    ->orWhere('sede', 'like', "%$buscar%");
        })->paginate(20);

        return view('cintas.cintas', compact('cintas', 'buscar'));
    }
    public function edit(Cintas $cinta)
    {
        return view('cintas.edit', compact('cinta'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:cintas',
            'caja_resguardo' => 'required',
            'anaquel' => 'required',
            'nivel' => 'required',
            'sede' => 'required'],[

            'codigo.required' => 'Campo obligatorio',
            'codigo.unique' => 'Cinta ya existente',
            'caja_resguardo.required' => 'Campo obligatorio',
            'anaquel.required' => 'Campo obligatorio',
            'nivel.required' => 'Campo obligatorio',
            'sede.required' => 'Campo obligatorio',
            ]);

        Cintas::create($request->all());

        return redirect()->route('cintas.index')
            ->with('success', 'Cinta agregada correctamente');
    }

    public function destroy(Cintas $cinta)
    {
        $cinta->delete();

        return redirect()->route('cintas.index')
            ->with('success', 'Cinta eliminada correctamente');
    }
    public static function middleware(): array
    {
         return [
            'permission:ver cintas' => ['only' => ['index', 'show']],
            'permission:crear cintas' => ['only' => ['create', 'store']],
            'permission:editar cintas' => ['only' => ['edit', 'update']],
            'permission:eliminar cintas' => ['only' => ['destroy']],
            ];
    }
    public function update(Request $request, Cintas $cinta)
    {
        $request->validate([
            'codigo' => 'required|unique:cintas',
            'caja_resguardo' => 'required',
            'anaquel' => 'required',
            'nivel' => 'required',
            'sede' => 'required'],[

            'codigo.required' => 'Campo obligatorio',
            'codigo.unique' => 'Cinta ya existente',
            'caja_resguardo.required' => 'Campo obligatorio',
            'anaquel.required' => 'Campo obligatorio',
            'nivel.required' => 'Campo obligatorio',
            'sede.required' => 'Campo obligatorio',
            ]);
        $cinta->update($request->only([
            'caja_resguardo',
            'anaquel',
            'nivel',
            'sede'
        ]));

        return redirect()->route('cintas.index')
            ->with('success', 'Cinta actualizada correctamente');
    }
    public function show($id)
{
    $cinta = Cintas::findOrFail($id);

    return view('cintas.show', compact('cinta'));
}
}