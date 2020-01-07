<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseLevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_levels', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 30)->default('easy')->comment('beginner/intermediate/expert');
			$table->text('icon', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_levels');
	}

}
