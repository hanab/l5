<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {


  //the name field must be field to submite the form
    protected $fillable = array('name');

  //one ingredient can exist in many recipes
  public function recipes()
  {  


    return $this->belongsToMany('App\Recipe');

   }
}
