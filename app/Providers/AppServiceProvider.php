<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Recipe;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//this is to add the latest recipe in the nav bar(removed for timebeing in the UI)
		view()->composer('partials.nav', function($view)

        {
        	$view->with('latest',Recipe::latest()->first());

        });
	}

	
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
