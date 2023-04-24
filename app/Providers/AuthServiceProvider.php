<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('admin', function (User $user) {  //nom de l'autorisation de la facade Gate
            return $user->admin === 1;  //admin est le nom de l'autorisation pour la façade Gate
        });
        /*Gate::define('abonnement', function (User $user) {
            return date("y-m-d H.i.s")<=$user->abonnement ;*/
        /* Gate::define('majeur', function (User $user)) {
            $age= date('Y')-int(substr($user->datenais,4,4));
            return $age>=18  ;
        });*/
    }
}
