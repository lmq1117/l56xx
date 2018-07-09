<?php

namespace App\Providers;

use App\Helpers\Hasher\MD5Hasher;
use Illuminate\Support\ServiceProvider;

class MD5HasherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton('hash', function (){
            return new MD5Hasher();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function provides()
    {
        return ['hash'];
    }
}
