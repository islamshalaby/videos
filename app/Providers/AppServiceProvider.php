<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Skill;
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
        view()->share('categories', Category::all());
        view()->share('skills', Skill::all());
    }
}
