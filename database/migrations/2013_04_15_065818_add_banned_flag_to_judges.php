<?php

use Illuminate\Database\Migrations\Migration;

class AddBannedFlagToJudges extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('judges', function($table) {
			$table->boolean('banned_flag')->default(False);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('judges', function($table) {
			$table->dropColumn('banned_flag');
		});
	}

}