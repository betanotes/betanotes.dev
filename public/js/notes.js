$(document).ready(function() 
{
	"use strict";
	$('#voteUp').click(function(){

		var note_id = $(this).data('noteId');
		var vote = $(this).data('vote');

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: note_id,
		        vote: 	 vote
		    }
		}).done(function(data){
			var ups = parseInt($("#voteUpCounts").text()) + 1;
			$('#voteUpCounts').text(ups);

		}).fail(function(data){
			console.log(data);
			console.log('Ajax log failed');
		})
	});

	$('#voteDown').click(function(){

		var note_id = $(this).data('noteId');
		var vote = $(this).data('vote');

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: note_id,
		        vote: 	 vote
		    }
		}).done(function(data){
			var downs = parseInt($("#voteDownCounts").text()) + 1;
			$('#voteDownCounts').text(downs);

		}).fail(function(data){
			console.log(data);
			console.log('Ajax log failed');
		})
	});	
});
