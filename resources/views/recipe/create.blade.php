@extends('app')
 
@section('content')
	<div class="recipe-container">
		<h1> Create recipe </h1>
		<div class="create-ingredent">
		   <div class="button-create button">
    			<a href="{{ action('IngredientsController@create') }}">Create New Ingredient</a>
    	   </div>

	   </div>
   		{!! Form::open(['url' => 'recipe'])!!}
   		@include ('recipe.form', ['ButtonText' => 'Add Recipe'])
   		{!! Form::close()!!}
   	</div>
   

@include ('errors.errorList')
   
   
@endsection