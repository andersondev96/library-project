<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User_Permission;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        if (Auth::check())
        {
            $userId = Auth::user()->id;
            $user = User::where('id', '=', $userId)->get();

            if ($user) {
                $user_Permission = User_Permission::where('user_id', '=', $userId)->get();

                foreach($user_Permission as $p) {
                    $permissionId =  $p->permission_id;
                    $permission = User_Permission::where('permission_id', '=', $permissionId)->get();

                    if ($permissionId == 1)
                        return 1;
                    else
                        return 2;
                }

            }


        }

        /* view()->composer(
            'layout.nav',
            function ($view) {
                $view->with('permissions', 'permissions');
            }
        ); */
    }
}