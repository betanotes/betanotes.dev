<?php

use Carbon\Carbon;

Class Vote extends Eloquent{

	protected $table = 'votes';

	protected $fillable = array('user_id', 'voteable_id', 'voteable_type');

	public function user()
	{
	    return $this->belongsTo('User');
	}
	public function voteable()
	{
		return $this->morphTo();
	}

	public function voteCount($id, $type)
	{	
		$voteCount = 0;
		$votes = Vote::findAll()->where('voteable_id', '=', $id)->where('votable_type', "=", $type);
			foreach ($votes as $vote) {
				if ($vote == 0){
					$voteCount -= 1;
				}else{
					$voteCount += 1;
				}
				return $voteCount;
			}
	}
}