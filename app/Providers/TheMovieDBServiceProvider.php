<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TheMovieDB;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Services\RequestMovieDB;
class TheMovieDBServiceProvider extends ServiceProvider
{
	private $requestMovieDb;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(RequestMovieDB $requestMovieDb)
    {
        //
        $this->requestMovieDb = $requestMovieDb;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    	$this->app->singleton(TheMovieDB::class, function ($app) {
    		return new TheMovieDB($this->requestMovieDb);
    	});
   	}
}
