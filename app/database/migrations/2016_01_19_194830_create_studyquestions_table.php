<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyquestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('studyquestions', function($table)
		{
			$table->increments('id');
            $table->string('studyquestion', 200);
            $table->string('studyanswer', 200);
            $table->timestamps();
            $table->integer('studylist_id')->unsigned();
            $table->foreign('studylist_id')->references('id')->on('studylists');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('studyquestions');
	}

}
