<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetups', function($table) 
		{
			$table->increments('id');
			$table->string('title', 100);
			$table->string('description', 500);
			$table->string('time', 20);
			$table->string('date', 20);
			$table->string('location', 50);
			$table->integer('admin_id')->unsigned();
			$table->foreign('admin_id')->references('id')->on('users');
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
		Schema::drop('meetups');
	}

}
