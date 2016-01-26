<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetcollaboratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheetcollaborators', function($table) {
			$table->integer('sheet_id')->unsigned();
			$table->foreign('sheet_id')->references('id')->on('sheets');
			$table->integer('collaborator_id')->unsigned();
			$table->foreign('collaborator_id')->references('id')->on('users');
			$table->string('collaborator_name', 100);
			$table->string('collaborator_email', 100);
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
		Schema::drop('sheetcollaborators');
	}

}
