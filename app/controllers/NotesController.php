<?php

class NotesController extends BaseController{

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth');
	}

	public function index()
	{ 	
		$loggedInUser = Auth::user()->id;
		$notes = Note::with('user')->where('user_id', '=', $loggedInUser)->orderBy('updated_at', 'desc')->paginate(10);
		return View::make('notes.index')->with('notes', $notes);		
	}
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('notes.create');		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Log::info('The info was stored and logged.');
		$note = new Note();
		return $this->validateAndSave($note);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idOrTitle)
	{
		if (is_numeric($idOrTitle)){
			$note = Note::find($idOrTitle);
		} else {
			$note = Note::where('slug', '=', $idOrTitle)->first();
		}
		if(!$note) {
			App::abort(404);
		}
		if($note->public_or_private == "private") {
			if(Auth::user()->id != $note->user_id) {
				Session::flash('errorMessage', 'This note is private and cannot be accessed publicly.');
				return Redirect::action('NotesController@index');
			}
		}
		$comments = [];
		$allcomments = Notecom::all();
		foreach($allcomments as $comment) {
			if($comment->note_id == $note->id) {
				$commentdata = array(
					'created_at' => $comment->created_at,
					'id' => $comment->id,
					'comment' => $comment->comment,
					'commenter' => $comment->collaborator_name,
				);
				array_push($comments, $commentdata);
			}
		}
		return View::make('notes.show')->with(['note' => $note, 'hasVoted' => $note->userHasVoted()])->with('comments', $comments);
	}

// 	/**
// 	 * Show the form for editing the specified resource.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
	public function edit($idOrTitle)
	{
		if (is_numeric($idOrTitle)){
			$note = Note::find($idOrTitle);
		} else {
			$note = Note::where('slug', '=', $idOrTitle)->first();
		}
		if(Auth::user()->id != $note->user_id) {
            Session::flash('errorMessage', 'You are not authorized to edit this note.');
            return Redirect::action('NotesController@index');
        }
		return View::make('notes.edit')->with('note', $note);
	}

// 	/**
// 	 * Update the specified resource in storage.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
	public function update($id)
	{
		$note = Note::find($id);
		return $this->validateAndSave($note);	
	}

	public function destroy($id)
	{
		$note = Note::find($id);

		if(Auth::user()->id != $note->user_id) {
			Session::flash('errorMessage', 'You are not authorized to destroy this note!');
			return Redirect::action('NotesController@index');
		}
		$notescomments = DB::table('notecoms')->where('note_id', $id);
		$notescomments->delete();
		$note->delete();

		return Redirect::action('NotesController@index');
	}

	protected function validateAndSave($note)
	{
		// create the validator
	    $validator = Validator::make(Input::all(), Note::$rules);

	   		 // attempt validation
	    if ($validator->fails()) {
	    		// validation failed, redirect to the note create page with validation errors and old inputs
	    		return Redirect::back()->withInput()->withErrors($validator);
	    } else {
	        // validation succeeded, create and save the note

			$note->title = Input::get('title');
			$note->body = Input::get('body');
			$note->public_or_private = Input::get('public_or_private');
			$note->user_id = Auth::user()->id;

			$result = $note->save();

			if($result){
				Session::flash('successMessage', 'Your note has been successfully saved.');
				return Redirect::action('NotesController@index');
			} else {
				return Redirect::back()->withInput();
				}	
			}	
	}

	public function voteUp($id)
	{
		return $this->castVote($id, 1);
	}

	public function voteDown($id)
	{
		return $this->castVote($id, -1);
	}

	protected function castVote($id, $value)
	{
		$vote = Vote::firstOrNew([
			'user_id' => Auth::id(),
			'voteable_id' => $id,
			'voteable_type' => 'Note'
		]);

		$vote->vote = $value;
		$vote->save();

		return Redirect::back();
	}
}
