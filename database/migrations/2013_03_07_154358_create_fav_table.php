<?php

use Illuminate\Database\Migrations\Migration;

class CreateFavTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favs', function($table)
		{
			$table->increments('id');

			$table->integer("judge_id")->unsigned();
			$table->integer("story_id")->unsigned();

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
		Schema::drop('favs');
	}

}