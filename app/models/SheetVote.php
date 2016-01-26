<?php

use Carbon\Carbon;

Class SheetVote extends Eloquent{

	protected $table = 'sheet_votes';

	public function user()
	{
	    return $this->belongsTo('User');
	}
	public function sheet()
	{
	    return $this->belongsTo('Sheet');
	}
}