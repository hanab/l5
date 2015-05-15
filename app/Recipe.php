<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {

	

   //this fields should be field to validate the form
   protected $fillable = array('title', 'description','user_id');
    
    //user is one to many related to recipe
   public function user()
   {

     return $this->belongsTo('App\User');

   }
 
   //a recipe can contain many ingredients
   public function ingredients()
   {
    return $this->belongsToMany('App\Ingredient')->withTimestamps();

   }

    //get the list of ids for ingredients
   public function getIngredientListAttribute()
   {

    return $this->ingredients->lists('id');

   }


}
