<?php

class Sheetcom extends Eloquent
{
	protected $table = 'sheetcoms';

	public function sheet()
	{
		return $this->belongsTo('Sheet');
	}

	public function sheetcollaborator()
	{
		return $this->belongsTo('Sheetcollaborator');
	}

	public static $rules = array(
		'comment' => 'required|between:1,1000',
	);
}
?>