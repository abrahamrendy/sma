<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseProposalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_proposals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('course_request_id');
			$table->integer('user_id');
			$table->string('title')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('pdf')->nullable();
			$table->dateTime('created_time')->nullable();
			$table->string('appointment_location')->nullable();
			$table->string('appointment_postal', 10)->nullable();
			$table->text('feedback', 65535)->nullable();
			$table->boolean('status')->nullable()->comment('0: new 1: accepted 2:rejected 3:removed');
			$table->dateTime('appointment_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_proposals');
	}

}
