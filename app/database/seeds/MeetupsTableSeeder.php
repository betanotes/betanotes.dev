<?php

class MeetupsTableSeeder extends Seeder {
	
	public function run()
	{
		$meetup1 = new Meetup();
		$meetup1->title = "Bio Test Study Group";
		$meetup1->description = "Lets get together and study about Mitochondria!";
		$meetup1->time = "12:00 pm";
		$meetup1->date = "July 4, 2016";
		$meetup1->location = "McDonalds (8th street)";
		$meetup1->admin_id = 1;
		$meetup1->save();

		$meetup2 = new Meetup();
		$meetup2->title = "Criminal Justice 1100 Pre-test Study";
		$meetup2->description = "If you are also having trouble with the felony list, come join me!";
		$meetup2->time = "1:00 pm";
		$meetup2->date = "February 17, 2016";
		$meetup2->location = "Pete's Pizza";
		$meetup2->admin_id = 1;
		$meetup2->save();

		$meetup3 = new Meetup();
		$meetup3->title = "Business Ethics 1450 study group";
		$meetup3->description = "Guys, I really need some help with this.";
		$meetup3->time = "12:00 pm";
		$meetup3->date = "March 13, 2016";
		$meetup3->location = "Central Park";
		$meetup3->admin_id = 1;
		$meetup3->save();

		$meetup4 = new Meetup();
		$meetup4->title = "Sci-Fi and the Environment meetup";
		$meetup4->description = "For those who want help with the Avatar section";
		$meetup4->time = "12:00 pm";
		$meetup4->date = "February 4, 2016";
		$meetup4->location = "Bob's House";
		$meetup4->admin_id = 2;
		$meetup4->save();

		$meetup5 = new Meetup();
		$meetup5->title = "U.S. Politics Final Study Group";
		$meetup5->description = "We'll be covering the judicial branch unit";
		$meetup5->time = "2:00 pm";
		$meetup5->date = "March 15, 2016";
		$meetup5->location = "John Jay High School, Room 104";
		$meetup5->admin_id = 2;
		$meetup5->save();
	}
}