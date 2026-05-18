<?php

namespace App\Http\Requests\Auth;

use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'id_usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $user = \App\Models\User::where(
            'id_usuario',
            $this->input('id_usuario')
        )->first();


        if (
            ! $user ||
            ! Hash::check(
                $this->input('password'),
                $user->password
            )
        ) {

            throw ValidationException::withMessages([
                'id_usuario' =>
                'Usuario o contraseña inválidos',
            ]);
        }
        if ($user->hasRole('temporal')) {

            // Si ya expiró
            if (
                $user->expiration &&
                Carbon::now()->greaterThanOrEqualTo(
                    $user->expiration
                )
            ) {

                $user->delete();

                throw ValidationException::withMessages([
                    'id_usuario' =>
                    'La cuenta temporal expiró',
                ]);
            }


            $user->session_started_at =
                Carbon::now();

            $user->save();
        }

        Auth::login($user);
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')) . '|' . $this->ip());
    }
}
