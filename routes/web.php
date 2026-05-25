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

    Route::get('/export/usuarios',
        [ExportController::class, 'usuarios'])
        ->name('export.usuarios');

    Route::get('/export/cintas',
        [ExportController::class, 'cintas'])
        ->name('export.cintas');

    Route::get('/export/prestamos',
        [ExportController::class, 'prestamos'])
        ->name('export.prestamos');

    Route::get('/export/entregas',
        [ExportController::class, 'entregas'])
        ->name('export.entregas');

    Route::get('/export/cintas-limpieza',
        [ExportController::class, 'cintasLimpieza'])
        ->name('export.cintas_limpieza');
});


require __DIR__.'/auth.php';




Route::get('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/login');

})->middleware('auth');

Route::middleware([
    'auth',
    'temp.expiration'
])->group(function () {


});


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