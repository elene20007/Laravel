<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        /*Blade::directive('admin', function () {
            $isAuth = false;

            // check if the user authenticated is teacher
            if (Auth::user()->email == "Admin@gmail.com") {

                $isAuth = ;
            }

            return "<?php if(" . intval($isAuth) . ") { ?>";
        });

        Blade::directive('endadmin', function () {
            return "<?php } ?>";
        });*/
    }
}
