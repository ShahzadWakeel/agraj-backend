<?php

use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contents', function($table)
		{
			$table->increments('id');

			$table->integer("story_id")->unsigned();
			$table->integer("question_id")->unsigned();

			$table->longtext("content");

			$table->timestamps();

			$table->foreign('story_id')->references('id')->on('stories');
			$table->foreign('question_id')->references('id')->on('questions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contents');
	}

}