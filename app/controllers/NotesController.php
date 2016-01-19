<?php

class NotesController extends BaseController{

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));
	// 	$this->beforeFilter('auth', array('except' => array('index', 'show')));
	// }

	// public function index()
	// { 
	// 	$query = Post::with('user');

	// 	if (Input::has('search')) {
	// 		$query->where('title', 'like', '%title%');
	// 		$query->orWhere('body', 'like', '%body%');

	// 		$query->orWhereHas('user', function($q) {
	// 			$q->where('email', 'like', '%bee%');
	// 		});
	// 	}

// 		$notes = $query->paginate(4);
// 		// $posts = Post::with('user')->orderBy('updated_at', 'desc')->paginate(4);
// 		return View::make('notes.index')->with('notes', $notes);	
// 	}

// 	/**
// 	 * Show the form for creating a new resource.
// 	 *
// 	 * @return Response
// 	 */
// 	public function create()
// 	{
// 		return View::make('notes.create');
// 	}

// 	/**
// 	 * Store a newly created resource in storage.
// 	 *
// 	 * @return Response
// 	 */
// 	public function store()
// 	{
// 		Log::info('The info was stored and logged.');
// 		$note = new Note();
// 		return $this->validateAndSave($note);
// 	}

// 	/**
// 	 * Display the specified resource.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
// 	public function show($idOrTitle)
// 	{

// 		if (is_numeric($idOrTitle)){
// 			$note = Post::find($idOrTitle);
// 		} else {
// 			$note = Post::where('slug', '=', $idOrTitle)->first();
// 		}
// 		if(!$note) {
// 			App::abort(404);
// 		}
// 		return View::make('note.show')->with('note', $note);
// 	}

// 	/**
// 	 * Show the form for editing the specified resource.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
// 	public function edit($id)
// 	{
// 		$note = Post::find($id);
// 		return View::make('notes.edit')->with('note', $note);
// 	}

// 	/**
// 	 * Update the specified resource in storage.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
// 	public function update($id)
// 	{

// 			$note = Post::find($id);
// 			return $this->validateAndSave($note);
// 	}

// 	public function destroy($id)
// 	{
// 		$note = Post::find($id);
// 		$note->delete();

// 		return Redirect::action('NotesController@index');
// 	}

// 	protected function validateAndSave($note)
// 	{
// 		// create the validator
// 	    	$validator = Validator::make(Input::all(), Post::$rules);

// 	   		 // attempt validation
// 	    	if ($validator->fails()) {
// 	    		// validation failed, redirect to the post create page with validation errors and old inputs
// 	    		return Redirect::back()->withInput()->withErrors($validator);
// 	    	} else {
// 	        // validation succeeded, create and save the post

// 				$note->title = Input::get('title');
// 				$note->body = Input::get('body');
				
// 				if (Input::hasFile('image_upload'))
// 				{
// 					$file = Input::file('image_upload');
// 					$fileName = $file->getClientOriginalName();
// 					$destinationPath = 'img/upload/';
// 					$file->move($destinationPath, $fileName);
// 					$note->image_upload = $destinationPath . $fileName;
// 				}
   
// 				$note->user_id = User::first()->id;

// 				$result = $note->save();

// 				if($result){
// 					Session::flash('successMessage', 'Your note has been successfully saved.');
// 					return Redirect::action('NotesController@index');
// 				} else {
// 					return Redirect::back()->withInput();
// 				}	
// 			}	
// 	}
	
}
