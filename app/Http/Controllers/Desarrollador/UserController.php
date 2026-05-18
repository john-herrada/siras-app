<?php

namespace App\Http\Controllers\Desarrollador;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('usuarios.users', compact('users'));
    }
    public function changePassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:8|confirmed'
    ]);

    $user = auth()->user();

    $user->password = bcrypt($request->password);

    $user->must_change_password = 0;

    $user->save();

    return redirect()->route('inicio')
        ->with('success', 'Contraseña actualizada correctamente');
}
   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
        'id_usuario' => 'required|unique:users',
        'nombre_apellido' => 'required|unique:users',
    ], [

        'id_usuario.required' => 'Campo obligatorio',
        'id_usuario.unique' => 'ID usado por otro usuario',

        'nombre_apellido.required' => 'Campo obligatorio',
        'nombre_apellido.unique' => 'Campo obligatorio'
    ]);

    $data = [
        'id_usuario' => $request->id_usuario,
        'nombre_apellido' => $request->nombre_apellido,
        'password' => bcrypt($request->password),

        'must_change_password' => true,
    ];


    if ($request->rol === 'Temporal') {


        $data['expiration'] =
            Carbon::now()->addHour();
    }

    if ($request->hasFile('foto')) {

        $archivo = $request->file('foto');

        $nombre =
            time().'_'.$archivo->getClientOriginalName();

        $archivo->move(
            public_path('img/usuarios'),
            $nombre
        );

        $data['foto'] =
            'img/usuarios/'.$nombre;
    }

    $user = User::create($data);

    $user->assignRole($request->rol);

    return redirect()
        ->route('user.index')
        ->with(
            'success',
            'Usuario agregado correctamente'
        );
    }
    public function reportes()
    {
    $users = User::all();
    $files = UserFile::where('user_id', auth()->user()->id_usuario)->get();

    return view('reportes.reportes', compact('users', 'files'));
    }

    public function show(string $id)
    {
        //
    }
    public function showChangePasswordForm()
    {
    return view('usuarios.changuepass');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
      $data = [
        'id_usuario' => $request->id_usuario,
        'nombre_apellido' => $request->nombre_apellido,
    ];

    
    if (!empty($request->password)) {
        $data['password'] = bcrypt($request->password);
    }

    
    if ($request->hasFile('foto')) {

    $archivo = $request->file('foto');

    $nombre = time().'_'.$archivo->getClientOriginalName();

    $archivo->move(public_path('img/usuarios'), $nombre);

    $data['foto'] = 'img/usuarios/'.$nombre;
    }

    $user->update($data);

    return redirect()->route('user.index')
        ->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user )
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Cinta eliminada correctamente');
    }
}

