<?php

class Notecom extends Eloquent {

	protected $table = 'notecoms';

	public function note()
	{
		return $this->belongsTo('Note');
	}

	public function notecollaborator()
	{
		return $this->belongsTo('Notecollaborator');
	}

	public static $rules = array(
		'comment' => 'required|between:1,1000',
	);
}
?>