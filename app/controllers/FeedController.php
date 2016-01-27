<?php

class FeedController extends \BaseController {

    public function showMain()
    {
        $search = Input::get('search');
        if (Input::has('search')) {
            $sheets = Sheet::with('lines')->where('public_or_private', '=', 'public')->where('title', 'like', '%' . $search . '%')->orWhereHas('lines', function($q) use ($search) {
                $q->where('clue', 'like', '%' . $search . '%');
            })->orWhereHas('lines', function($q) use ($search) {
                $q->where('response', 'like', '%' . $search . '%');
            })->orderBy('id', 'desc')->take(15)->get();
            $notes = Note::with('user')->where('public_or_private', '=', 'public')->where('title', 'like', '%' . Input::get('search') . '%')->orWhere('body', 'like', '%' . Input::get('search') . '%')->orderBy('id', 'desc')->take(15)->get();
            $meetups = Meetup::with('attendees')->orderBy('created_at', 'desc')->where('title', 'like', '%' . Input::get('search') . '%')->orWhere('description', 'like', '%' . Input::get('search') . '%')->orWhere('location', 'like', '%' . Input::get('search') . '%')->take(15)->get();
        } else {
            $sheets = Sheet::with('lines')->where('public_or_private', '=', 'public')->orderBy('id', 'desc')->take(15)->get();
            $notes = Note::with('user')->where('public_or_private', '=', 'public')->orderBy('id', 'desc')->take(15)->get();
            $meetups = Meetup::with('attendees')->orderBy('created_at', 'desc')->take(15)->get();
        }
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