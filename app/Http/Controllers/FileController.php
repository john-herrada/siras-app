<?php

namespace App\Http\Controllers;

use App\Models\UserFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
    $file = $request->file('file_document');

    $fileName = time() . '_' . $file->getClientOriginalName();

    $file->move(public_path('uploads'), $fileName);

    UserFile::create([
        'user_id' => $request->id_usuario, // ✔ rluna
        'file_name' => $file->getClientOriginalName(),
        'file_path' => 'uploads/' . $fileName
    ]);

    return back()->with('success', 'Archivo enviado');
    }



    public function destroy(UserFile $file)
    {
    if ($file->user_id !== auth()->user()->id_usuario) {
        abort(403, 'No autorizado');
    }
    if (file_exists(public_path($file->file_path))) {
        unlink(public_path($file->file_path));
    }
    $file->delete();
    return redirect()
        ->route('user.reportes')
        ->with(
            'success',
            'Archivo eliminado correctamente'
        );
    }
}