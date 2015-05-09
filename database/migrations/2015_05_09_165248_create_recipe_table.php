<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->string('title');
			$table->text('description');
			$table->string('ingredients');
			$table->timestamp('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return voids
	 */
	public function down()
	{
		//
		Schema::drop('recipes');
	}

}
