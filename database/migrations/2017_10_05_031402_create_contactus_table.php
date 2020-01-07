<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contactus', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 100);
			$table->string('company', 50);
			$table->string('country', 5);
			$table->string('phone', 20);
			$table->text('interested_in', 65535);
			$table->text('message', 65535);
			$table->boolean('status')->default(0)->comment('0:new, 1:read');
			$table->dateTime('created_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contactus');
	}

}
