<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table) {
			$table->increments('id');
			$table->string('ship');
			$table->date('date');
			$table->string('model');
			$table->string('mark');
			$table->string('body');
			$table->string('year');
			$table->text('comment');
			$table->string('status');
			$table->integer('customer_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cars');
	}

}
