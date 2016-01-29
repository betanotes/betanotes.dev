<?php

class Meetup extends Eloquent {

	protected $table = 'meetups';

	public function attendees()
	{
		return $this->hasMany('Attendee');
	}

	public function votes()
    {
        return $this->morphMany("Vote", "voteable");
    }

    public function userHasVoted()
    {

        $vote = Vote::where('user_id', '=', Auth::id())->where('meetup', '=', $this->id)->first();
        if($vote){
            return true;
        }
        return false;
    }
    
    public function getVoteScoreAttribute()
    {
        $score = 0;

        foreach ($this->votes as $vote) {
            $score += $vote->vote;
        }

        return $score;
    }
}
?>