<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_requests', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('requester_id')->nullable();
			$table->string('description');
			$table->decimal('budget', 11)->default(0.00);
			$table->integer('currency_id')->nullable()->comment('refer to currencies');
			$table->integer('participants')->default(1);
			$table->boolean('confidentiality')->default(0)->comment('0:no,1:yes');
			$table->string('area_of_training')->default('1')->comment('refer to course_categories');
			$table->dateTime('create_time')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('end_date')->nullable();
			$table->text('additional_info', 65535)->nullable();
			$table->text('pdf', 65535)->nullable()->comment('URL to pdf file');
			$table->boolean('status')->default(0)->comment('0:new, 1: accepted, 2: rejected');
			$table->dateTime('created_time')->nullable();
			$table->integer('approved_by')->nullable();
			$table->dateTime('approved_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_requests');
	}

}
