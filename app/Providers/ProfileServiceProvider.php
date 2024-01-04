<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use App\Models\Post;

class ProfileServiceProvider extends ServiceProvider
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
            'client.layouts.footer', 
            function ($view) {
                $view->with([
                    'profile' => Profile::get()->first(),
                    'posts' => Post::all()
                ]);
            }
        );
    }
}
