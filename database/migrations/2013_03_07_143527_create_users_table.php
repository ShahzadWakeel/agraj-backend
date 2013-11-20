<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			
			$table->string("name");
			$table->string("email")->unique();
			$table->string("password");

			$table->boolean("gender");

			$table->integer("college_id")->unsigned();
			$table->string("college_email");

			$table->string("iit_year", 8);
			$table->string("year", 16);
			$table->string("department", 32);

			$table->string('city_state');
			$table->string('jee_city_state');

			$table->string("jee_air", 8);
			$table->boolean("jee_repeat", 2);

			$table->string("social_link");

			$table->string("confirmed_flag", 2)->default("0");

			$table->timestamps();

			$table->foreign('college_id')->references('id')->on('colleges');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}