<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function($table)
		{
			$table->increments('id');
			$table->boolean('vote');
			$table->timestamps();
			$table->integer('note_id')->unsigned();
			$table->foreign('note_id')->references('id')->on('notes');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('notes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('votes');
	}


}
