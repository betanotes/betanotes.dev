<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotecomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notecoms', function($table) {
			$table->increments('id');
			$table->string('comment', 1000);
			$table->integer('note_id')->unsigned();
			$table->foreign('note_id')->references('id')->on('notes');
			$table->integer('collaborator_id')->unsigned();
			$table->foreign('collaborator_id')->references('id')->on('users');
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
		Schema::drop('notecoms');
	}

}
