<?php

class FeedController extends \BaseController {

    public function __construct()
    {
        // parent::__construct();
        // $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

    public function showMain()
    {
        $sheets = Sheet::with('lines')->orderBy('id', 'desc')->take(15)->get();
        $notes = Note::with('user')->orderBy('id', 'desc')->take(15)->get();
        $meetups = Meetup::with('attendees')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->take(15)->get();

        return View::make('feed.main')->with('sheets', $sheets)->with('notes', $notes)->with('meetups', $meetups);
        // return View::make('sheets.index');
    }

    public function showNotes()
    {
        return View::make('feed.notes');
    }

    public function showSheets()
    {
        return View::make('feed.sheets');
    }

    public function showMeetups()
    {
        return View::make('feed.meets');
    }

}