<?php

class FeedController extends \BaseController {

    public function __construct()
    {
        // parent::__construct();
        // $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

    public function showMain()
    {
        $sheets = Sheet::with('lines')->where('public_or_private', '=', 'public')->orderBy('id', 'desc')->take(15)->get();
        $notes = Note::with('user')->where('public_or_private', '=', 'public')->orderBy('id', 'desc')->take(15)->get();
        $meetups = Meetup::with('attendees')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->take(15)->get();

        return View::make('feed.main')->with('sheets', $sheets)->with('notes', $notes)->with('meetups', $meetups);
    }

    public function showNotes()
    {
        $notes = Note::with('user')->where('public_or_private', '=', 'public')->orderBy('id', 'desc')->paginate(10);
        return View::make('feed.notes')->with('notes', $notes);
    }

    public function showSheets()
    {
        $sheets = Sheet::with('lines')->where('public_or_private', '=', 'public')->orderBy('id', 'desc')->paginate(10);
        return View::make('feed.sheets')->with('sheets', $sheets);
    }

    public function showMeetups()
    {
        $meetups = Meetup::with('attendees')->orderBy('created_at', 'desc')->paginate(10);
        return View::make('feed.meets')->with('meetups', $meetups);
    }

}