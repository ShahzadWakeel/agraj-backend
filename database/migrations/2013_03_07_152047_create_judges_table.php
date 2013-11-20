<?php

use Illuminate\Database\Migrations\Migration;

class CreateJudgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('judges', function($table)
		{
			$table->increments('id');

			$table->string("name");
			$table->string("email")->unique();
			$table->string("password");

			$table->integer("college_id")->unsigned()->nullable();
			$table->string("hostel", 10);

			$table->string("department", 32);
			$table->string("iit_year", 4);

			$table->string("city_state");
			$table->string("social_link");

			$table->longtext("iit_impact");
			$table->longtext("career");
			$table->longtext("views");

			$table->foreign('college_id')->references('id')->on('colleges');

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
		Schema::drop('judges');
	}

}