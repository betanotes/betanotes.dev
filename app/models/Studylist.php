<?php

use Carbon\Carbon;

class Studylist extends Eloquent
{
    protected $table = 'studylists';

    public static $rules = array(
    	'title' => 'required|max:100',
    	'public_or_private' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->makeUniqueSlug($value);
    }

    public function isUniqueSlug($slug)
    {
        $studylists = Studylist::all();
        foreach($studylists as $studylist) {
            if ($studylist->slug == $slug) {
                return false;
            }
        } 
        return true;
    } 

    public function makeUniqueSlug($value)
    {
        $slug = Str::slug($value);
        if ($this->isUniqueSlug($slug)) {
            return $slug;
        } else {
            return uniqid() . '-' . $slug;
        }
    }
}