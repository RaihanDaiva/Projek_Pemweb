<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
    if (!$request->expectsJson()) {
        $user = auth()->user();
        session()->flash('error', 'Anda harus login untuk mengakses halaman ini.');

        if ($user && $user->role === 'admin') {
            return '/admin'; // Route untuk admin
        }

        if ($user && $user->role === 'user') {
            return '/customer/informasi_pasien'; // Route untuk user
        }

        return route('login');
     }

    return null;
    }
}
