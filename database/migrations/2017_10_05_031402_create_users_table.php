<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 20)->nullable();
			$table->string('name', 50);
			$table->string('email', 100)->nullable();
			$table->string('title', 5)->nullable();
			$table->text('google_credential', 65535)->nullable()->comment('Hashed Google Credentials');
			$table->text('facebook_credential', 65535)->nullable()->comment('Hashed Facebook Credentials');
			$table->string('password', 100)->nullable()->comment('Hashed password (when not using Google or Facebook)');
			$table->string('country', 5)->default('SG');
			$table->integer('interest')->nullable()->comment('based on course_categories');
			$table->integer('industry')->nullable()->comment('based on user_industries');
			$table->integer('occupation')->nullable()->comment('based on user_occupations');
			$table->string('organization', 200)->nullable()->comment('Organization for individual, corporate_company_name for corporate');
			$table->boolean('type')->nullable()->default(0)->comment('0:individual,1:corporate,2:employee');
			$table->boolean('type_premium')->nullable()->default(0)->comment('0:free,1:premium');
			$table->string('corporate_company_email', 100)->nullable();
			$table->string('corporate_phone_number', 20)->nullable();
			$table->integer('corporate_admin_occupation')->nullable()->comment('based on user_occupations');
			$table->text('photo', 65535)->nullable()->comment('path to profile avatar');
			$table->integer('reputation_id')->default(1);
			$table->integer('role')->default(1);
			$table->boolean('newsletters')->nullable()->default(0)->comment('Receive LAD newsletters?');
			$table->integer('employee_of')->nullable()->comment('Refer to user>id');
			$table->integer('course_credits')->nullable()->comment('maximum course that can be made');
			$table->integer('proposal_credits')->default(3)->comment('maximum proposals submitted');
			$table->timestamps();
			$table->boolean('status')->default(1)->comment('0:inactive,1:active,2:suspended');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
