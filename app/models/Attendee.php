<?php

class Attendee extends Eloquent {

	protected $table = 'attendees';

	public function meetups()
	{
		return $this->hasMany('Meetup');
	}

	public function meetcoms()
	{
		return $this->hasMany('Meetcom');
	}
}
?>