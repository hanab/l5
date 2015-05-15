@extends('app')
 
@section('content')

	<div class="recipe-container">

   		<div class="title">
   			<label>Title:</label>
   			<span class="recipe-detail-title-text">{{$recipes->title}}</span>


   		</div>
   		
   		<div class="description">
   			<label>Description: </label>
   			<span class="recipe-description">{{$recipes->description}}</span>
   		</div>
   		

   		<div class="ingredients">
   			<label>Ingredients:</label>

			

			<div class="ingredients-list">
				@foreach($recipes->ingredients as $ingredient)
					<li>
						{{ $ingredient->name }}
					</li>
				@endforeach
			</div>
			


		</div>

		
		
	</div>

@endsection