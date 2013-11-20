<?php

use Illuminate\Database\Migrations\Migration;

class AddSectionIdToQuestions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questions', function($table) {
			$table->integer('section_id')->unsigned();

			$table->foreign("section_id")->references("id")->on("sections");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions', function($table) {
			$table->dropForeign("questions_section_id_foreign");

			$table->dropColumn('section_id');
		});
	}

}