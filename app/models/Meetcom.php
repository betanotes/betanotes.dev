<?php

class Meetcom extends Eloquent {

	protected $table = 'meetcoms';

	public function meetups()
	{
		return $this->hasMany('Meetup');
	}

	public function attendees()
	{
		return $this->hasMany('Attendee');
	}
}
?>