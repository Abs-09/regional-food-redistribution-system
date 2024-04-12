<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function(User $user) {
            return $user->type == 'admin';
        });

        Gate::define('distributor', function(User $user) {
            return $user->type == 'distributor';
        });

        Gate::define('donator', function(User $user) {
            return $user->type == 'donator';
        });
        
        Gate::define('seeker', function(User $user) {
            return $user->type == 'seeker';
        });
    }
}
