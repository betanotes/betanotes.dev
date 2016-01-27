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
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('note_id')->unsigned()->nullable();
			$table->foreign('note_id')->references('id')->on('notes');
			$table->integer('sheet_id')->unsigned()->nullable();
			$table->foreign('sheet_id')->references('id')->on('sheets');
			$table->integer('meetup_id')->unsigned()->nullable();
			$table->foreign('meetup_id')->references('id')->on('meetups');

			$table->unique(['user_id', 'note_id']);
			$table->unique(['user_id', 'sheet_id']);
			$table->unique(['user_id', 'meetup_id']);
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
