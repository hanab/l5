<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Requests\IngredientRequest;
//use Request;

class IngredientsController extends Controller {

	//show recipes associated with a give ingrident(UI not added yet)
	public function show(Ingredient $ingredient)
	{
		$recipe = $ingredient->recipes;

        return view('recipe.index', compact('recipe'));

	}

    //create a new ingredient
	public function create()
	{

    return view('ingredient.create');
    
	}

    //add an ingredient to the table and redirect back to the create recipe page
	public function store(IngredientRequest $request)
	{

     Ingredient::create($request->all());

     return redirect('/recipe/create');

	}

}
