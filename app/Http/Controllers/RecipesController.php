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
	public function update(Recipe $recipe, RecipeRequest $request)
	{
		//$recipe = Recipe::findOrFail($id);
		$recipe->update($request->all());
		if ($request->hasFile('picture'))
        {
            $files = $request->file('picture');
            foreach($files as $file) {
                if ($file->isValid()) {
                    $destinationPath = public_path().'uploads';
                    $filename = $file->getClientOriginalName();
                    $extension = $file -> getClientOriginalExtension();
                    $newfilename = sha1($filename . time()) . '.' . $extension;
                    $file->move($destinationPath, $newfilename);
                    $pictures[] = $destinationPath.$newfilename;
                }
            }
            $inputs = array_merge($inputs, array(
                'picture' => serialize($pictures)
            ));
        }
		$this->syncIngredients($recipe,$request->input('ingredient_list'));
		//$recipe->ingredients()->sync($request->input('ingredient_list'));
		return redirect('recipe');


	}

	public function destroy(Recipe $recipe)
	{
		$recipe->delete();
		return redirect('recipe');

      }
	public function syncIngredients(Recipe $recipe, array $ingredients)
	{

		$recipe->ingredients()->sync($ingredients);
	}
	public function createRecipe(RecipeRequest $request)
	{
   		$recipe = Auth::user()->recipes()->create($request->all());
   		// getting all of the post data
     //    if ($request->hasFile('picture')){
     //        $files = $request->file('picture');
     //        foreach($files as $file) {
     //            if ($file->isValid()) {
     //                $destinationPath = 'uploads/';
     //                $filename = $file->getClientOriginalName();
     //                $extension = $file -> getClientOriginalExtension();
     //                $newfilename = sha1($filename . time()) . '.' . $extension;
     //                $file->move($destinationPath, $newfilename);
     //                $pictures[] = $destinationPath.$newfilename;
     //            }
     //        }
     //        $recipe = array_merge($recipe, array(
     //            'picture' => serialize($picture)
     //        ));
     //    }else{
     //    	return redirect()->back()->with('error', ['Image filed required']);
     //    }
     //    dd("this is req .... ");
     //    dd($request);	
    	   $this->syncIngredients($recipe,$request->input('ingredient_list'));

    	return $recipe;

	}
}
