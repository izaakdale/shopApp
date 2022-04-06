<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Order' => 'App\Policies\OrderPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('order.view', 'App\Policies\OrderPolicy@view');
        // Gate::define('order.viewAny', 'App\Policies\OrderPolicy@viewAny');

        // Gate::resource('order', 'App\Policies\OrderPolicy');

        // Gate::define('show-order', function($user, $order){
        //     return $user->id == $order->user_id;
        // });

        Gate::before(function($user, $ability){
            if($user->is_admin && in_array($ability, ['order.view']))
            {
                return true;
            }
        });
    }
}
