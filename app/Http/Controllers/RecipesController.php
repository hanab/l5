<?php namespace App\Http\Controllers;
use Auth;
use App\Recipe;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Requests\RecipeRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class RecipesController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	//authentication is required to create and view recipes
	public function __construct()
	{
		$this->middleware('auth', ['only' => 'create', 'index' ]);

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	//show all the recipes
	public function index()
	{
		$recipe = Recipe::latest()->get();

		$latest = Recipe::latest()->first();
		
		return view('recipe.index', compact('recipe', 'latest'));

	}

    //show the detail of one recipe
	public function show(Recipe $recipes)

	{
		return view('recipe.show', compact('recipes'));
	}

   //creates a new recipe
	public function create()
	{
		$ingredients = Ingredient::lists('name', 'id');

		return view('recipe.create', compact('ingredients'));

	}

   //stores the recipe in database and redirects to the index page
	public function store(RecipeRequest $request)
	{
		$this->createRecipe($request);

        return redirect('recipe');

	}
     //edit a given recipe
	public function edit(Recipe $recipe)
	{
		
		$ingredients = Ingredient::lists('name', 'id');

		return view('recipe.edit',compact('recipe','ingredients'));

	}

	//update a give recipe after editing
	public function update(Recipe $recipe, RecipeRequest $request)
	{
		$recipe->update($request->all());
		$this->syncIngredients($recipe,$request->input('ingredient_list'));
		
		return redirect('recipe');
    }
     
     //delete a given recipe (UI not added) 
	public function destroy(Recipe $recipe)
	{
		$recipe->delete();

		return redirect('recipe');

     }

     //synchronize the ingredients as the are many to many related reattaching them causes problem
	public function syncIngredients(Recipe $recipe, array $ingredients)
	{

      $recipe->ingredients()->sync($ingredients);
	}

    //a method which is used inside the store method
	public function createRecipe(RecipeRequest $request)
	{
   		$recipe = Auth::user()->recipes()->create($request->all());
   		
        $this->syncIngredients($recipe,$request->input('ingredient_list'));

    	return $recipe;

	}
}
