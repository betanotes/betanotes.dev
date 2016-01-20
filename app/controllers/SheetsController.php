<?php

class SheetsController extends \BaseController {

    public function __construct()
    {
        // parent::__construct();
        // $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sheets = Sheet::with('lines')->orderBy('id', 'desc')->paginate(10);
        return View::make('sheets.index')->with('sheets', $sheets);
        // return View::make('sheets.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sheets.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // $validator = Validator::make(Input::all(), Sheet::$rules);

        // if ($validator->fails()) {
        //     return Redirect::back()->withInput()->withErrors($validator);
        // } else {
        //     $sheet = new Sheet();
        //     $sheet->title = Input::get('title');
        //     $sheet->title = Input::get('title');
        //     $sheet->user_id = Auth::user()->id;
        //     $result = $sheet->save();

        //     if ($result) {
        //         Session::flash('successMessage', 'This sheet was saved.');
        //         Log::info('This is some useful information.', Input::all());
        //         return Redirect::route('sheet.index');
        //     } else {
        //         Session::flash('errorMessage', 'This sheet was not submitted.');
        //         return Redirect::back()->withInput();
        //     }
        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $sheet = Sheet::with('lines')->where('id', $id)->orWhere('slug', $id)->first();

        if (!$sheet) {
            Session::flash('errorMessage', 'This sheet does not exist.');
            return Redirect::route('sheets.index');
        }

        return View::make('sheets.show')->with('sheet', $sheet);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // $sheet = Sheet::find($id);
        // if (!$sheet) {
        //     Session::flash('errorMessage', 'This sheet does not exist for editing.');
        //     return Redirect::route('sheets.index');
        // }

        // return View::make('sheets.edit')->with('sheet', $sheet);
        return View::make('sheets.edit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // $validator = Validator::make(Input::all(), Sheet::$rules);

        // if ($validator->fails()) {
        //     return Redirect::back()->withInput()->withErrors($validator);
        // } else {
        //     $sheet = Sheet::find($id);
        //     $sheet->title = Input::get('title');
        //     $sheet->title = Input::get('title');
        //     $sheet->user_id = Auth::user()->id;
        //     $result = $sheet->save();

        //     if ($result) {
        //         Session::flash('successMessage', 'This sheet was saved.');
        //         // Log::info('This is some useful information.', Input::all());
        //         return Redirect::route('sheets.index');
        //     } else {
        //         Session::flash('errorMessage', 'This sheet was not submitted.');
        //         return Redirect::back()->withInput();
        //     }
        // }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // $sheet = Sheet::findOrFail($id);
        // $sheet->delete();
        
        // Session::flash('successMessage', 'This sheet was deleted.');
        // return Redirect::route('sheets.index');
    }


}
