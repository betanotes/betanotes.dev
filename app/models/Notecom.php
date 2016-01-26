<?php

class Notecom extends Eloquent {

	protected $table = 'notecoms';

	public function notes()
	{
		return $this->hasMany('Note');
	}

	public function notecollaborator()
	{
		return $this->belongs
	}
}
?>