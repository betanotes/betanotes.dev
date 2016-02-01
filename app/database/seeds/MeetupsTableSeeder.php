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

		$meetup6 = new Meetup();
		$meetup6->title = "Study for Mrs. French's test";
		$meetup6->description = "Lets get together and study for this test!";
		$meetup6->time = "2:00 pm";
		$meetup6->date = "March 18, 2016";
		$meetup6->location = "Pizza shop";
		$meetup6->admin_id = 3;
		$meetup6->save();

		$meetup7 = new Meetup();
		$meetup7->title = "Codeup entry exam study group";
		$meetup7->description = "We all want to get into codeup, so lets go study!";
		$meetup7->time = "3:00 pm";
		$meetup7->date = "March 23, 2016";
		$meetup7->location = "7th floor of Geekdom";
		$meetup7->admin_id = 3;
		$meetup7->save();

		$meetup8 = new Meetup();
		$meetup8->title = "Agricultural Leadership Final Study Group";
		$meetup8->description = "We've come this far! Let's do it!";
		$meetup8->time = "8:00 am";
		$meetup8->date = "February 7, 2016";
		$meetup8->location = "Coffee Station";
		$meetup8->admin_id = 4;
		$meetup8->save();

		$meetup9 = new Meetup();
		$meetup9->title = "Social Notes Variety Study Event";
		$meetup9->description = "Whatever you have to study for, bring it, and lets all study together!";
		$meetup9->time = "5:00 pm";
		$meetup9->date = "February 10, 2016";
		$meetup9->location = "Social Notes HQ, San Antonio";
		$meetup9->admin_id = 5;
		$meetup9->save();

		$meetup10 = new Meetup();
		$meetup10->title = "Heroes of Bebop - MUSC 2100 - Study Group";
		$meetup10->description = "From Charlie Parker to Dizzy Gillespie, we'll study about them for this big test!";
		$meetup10->time = "1:00 pm";
		$meetup10->date = "March 23, 2016";
		$meetup10->location = "Charles A. Vancouver Memorial Library";
		$meetup10->admin_id = 5;
		$meetup10->save();
	}
}