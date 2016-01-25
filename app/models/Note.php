<?php

use Carbon\Carbon;

class Note extends Eloquent
{
    protected $table = 'notes';

    protected $fillable = array('title', 'body');

    public static $rules = [
    	'title'      => 'required|max:100',
    	'body'       => 'required|max:10000',
    ];

// function that I am going to call off the note-object. finding an instance of vote. two wheres, do I have a note from this user for this vote, two wheres do I have a note from this user if it does have a note, return true, if they haven't voted, return false. 
    public function votes()
    {
        return $this->hasMany('Vote');
    }

    public function userHasVoted()
    {

        $vote = Vote::where('user_id', '=', Auth::id())->where('note_id', '=', $this->id)->first();
        if($vote){
            return true;
        }
        return false;
    }

    // public function countVotes()
    // {
    //     return Vote::where('note_id', '=', $this->id)->count();
    // }

    public function voteUpCount()
    {
        return Vote::where('note_id', '=', $this->id)->where('vote', 1)->count();
    }

    public function voteDownCount()
    {
        return Vote::where('note_id', '=', $this->id)->where('vote', 0)->count();
    }

    public function setTitleAttribute($value)
    {
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = $this->makeUniqueSlug($value);
    }

    public function getCreatedAtAttribute ($value){
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
    }

    public function user()
    {
    	return $this->belongsTo('User');
    }

    public function isUniqueSlug($slug)
    {
    	$notes = Note::all(); 
    	foreach($notes as $note) {
    		if($note->slug == $slug) {
    			return false;
    		}
    	}
    	return true;
    }

    public function makeUniqueSlug($value)
    {
    	$slug = Str::slug($value);
    	if($this->isUniqueSlug($slug)) {
    		return $slug;
    	} else {
    		return uniqid() . '-' . $slug;
    	}
    }

}