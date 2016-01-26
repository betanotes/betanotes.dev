<?php

use Carbon\Carbon;

Class Vote extends Eloquent{

	protected $table = 'votes';

	public function user()
	{
	    return $this->belongsTo('User');
	}
	public function note()
	{
	    return $this->belongsTo('Note');
	}

	public function sheet()
	{
	    return $this->belongsTo('Sheet');
	}
	public function meetup()
	{
	    return $this->belongsTo('Meetup');
	}
}