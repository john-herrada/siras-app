<?php

use App\Http\Controllers\CintasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Desarrollador\UserController;
use App\Http\Controllers\EntregasController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MapaSiteController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuertosController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\VpnController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// RUTA PRINCIPAL
Route::redirect('/', '/login');


Route::middleware('auth')->group(function () {

    Route::get('/changuepass', [UserController::class, 'showChangePasswordForm'])
        ->name('password.change');

    Route::post('/changuepass', [UserController::class, 'changePassword'])
        ->name('password.update');
});



Route::middleware(['auth', 'force.password.change'])->group(function () {

    // VISTA CINTAS
    Route::resource('cintas', CintasController::class)
        ->middleware('permission:viewcintas');

    Route::get('/cintas/buscar', [CintasController::class, 'buscar'])
        ->name('cintas.buscar')
        ->middleware('permission:viewcintas');
    //VISTAS TICKETS
    Route::resource('tickets', TicketsController::class);


    // VISTA ENTREGAS
    Route::resource('entregas', EntregasController::class)
        ->middleware('permission:viewentregas');

    Route::post('/entregas/entregar', [EntregasController::class, 'entregar'])
        ->name('entregas.entregar');

    // VISTA PRESTAMOS
    Route::resource('prestamo', PrestamoController::class)
        ->middleware('permission:viewprestamos');
    //VISTA PUERTOS
    // RUTA AJAX
    Route::get(
        '/buscar-puertos',
        [PuertosController::class, 'buscar']
    )->name('puertos.buscar');

    Route::resource(
        'puertos',
        PuertosController::class
    );
    //FILA 0
    Route::get('/f0r1', function () {
        return view('Puertos.fila_0.rack_1');
    })->name('f0r1');
    //FILA 1
    Route::get('/f1r1', function () {
        return view('Puertos.fila_1.rack_1');
    })->name('f1r1');

    Route::get('/f1r2', function () {
        return view('Puertos.fila_1.rack_2');
    })->name('f1r2');

    Route::get('/f1r3', function () {
        return view('Puertos.fila_1.rack_3');
    })->name('f1r3');

    Route::get('/f1r4', function () {
        return view('Puertos.fila_1.rack_4');
    })->name('f1r4');

    Route::get('/f1r5', function () {
        return view('Puertos.fila_1.rack_5');
    })->name('f1r5');

    Route::get('/f1r6', function () {
        return view('Puertos.fila_1.rack_6');
    })->name('f1r6');
    //FILA 2
    Route::get('/f2r1', function () {
        return view('Puertos.fila_2.rack_1');
    })->name('f2r1');

    Route::get('/f2r2', function () {
        return view('Puertos.fila_2.rack_2');
    })->name('f2r2');

    Route::get('/f2r3', function () {
        return view('Puertos.fila_2.rack_3');
    })->name('f2r3');

    Route::get('/f2r4', function () {
        return view('Puertos.fila_2.rack_4');
    })->name('f2r4');

    Route::get('/f2r6', function () {
        return view('Puertos.fila_2.rack_6');
    })->name('f2r6');

    Route::get('/f2r7', function () {
        return view('Puertos.fila_2.rack_7');
    })->name('f2r7');
    //FILA 3
    Route::get('/f3r1', function () {
        return view('Puertos.fila_3.rack_1');
    })->name('f3r1');

    Route::get('/f3r2', function () {
        return view('Puertos.fila_3.rack_2');
    })->name('f3r2');

    Route::get('/f3r3', function () {
        return view('Puertos.fila_3.rack_3');
    })->name('f3r3');

    Route::get('/f3r4', function () {
        return view('Puertos.fila_3.rack_4');
    })->name('f3r4');

    Route::get('/f3r5', function () {
        return view('Puertos.fila_3.rack_5');
    })->name('f3r5');

    Route::get('/f3r6', function () {
        return view('Puertos.fila_3.rack_6');
    })->name('f3r6');

    Route::get('/f3r8', function () {
        return view('Puertos.fila_3.rack_8');
    })->name('f3r8');
    //FILA 4
    Route::get('/f4r1', function () {
        return view('Puertos.fila_4.rack_1');
    })->name('f4r1');

    Route::get('/f4r2', function () {
        return view('Puertos.fila_4.rack_2');
    })->name('f4r2');

    Route::get('/f4r3', function () {
        return view('Puertos.fila_4.rack_3');
    })->name('f4r3');

    Route::get('/f4r4', function () {
        return view('Puertos.fila_4.rack_4');
    })->name('f4r4');

    Route::get('/f4r6', function () {
        return view('Puertos.fila_4.rack_6');
    })->name('f4r6');

    Route::get('/f4r7', function () {
        return view('Puertos.fila_4.rack_7');
    })->name('f4r7');

    Route::get('/f4r8', function () {
        return view('Puertos.fila_4.rack_8');
    })->name('f4r8');
    //FILA 5
    Route::get('/f5r1', function () {
        return view('Puertos.fila_5.rack_1');
    })->name('f5r1');

    Route::get('/f5r2', function () {
        return view('Puertos.fila_5.rack_2');
    })->name('f5r2');

    Route::get('/f5r3', function () {
        return view('Puertos.fila_5.rack_3');
    })->name('f5r3');

    Route::get('/f5r4', function () {
        return view('Puertos.fila_5.rack_4');
    })->name('f5r4');

    Route::get('/f5r5', function () {
        return view('Puertos.fila_5.rack_5');
    })->name('f5r5');

    Route::get('/f5r6', function () {
        return view('Puertos.fila_5.rack_6');
    })->name('f0r1');

    Route::get('/f5r7', function () {
        return view('Puertos.fila_5.rack_7');
    })->name('f5r7');

    Route::get('/f5r8', function () {
        return view('Puertos.fila_5.rack_8');
    })->name('f5r8');
    // VISTA USUARIOS
    Route::resource('user', UserController::class)
        ->middleware('permission:viewusers');
    //VISTA DESARROLLADOR
    Route::get('/desarrollador', function () {
        return view('desarrollador');
    })->name('developer')->middleware('permission:viewdeveloper');
    //VISTA VPN
    Route::resource('vpn', VpnController::class);

    // VISTAS SITE
    Route::get('/site/{vista}', [MapaSiteController::class, 'show'])
        ->name('site')
        ->middleware('permission:viewsite');



    // DASHBOARD




    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('files', FileController::class);

    Route::get('/reportes', [UserController::class, 'reportes'])
        ->name('user.reportes');
    // INICIO
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');


    // DEBUG
    Route::get('/debug-permisos', function () {
        return [
            'roles' => auth()->user()->getRoleNames(),
            'permisos' => auth()->user()->getAllPermissions()
        ];
    });
});

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/export/usuarios',
        [ExportController::class, 'usuarios']
    )
        ->name('export.usuarios');

    Route::get(
        '/export/cintas',
        [ExportController::class, 'cintas']
    )
        ->name('export.cintas');

    Route::get(
        '/export/prestamos',
        [ExportController::class, 'prestamos']
    )
        ->name('export.prestamos');

    Route::get(
        '/export/entregas',
        [ExportController::class, 'entregas']
    )
        ->name('export.entregas');

    Route::get(
        '/export/cintas-limpieza',
        [ExportController::class, 'cintasLimpieza']
    )
        ->name('export.cintas_limpieza');
});


require __DIR__ . '/auth.php';




Route::get('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/login');
})->middleware('auth');

Route::middleware([
    'auth',
    'temp.expiration'
])->group(function () {});


//rutas dashboard
Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard')->middleware('permission:viewdashboard');

Route::get('/expired-session', function () {

    $user = auth()->user();

    auth()->logout();

    if ($user) {
        $user->delete();
    }

    return redirect('/login')
        ->with('error', 'Tu tiempo expiró.');
});

