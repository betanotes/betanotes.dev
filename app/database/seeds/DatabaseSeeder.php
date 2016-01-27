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

		DB::table('sheetcoms')->delete();
		DB::table('notecoms')->delete();
		DB::table('attendees')->delete();
		DB::table('meetcoms')->delete();
		DB::table('meetups')->delete();
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
