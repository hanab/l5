<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {

	//


    protected $fillable = array('title', 'description','user_id');
    
public function user()
{

return $this->belongsTo('App\User');

}

public function ingredients()
{


return $this->belongsToMany('App\Ingredient')->withTimestamps();

}
public function getIngredientListAttribute()
{

return $this->ingredients->lists('id');

}
// public function Picture(){
//             return unserialize($this->picture);
//         return $picture = array();
//     }

}
