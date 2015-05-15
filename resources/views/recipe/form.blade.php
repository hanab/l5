
{!! Form::hidden('user_id',1)  !!}
<div class="form-group">
   {!! Form::label('title', 'Title:')!!}
   {!! Form::text('title',null,['class' => 'form-control'])!!}
</div>

<div class="form-group">
   {!! Form::label('description', 'Description:')!!}
   {!! Form::textarea('description',null,['class' => 'form-control'])!!}
</div>

<div class="form-group">
   {!! Form::label('ingredient_list', 'Ingredients:')!!}
   {!! Form::select('ingredient_list[]', $ingredients, null, ['id' => 'ingredient_list', 'class' => 'form-control', 'multiple'])!!}
</div>
   
<div class="form-group">
   {!! Form::submit($ButtonText, ['class' => 'btn btn-primary form-control'])!!}
</div>

@section('footer')

   <script>
      $('#ingredient_list').select2({
         placeholder: 'Choose ingredient', 
         ingredients: true 
      });
    
   </script>

 
@endsection