<?php

use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marks', function($table)
		{
			$table->increments('id');

			$table->integer("judge_id")->unsigned();
			$table->integer("content_id")->unsigned();

			$table->string("marks",2);

			$table->timestamps();

			$table->foreign('judge_id')->references('id')->on('judges');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marks');
	}

}