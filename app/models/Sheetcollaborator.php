<?php

class Sheetcollaborator extends Eloquent
{

	protected $table = 'sheetcollaborators';

	public function sheets()
	{
		return $this->hasMany('Sheet');
	}

	public function sheetcoms()
	{
		return $this->hasMany('Sheetcom');
	}
}
?>