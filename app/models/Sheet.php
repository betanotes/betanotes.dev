<?php

use Carbon\Carbon;

class Sheet extends Eloquent
{
    protected $table = 'sheets';

    public static $rules = array(
    	'title' => 'required|max:100',
    	'public_or_private' => 'required',
        // 'clue' => 'required|max:200',
        // 'response' => 'required|max:200'
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function lines()
    {
        return $this->hasMany('Line');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->makeUniqueSlug($value);
    }

    public function isUniqueSlug($slug)
    {
        $sheets = Sheet::all();
        foreach($sheets as $sheet) {
            if ($sheet->slug == $slug) {
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

    public function votes()
    {
        return $this->hasMany('Vote');
    }

    public function userHasVoted()
    {

        $vote = Vote::where('user_id', '=', Auth::id())->where('sheet_id', '=', $this->id)->first();
        if($vote){
            return true;
        }
        return false;
    }
    
    public function voteUpCount()
    {
        return Vote::where('sheet_id', '=', $this->id)->where('vote', 1)->count();
    }

    public function voteDownCount()
    {
        return Vote::where('sheet_id', '=', $this->id)->where('vote', 0)->count();
    }
}