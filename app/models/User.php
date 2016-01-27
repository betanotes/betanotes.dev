<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public static $rules = array(
		'firstname' => 'required',
		'lastname' => 'required',
		'email' => 'required|email',
		'password' => 'required',
		'affiliation' => 'required',
	);

	public static $editrules = array(
		'firstname' => 'required',
		'lastname' => 'required',
		'email' => 'required|email',
		'affiliation' => 'required',
	);

	public static $descriptionrules = array(
		'description' => 'required|between:1,140',
	);
	
	public function notes()
	{
		return $this->hasMany('Note');
	}

	public function sheets()
	{
		return $this->hasMany('Sheet');
	}
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
