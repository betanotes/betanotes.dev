<?php

class Meetup extends Eloquent {

	protected $table = 'meetups';

	public function attendees()
	{
		return $this->hasMany('Attendee');
	}
}
?>