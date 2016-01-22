$(document).ready(function() 
{
	"use strict";
	$('#voteUp').click(function(){

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: $(this).data('note_id'),
		        vote: 	 $(this).data('vote')
		    }
		}).done(function(data){
			// console.log(data);
		});
	});
});

public function voteUpOrDown()
	{
		$vote = new Vote();
        $vote->user_id = Auth::user()->id;
		$vote->note_id = Input::get('note_id');
		$vote->vote = (bool)Input::get('vote');
		$vote->save();

		// dd(Input::get('vote'));
    }