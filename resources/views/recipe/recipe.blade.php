<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				color: red;
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
			button.create{
				margin-top: 12px;
				padding: 6px;
				border: 1px solid rgb(242, 230, 230);
				color: #fff;
				background: rgb(128, 154, 181);
				font-weight: 400;
				cursor: pointer;
			}
			.delete{
				margin-top: 12px;
				padding: 6px;
				border: 1px solid red;
				color: #fff;
				background: rgb(128, 154, 181);
				font-weight: 400;
				cursor: pointer;
			}
			.edit{
				border: 1px solid green;
			}
		</style>
	</head>
	<body>
		
	@extends('app')
 
@section('content')
    <h2>Recipes</h2>
 
    @if ( !$recipe->count() )
        You have no recipies
    @else
        <ul>
            @foreach( $recipe as $recipes)
                <li><a href="{{ route('recipe.show') }}">{{$recipes->title}}</a></li>
            @endforeach
        </ul>
    @endif
@endsection

				<!-- Check the create action that has to go to the create or new action in controller -->
				
	</body>
</html>
