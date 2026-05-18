<?php

namespace App\Http\Controllers;

use App\Models\tickets;
use App\Models\User;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
   
    public function index()
    {
        $usuario = Auth::user()->nombre_apellido;

        $tickets1 = tickets::where('seguido_por', $usuario)->get();
        $userslist = User::all();
        $tickets = tickets::all();
        $users = UserFile::where('user_id', auth()->user()->id_usuario)->get();
        return view('tickets.tickets', compact('tickets', 'users', 'tickets1', 'userslist'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
       tickets::create([
            'ticket_referencia'=> $request->ticket_referencia,
            'creado_por'=> $request->creado_por,
            'fecha_creacion'=> $request->fecha_creacion,
            'nombre_usuario'=> $request->nombre_usuario,
            'detalles'=> $request->detalles,
            'piso'=> $request->piso,
            'ala'=> $request->ala,
            'referencia_ubicacion'=> $request->referencia_ubicacion,
            'seguido_por'=> $request->id_usuario,
            'estatus'=> 'En Proceso'
        ]);

        return back()->with('success', 'Ticket agregado');
    }

    
    public function show(tickets $tickets)
    {
        //
    }

    
    public function edit(tickets $tickets)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        $ticket = tickets::findOrFail($id);

         $ticket->update([
            'fecha_cierre'=> $request->fecha_cierre,
            'estatus'=> 'Completado',
            'observaciones_finales'=> $request->observaciones_finales
         ]);

         return back()->with(
        'success',
        'Ticket actualizado'
    );
    }

    
    public function destroy(tickets $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket eliminado correctamente');
    }
}
