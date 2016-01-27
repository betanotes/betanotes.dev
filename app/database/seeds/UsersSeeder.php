<?php
class UsersSeeder extends Seeder 
{
	public function run()
	{
		$user = new User();
		$user->firstname = "Stick";
		$user->lastname = "Figureman";
		$user->age = "20";
		$user->description = "I am a stick figure. That is all there is to say.";
		$user->email = "stick@stickman.com";
		$user->password = Hash::make("iamastick");
		$user->affiliation = "2 Dimensional University";
		$user->image_url = "/img/stick.png";
		$user->save();
	}
}
?>