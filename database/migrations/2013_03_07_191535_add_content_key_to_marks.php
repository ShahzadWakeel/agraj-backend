<?php

use Illuminate\Database\Migrations\Migration;

class AddContentKeyToMarks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("marks", function($table){
			$table->foreign('content_id')->references('id')->on('contents');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("marks", function($table){
			$table->dropForeign("marks_content_id_foreign");
		});
	}

}