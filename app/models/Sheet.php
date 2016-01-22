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
}