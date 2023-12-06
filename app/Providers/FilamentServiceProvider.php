<?php

namespace App\Providers;

use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use Illuminate\Support\Facades\Auth;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\UserResource;


class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
        // Using Vite
        Filament::registerViteTheme(
            app(Vite::class)('resources/css/filament.css'),
        );

            if(Auth::check() && Auth::user()->hasRole('admin')) {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Settings')
                    ->url(UserResource::getUrl())
                    ->icon('heroicon-s-cog'),
                // ...
            ]);
        }
    });
}
}