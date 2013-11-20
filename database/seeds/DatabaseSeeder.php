<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('AdminTableSeeder');
	}

}


Class AdminTableSeeder extends Seeder {

	public function run() {
		DB::table('admins')->delete();

        Admin::create(array('email' => 'super@user.com', "name" => "Super User", "password" => "agraj_admin_123"));
	}
}