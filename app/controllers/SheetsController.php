<?php

class SheetsController extends \BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $loggedInId = Auth::user()->id;
        $sheets = Sheet::with('lines')->where('user_id', '=', $loggedInId)->orderBy('id', 'desc')->paginate(10);
        return View::make('sheets.index')->with('sheets', $sheets);
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
        $validator = Validator::make(Input::all(), Sheet::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $sheet = new Sheet();
            $sheet->title = Input::get('title');
            $sheet->public_or_private = Input::get('public_or_private');
            $sheet->user_id = Auth::user()->id;
            $result1 = $sheet->save();

            if (Input::has('cluesArray')) {
                $cluesArray = Input::get('cluesArray');
            } else {
                $cluesArray = array();
            }
            if (Input::has('responsesArray')) {
                $responsesArray = Input::get('responsesArray');
            } else {
                $responsesArray = array();
            }
            array_unshift($cluesArray, Input::get('clue'));
            array_unshift($responsesArray, Input::get('response'));
            foreach ($cluesArray as $key => $value) {
                $line = new Line();
                $line->sheet_id = $sheet->id;
                $line->clue = $cluesArray[$key];
                $line->response = $responsesArray[$key];
                $result2 = $line->save();
            }

            if ($result1 && $result2) {
                Session::flash('successMessage', 'This sheet was saved.');
                // Log::info('This is some useful information.', Input::all());
                return Redirect::route('sheets.index');
            } else {
                Session::flash('errorMessage', 'This sheet was not submitted.');
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
        $sheet = Sheet::with('lines')->where('id', $id)->orWhere('slug', $id)->first();

        if (!$sheet) {
            Session::flash('errorMessage', 'This sheet does not exist.');
            return Redirect::route('sheets.index');
        }
        if($sheet->public_or_private == "private") {
            if(Auth::user()->id != $sheet->user_id) {
                Session::flash('errorMessage', 'This sheet is private and cannot be accessed publicly.');
                return Redirect::action('SheetsController@index');
            }
        }
        $comments = [];
        $allcomments = Sheetcom::all();
        foreach($allcomments as $comment) {
            if($comment->sheet_id == $sheet->id) {
                $commentdata = array(
                    'created_at' => $comment->created_at,
                    'id' => $comment->id,
                    'comment' => $comment->comment,
                    'commenter' => $comment->collaborator_name,
                );
                array_push($comments, $commentdata);
            }
        }
        return View::make('sheets.show')->with('sheet', $sheet)->with('comments', $comments);
    }

    public function showMatching($id)
    {
        $sheet = Sheet::with('lines')->where('id', $id)->orWhere('slug', $id)->first();

        if (!$sheet) {
            Session::flash('errorMessage', 'This sheet does not exist.');
            return Redirect::route('sheets.index');
        }
        if($sheet->public_or_private == "private") {
            if(Auth::user()->id != $sheet->user_id) {
                Session::flash('errorMessage', 'This sheet is private and cannot be accessed publicly.');
                return Redirect::action('SheetsController@index');
            }
        }
        $comments = [];
        $allcomments = Sheetcom::all();
        foreach($allcomments as $comment) {
            if($comment->sheet_id == $sheet->id) {
                $commentdata = array(
                    'created_at' => $comment->created_at,
                    'id' => $comment->id,
                    'comment' => $comment->comment,
                    'commenter' => $comment->collaborator_name,
                );
                array_push($comments, $commentdata);
            }
        }
        return View::make('sheets.matching')->with('sheet', $sheet)->with('comments', $comments);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sheet = Sheet::with('lines')->find($id);
        if (!$sheet) {
            Session::flash('errorMessage', 'This sheet does not exist for editing.');
            return Redirect::route('sheets.index');
        }
        if(Auth::user()->id != $sheet->user_id) {
            Session::flash('errorMessage', 'You are not authorized to edit this sheet.');
            return Redirect::action('SheetsController@index');
        }
        $clueLines = Line::with('sheet')->where('sheet_id', '=', $id)->lists('clue');
        $responseLines = Line::with('sheet')->where('sheet_id', '=', $id)->lists('response');

        $data = array('sheet' => $sheet, 'clueLines' => $clueLines, 'responseLines' => $responseLines);
        return View::make('sheets.edit')->with($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), Sheet::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $sheet = Sheet::find($id);
            $sheet->title = Input::get('title');
            $sheet->public_or_private = Input::get('public_or_private');
            $sheet->user_id = Auth::user()->id;
            $result1 = $sheet->save();

            $cluesArray = Input::get('cluesArray');
            $responsesArray = Input::get('responsesArray');
            $linesArray = Line::where('sheet_id', '=', $id)->lists('id');
            foreach ($cluesArray as $key => $value) {
                if (array_key_exists($key, $linesArray)) {
                    $line = Line::find($linesArray[$key]);
                } else {
                    $line = new Line();
                }
                $line->sheet_id = $sheet->id;
                $line->clue = $cluesArray[$key];
                $line->response = $responsesArray[$key];
                $result2 = $line->save();
            }

            if ($result1 && $result2) {
                Session::flash('successMessage', 'This sheet was saved.');
                // Log::info('This is some useful information.', Input::all());
                return Redirect::route('sheets.index');
            } else {
                Session::flash('errorMessage', 'This sheet was not submitted.');
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
        $sheet = Sheet::findOrFail($id);

        $lines = Line::with('sheet')->where('sheet_id', '=', $id);
        if(Auth::user()->id != $sheet->user_id) {
            Session::flash('errorMessage', 'You are not authorized to destroy this sheet!');
            return Redirect::action('SheetsController@index');
        }
        $notescomments = DB::table('sheetcoms')->where('sheet_id', $id);
        $notescomments->delete();
        $lines->delete();

        $sheet->delete();
        
        Session::flash('successMessage', 'This sheet was deleted.');
        return Redirect::route('sheets.index');
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
            'voteable_type' => 'Sheet'
        ]);

        $vote->vote = $value;
        $vote->save();

        return Redirect::back();
    }
}
