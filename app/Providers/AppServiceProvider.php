<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
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
        // Gate: hanya admin yang boleh manage product
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });

        // Gate: hanya admin yang boleh export product
        Gate::define('export-product', function (User $user) {
            return $user->role === 'admin';
        });

        // Daftarkan ProductPolicy untuk model Product
        Gate::policy(Product::class, ProductPolicy::class);
    }
}
