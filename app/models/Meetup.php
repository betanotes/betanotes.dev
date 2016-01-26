<?php

class Meetup extends Eloquent {

	protected $table = 'meetups';

	public function attendees()
	{
		return $this->hasMany('Attendee');
	}
	public function votes()
    {
        return $this->hasMany('Vote');
    }

    public function userHasVoted()
    {

        $vote = Vote::where('user_id', '=', Auth::id())->where('meetup', '=', $this->id)->first();
        if($vote){
            return true;
        }
        return false;
    }
    
    public function voteUpCount()
    {
        return Vote::where('meetup_id', '=', $this->id)->where('vote', 1)->count();
    }

    public function voteDownCount()
    {
        return Vote::where('meetup_id', '=', $this->id)->where('vote', 0)->count();
    }
}
?>