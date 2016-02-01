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
		$user->password = Hash::make($_ENV['SF_PASS']);
		$user->affiliation = "2 Dimensional University";
		$user->image_url = "/img/stick.png";
		$user->save();

		$user2 = new User();
		$user2->firstname = "Zeshan";
		$user2->lastname = "Segal";
		$user2->age = "35";
		$user2->description = "I love birds, and Ornithology. Follow me if you need help learning all about our feathered-friends!";
		$user2->email = "zee@bee.com";
		$user2->password = Hash::make($_ENV['ZS_PASS']);
		$user2->affiliation = "Cornell Lab of Ornithology";
		$user2->image_url = "/img/profile4.gif";
		$user2->save();

		$user3 = new User();
		$user3->firstname = "Anthony";
		$user3->lastname = "Burns";
		$user3->age = "38";
		$user3->description = "Just a guy who loves his study sheets.";
		$user3->email = "aburns42@gmail.com";
		$user3->password = Hash::make($_ENV['TB_PASS']);
		$user3->affiliation = "ZTR Industries";
		$user3->image_url = "/img/profile1.gif";
		$user3->save();

		$user4 = new User();
		$user4->firstname = "Reagan";
		$user4->lastname = "Wilkins";
		$user4->age = "22";
		$user4->description = "I am a Full Stack Web Developer looking to share my notes with people.";
		$user4->email = "reagan.wilkins@gmail.com";
		$user4->password = Hash::make($_ENV['RW_PASS']);
		$user4->affiliation = "Codeup";
		$user4->image_url = "/img/profile5.gif";
		$user4->save();

		$user5 = new User();
		$user5->firstname = "Notey";
		$user5->lastname = "the Note";
		$user5->age = "25";
		$user5->description = "Hi! I'm Notey the Note! I love to study for things!";
		$user5->email = "notey@note.com";
		$user5->password = Hash::make($_ENV['NN_PASS']);
		$user5->affiliation = "Social Notes";
		$user5->image_url = "/img/profile2.gif";
		$user5->save();
	}
}
?>