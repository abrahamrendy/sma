<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionCartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaction_carts', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('Start from 10000000001');
			$table->integer('transaction_id')->nullable()->comment('filled as transaction is paid');
			$table->integer('user_id');
			$table->integer('course_id');
			$table->dateTime('time_added')->nullable();
			$table->dateTime('time_completed')->nullable();
			$table->boolean('status')->nullable()->default(0)->comment('0:awaiting payment, 1:paid');
			$table->string('detail', 100)->nullable();
			$table->integer('quantity')->default(1);
			$table->integer('participant')->comment('user participate in course');
			$table->decimal('total_amount', 11)->nullable()->default(0.00);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transaction_carts');
	}

}
