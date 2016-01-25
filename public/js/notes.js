$(document).ready(function() 
{
	"use strict";
	$('#voteUp').click(function(){

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: $(this).data('noteId'),
		        vote: 	 $(this).data('vote')
		    }
		}).done(function(data){
			console.log(data);
			//trigger a modal that vote was submitted console.log(data);
		});
	});

	$('#voteDown').click(function(){

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: $(this).data('noteId'),
		        vote: 	 $(this).data('vote')
		    }
		}).done(function(data){
			// console.log(data);
		});
	});
});
