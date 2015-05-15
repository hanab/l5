
@extends('app')
 
@section('content')
	<div class="recipe-container">
		<h1> Create Ingredient </h1>
{!! Form::open(array('action' => 'IngredientsController@store'))!!}

{!! Form::hidden('user_id',1)  !!}
<div class="form-group">
   {!! Form::label('name', 'Name:')!!}
   {!! Form::text('name',null,['class' => 'form-control'])!!}
</div>
<div class="form-group">
   {!! Form::submit('Add Ingredient', ['class' => 'btn btn-primary form-control'])!!}
</div>

{!! Form::close()!!}
</div>
@include ('errors.errorList')
   
   
@endsection