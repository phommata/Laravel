<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation bar
     */
    public function composeNavigation()
    {
        // Not pass a closure, pass a class path as a string
        // Behind the scenes, Laravel will detect the attempt to resolve a class out of a service container
        // and will trigger a specific method on it.
        view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer');
//        view()->composer('partials.nav', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });
    }
}
