<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('home_contents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50);
			$table->text('image', 65535)->nullable()->comment('path to image file');
			$table->text('linked_url', 65535)->nullable()->comment('linked URL');
			$table->boolean('type')->default(0)->comment('1:"trusted by",2:"our knowledge partner",3:"redefining workplace learning"');
			$table->text('description', 65535)->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('priority')->nullable()->default(1);
			$table->dateTime('created_time')->nullable();
			$table->integer('related_user')->nullable()->comment('used for testimony');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('home_contents');
	}

}
