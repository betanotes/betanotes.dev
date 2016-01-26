<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheet_votes', function($table)
		{
			$table->increments('id');
			$table->boolean('vote');
			$table->timestamps();
			$table->integer('sheet_id')->unsigned();
			$table->foreign('sheet_id')->references('id')->on('sheets');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('sheets');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
