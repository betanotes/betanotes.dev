<?php

class Notecollaborator extends Eloquent
{

	protected $table = 'notecollaborators';

	public function notes()
	{
		return $this->hasMany('Note');
	}

	public function notecoms()
	{
		return $this->hasMany('Notecom');
	}
}
?>