<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('inicio');
    }

    /**
     * Destroy an authenticated session.
     */
   public function destroy(Request $request): RedirectResponse
    {
    $user = Auth::user();

    if (
        $user &&
        $user->role === 'temporal' &&
        $user->session_started_at
    ) {

        // Tiempo restante REAL
        $remainingSeconds =
            Carbon::parse($user->expiration)
                ->diffInSeconds(now(), false);

        // Nueva expiración pausada
        $user->expiration =
            Carbon::now()
                ->addSeconds($remainingSeconds);

        // Pausar contador
        $user->session_started_at = null;

        // Si ya terminó
        if ($remainingSeconds <= 0) {

            $user->delete();

        } else {

            $user->save();
        }
    }

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
    }
}