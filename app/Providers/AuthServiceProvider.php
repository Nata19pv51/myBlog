<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->roles[0]->id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->roles[0]->id, [1, 2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->roles[0]->id, [1, 2]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->roles[0]->id, [1, 2]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->roles[0]->id, [1, 2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->roles[0]->id, [1]);
        });

        foreach($this->getPermissions() as $permission) {
            Gate::define($permission->title, function($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }

    }

    private function getPermissions()
    {
        return Permission::all();
    }
}
