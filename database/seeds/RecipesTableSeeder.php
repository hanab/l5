<?php
 
use Illuminate\Database\Seeder;
 
class RecipesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('recipes')->delete();
        
 
       /$recipes = array(
            ['title' => 'chicken pizza', 'description' => 'a testy pizza' ,'picture' =>'null' ,'created_at' => new DateTime],
            ['title' => 'salmon soup', 'description' => 'a testy soup' ,'picture' =>'null', 'created_at' => new DateTime],
            
        );
 
        // Uncomment the below to run the seeder
       DB::table('recipes')->insert($recipes);
    }
 
}
 

