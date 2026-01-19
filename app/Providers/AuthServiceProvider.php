<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        /**
         * Admin & Staff boleh akses User Management
         * Digunakan di routes/web.php → can:accessAdmin
         */
        Gate::define('accessAdmin', function (User $user) {
            return in_array($user->role, ['admin', 'staff']);
        });

        /**
         * Hanya Admin boleh membuat akun Staff & Admin
         * Digunakan di controller & blade
         */
        Gate::define('create-admin-staff', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
