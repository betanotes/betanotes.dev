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

	public static $rules = array(
		'comment' => 'required|between:1,400',
	);
}
?>