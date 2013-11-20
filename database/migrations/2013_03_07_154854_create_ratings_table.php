<?php

use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function($table)
		{
			$table->increments('id');

			$table->integer("judge_id")->unsigned();
			$table->integer("story_id")->unsigned();

			$table->string("rating", 4);

			$table->timestamps();

			$table->foreign('judge_id')->references('id')->on('judges');
			$table->foreign('story_id')->references('id')->on('stories');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings');
	}

}