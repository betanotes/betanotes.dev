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

		DB::table('lines')->delete();
		DB::table('notes')->delete();
		DB::table('sheets')->delete();
		DB::table('users')->delete();

		$this->call('UsersSeeder');
		$this->call('SheetsTableSeeder');
		$this->call('NotesTableSeeder');
		$this->call('LinesTableSeeder');
	}

}
