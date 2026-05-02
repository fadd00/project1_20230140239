<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use Dedoc\Scramble\Scramble;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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

        Gate::define('viewApiDocs', function () {
            return true;
        });

        // Daftarkan ProductPolicy untuk model Product
        Gate::policy(Product::class, ProductPolicy::class);

        Scramble::configure()
            ->routes(function (Route $route) {
                return Str::startsWith($route->uri, 'api/');
            });
    }
}
