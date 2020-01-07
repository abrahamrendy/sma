<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('course_id');
			$table->text('title', 65535);
			$table->text('description', 65535)->nullable();
			$table->integer('module_number')->nullable()->default(1)->comment('module sequence number');
			$table->text('video', 65535)->nullable()->comment('path to video file');
			$table->decimal('duration', 7)->nullable()->default(0.00)->comment('in minutes');
			$table->boolean('preview')->nullable()->default(0)->comment('preview-able?0:no,1:yes');
			$table->boolean('status')->nullable()->default(1)->comment('0:inactive,1:active');
			$table->integer('created_by')->nullable();
			$table->dateTime('created_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules');
	}

}
