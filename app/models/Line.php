<?php

use Carbon\Carbon;

class Line extends Eloquent
{
    protected $table = 'lines';

    public static $rules = array(
    	'clue' => 'required|max:200',
    	'response' => 'required|max:200'
    );

    public function sheet()
    {
        return $this->belongsTo('Sheet');
    }

}