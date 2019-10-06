<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate; 

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        //this will allow any user with id of 1 to have access to everything 
        //as if they were admins
        $gate->before(function ($user, $ability) {
            if ($user->id == 1) {
                return true;
            }
        });
     }
}
