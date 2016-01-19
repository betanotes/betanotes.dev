<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('studylists')->delete();
		DB::table('users')->delete();

		$this->call('UsersSeeder');
		$this->call('StudylistTableSeeder');
	}

}
