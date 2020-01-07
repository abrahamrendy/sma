<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('coursecode', 20)->comment('Course Code');
			$table->string('title', 100);
			$table->text('category', 65535)->nullable()->comment('comma separated');
			$table->decimal('price', 11)->nullable()->default(0.00);
			$table->integer('currency_id')->nullable()->comment('refer to currencies');
			$table->decimal('rating', 5)->nullable()->default(0.00)->comment('Course rating');
			$table->integer('subscription')->default(0);
			$table->text('image', 65535)->nullable()->comment('path to image file');
			$table->text('detail_image', 65535)->nullable();
			$table->dateTime('start_date')->nullable();
			$table->decimal('duration', 7)->nullable()->default(0.00)->comment('in minutes');
			$table->dateTime('end_date')->nullable();
			$table->boolean('type')->nullable()->default(0)->comment('0:offline,1:online');
			$table->text('overview', 65535)->nullable();
			$table->text('info', 65535)->nullable()->comment('comma separated');
			$table->decimal('offline_progress', 5)->nullable()->default(0.00);
			$table->integer('level')->nullable()->default(1);
			$table->integer('created_by')->nullable();
			$table->dateTime('created_time')->nullable();
			$table->integer('approved_by')->nullable();
			$table->dateTime('approved_time')->nullable();
			$table->boolean('sfc')->default(0);
			$table->boolean('status')->nullable()->default(1)->comment('0:inactive,1:active, 2: deleted, 3:completed');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
