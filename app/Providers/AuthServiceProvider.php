<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('category.add', fn(User $user) => $user->is_admin);
        Gate::define('category.edit', fn(User $user) => $user->is_admin);
        Gate::define('item.edit', fn(User $user) => $user->is_admin);
        Gate::define('item.add', fn(User $user) => $user->is_admin);
        Gate::define('commande.delete', fn(User $user) => $user->is_admin);

        //
    }
}
