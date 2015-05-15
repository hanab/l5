<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Recipe;
class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
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
