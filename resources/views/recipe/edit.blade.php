@extends('app')
 
@section('content')
	<div class="recipe-container">
   		<h1> Edit {!! $recipe->title !!}</h1>

   		{!! Form::model($recipe, ['method' => 'PATCH', 'action' => ['RecipesController@update', $recipe->id]])!!}
   		@include ('recipe.form', ['ButtonText' => 'Update Recipe'])
   		{!! Form::close()!!}
   		@include ('errors.errorList')
   	</div>
@endsection