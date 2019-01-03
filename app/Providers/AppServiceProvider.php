<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/*

Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes (SQL: alter table users add unique users_email_unique(email))

*/
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
