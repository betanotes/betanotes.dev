<?php

use Carbon\Carbon;

class Studyquestion extends Eloquent
{
    protected $table = 'studyquestions';

    public static $rules = array(
    	'studyquestion' => 'required|max:200',
    	'studyanswer' => 'required|max:200'
    );

    public function studylist()
    {
        return $this->belongsTo('Studylist');
    }

}