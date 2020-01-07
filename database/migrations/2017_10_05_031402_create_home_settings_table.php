<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('home_settings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('dashboard_title', 50);
			$table->text('dashboard_image', 65535)->comment('path to image file');
			$table->text('dashboard_title_description', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('home_settings');
	}

}
