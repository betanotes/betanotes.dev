<?php
class UsersSeeder extends Seeder 
{
	public function run()
	{
		$user = new User();
		$user->firstname = "Stick";
		$user->lastname = "Figureman";
		$user->email = "stick@stickman.com";
		$user->password = Hash::make("iamastick");
		$user->affiliation = "2 Dimensional University";
		$user->break_type = "Hanging out";
		$user->save();
	}
}
?>