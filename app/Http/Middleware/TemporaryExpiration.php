<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TemporaryExpiration
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->hasRole('Temporal')) {

            if (
                Carbon::now()->greaterThanOrEqualTo(
                    $user->expiration
                )
            ) {

                Auth::logout();

                $user->delete();

                return redirect('/login')
                    ->with(
                        'error',
                        'Tu tiempo expiró.'
                    );
            }
        }

        return $next($request);
    }
}