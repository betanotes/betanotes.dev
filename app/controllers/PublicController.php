<?php

class PublicController extends \BaseController {

    public function __construct()
    {
        // parent::__construct();
        // $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

    public function showMain()
    {
        $sheets = Sheet::with('lines')->orderBy('id', 'desc')->paginate(10);
        return View::make('public.main')->with('sheets', $sheets);
        // return View::make('sheets.index');
    }

    public function showNotes()
    {
        return View::make('public.notes');
    }

    public function showSheets()
    {
        return View::make('public.sheets');
    }

    public function showMeetups()
    {
        return View::make('public.meets');
    }

}