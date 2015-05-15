<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Recipe;
class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	//this is to add the latest recipe in the nav bar(removed for timebeing in the UI)
	public function boot()
	{
		//
		view()->composer('partials.nav', function($view)

        {

           $view->with('latest',Recipe::latest()->first());
        });
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

}
