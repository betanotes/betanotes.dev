<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetcomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetcoms', function($table) {
			$table->increments('id');
			$table->string('comment', 500);
			$table->integer('meetup_id')->unsigned();
			$table->foreign('meetup_id')->references('id')->on('meetups');
			$table->integer('attendee_id')->unsigned();
			$table->foreign('attendee_id')->references('id')->on('users');
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
		Schema::drop('meetcoms');
	}

}
