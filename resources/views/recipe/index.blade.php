<html>
	<head>	
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

	</head>
	<body>
		
	@extends('app')
	@section('content')

		<div class="recipe-container">

    		<div class="wellcome">
    		    <h1>Welcome To Recipe website</h1>
    		    <p class="lead">View the latest recipes!</p>
    		</div>

    		<div class="button-create button">
    			<a href="{{ action('RecipesController@create') }}">Create new</a>
    		</div>

    		@if($recipe->count())
    		    @foreach($recipe as $recipes)
    		        <div class="media listing">
    		            <div class="media-body">
    		                
    		                <div class="content">
    		                	
    		                	<div class="title">{{$recipes->title}}</div>

    		                	<div class="button_area">
    		                		<div class="button-detail button">
    		                		    <a href="{{ action('RecipesController@show',[$recipes->id]) }}">View Details</a>
    		                		</div>
    		                		
    		                		<div class="button-edit button">    		                	       		                	    	   
    		                	    	<a href="{{ action('RecipesController@edit',[$recipes->id]) }}">Edit</a>   		                	    	       		   
    		                		</div> 

    		                		
    		                		  

    		                	</div> 

    		                </div>

    		            </div>
    		        </div>
    	    	@endforeach

    		@endif

    	</div>

	@endsection				
	</body>
</html>
