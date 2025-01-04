<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/dosen/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

        });
    }

    /**
     * Determine redirect path after login.
     *
     * @return string
     */
    public static function redirectToHome()
    {
        $user = Auth::user();

        if ($user->role === 'dosen') {
            return '/dosen/dashboard';
        }

        if ($user->role === 'mahasiswa') {
            return '/mahasiswa/dashboard';
        }

        return self::HOME; // Default redirect if role doesn't match
    }
}
