<?php

class ListsController extends \BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $lists = List::with('user')->orderBy('id', 'desc')->paginate(10);
       return View::make('lists.index')->with('lists', $lists);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('lists.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), List::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $list = new List();
            $list->title = Input::get('title');
            $list->title = Input::get('title');
            $list->user_id = Auth::user()->id;
            $result = $list->save();

            if ($result) {
                Session::flash('successMessage', 'This list was saved.');
                Log::info('This is some useful information.', Input::all());
                return Redirect::route('list.index');
            } else {
                Session::flash('errorMessage', 'This list was not submitted.');
                return Redirect::back()->withInput();
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $list = List::where('id', $id)->orWhere('slug', $id)->first();

        if (!$list) {
            Session::flash('errorMessage', 'This list does not exist.');
            return Redirect::route('lists.index');
        }

        return View::make('lists.show')->with('list', $list);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $list = List::find($id);
        if (!$list) {
            Session::flash('errorMessage', 'This list does not exist for editing.');
            return Redirect::route('lists.index');
        }

        return View::make('lists.edit')->with('list', $list);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), List::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $list = List::find($id);
            $list->title = Input::get('title');
            $list->title = Input::get('title');
            $list->user_id = Auth::user()->id;
            $result = $list->save();

            if ($result) {
                Session::flash('successMessage', 'This list was saved.');
                // Log::info('This is some useful information.', Input::all());
                return Redirect::route('list.index');
            } else {
                Session::flash('errorMessage', 'This list was not submitted.');
                return Redirect::back()->withInput();
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $list = List::findOrFail($id);
        $list->delete();
        
        Session::flash('successMessage', 'This list was deleted.');
        return Redirect::route('lists.index');
    }


}
