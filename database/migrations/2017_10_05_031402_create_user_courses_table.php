<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_courses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->boolean('type')->default(0)->comment('0:user,1:lecturer');
			$table->integer('course_id');
			$table->decimal('progress', 5)->default(0.00);
			$table->dateTime('registration_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_courses');
	}

}
