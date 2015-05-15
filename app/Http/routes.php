<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
#Resources => 'RecipesController'
//Route::model('recipe.recipe', 'Recipe');

Route::get('/', 'RecipesController@index');
Route::resource('ingredient', 'IngredientsController');
//Route::get('recipe/{id}', 'RecipesController@show');
//Route::post('recipe', 'RecipesController@store');
//Route::get('recipe/{id}/edit', 'RecipesController@edit');


 
// Use slugs rather than IDs in URLs
/*Route::bind('recipe.recipe', function($value, $route) {
	return App\Recipe::whereSlug($value)->first();
});*/
Route::resource('recipe', 'RecipesController');
Route::get('home', 'HomeController@index');
Route::get('contact', 'WelcomeController@contact');
//Route::get('ingredients/{ingredients}', 'IngredientsController@show');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

]);
