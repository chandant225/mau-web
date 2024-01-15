<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use App\Models\Post;

class MarqueeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'client.layouts.master', 
            function ($view) {
                $view->with([
                    'profile' => Profile::get()->first(),
                    'posts' => Post::all()
                ]);
            }
        );
    }
}
