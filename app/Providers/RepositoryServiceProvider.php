<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('App\Repositories\Contracts\StreamRepositoryInterface', function($app) {
        				$clientID = Config::get('twitch.clientID');
            return new \App\Repositories\GuzzleStreamRepository(new \GuzzleHttp\Client);
        });
    }

}
