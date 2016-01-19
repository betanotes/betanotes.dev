<?php

class Note extends Eloquent
{
    protected $table = 'notes';

    protected $fillable = array('title', 'body');

    public static $rules = [
    	'title'      => 'required|max:100',
    	'body'       => 'required|max:10000',
    ];

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