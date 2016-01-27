$(document).ready(function() 
{
	"use strict";

	// Find the token value from the page using jQuery
	var token = $("meta[name=csrf-token]").attr("content");

	$.ajaxSetup({ headers: { 'X-CSRF-Token' :  token } });

	$('#voteUp').click(function(){

		var note_id = $(this).data('noteId');
		var sheet_id = $(this).data('sheetId');
		var meetup_id = $(this).data('meetupId');
		var vote = $(this).data('vote');

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: note_id,
		        sheet_id: sheet_id,
		        meetup_id: meetup_id,
		        vote: 	 vote
		    }
		}).done(function(data){
			var ups = parseInt($("#voteUpCounts").text()) + 1;
			$('#voteUpCounts').text(ups);

		}).fail(function(data){
			console.log(data);
			console.log('Ajax log failed');
		})
		$(this).prop('disabled', true);
	});

	$('#voteDown').click(function(){

		var note_id = $(this).data('noteId');
		var sheet_id = $(this).data('sheetId');
		var meetup_id = $(this).data('meetupId');
		var vote = $(this).data('vote');

		$.ajax("/voteUpOrDown", {
		    type: "POST",
		    
		    data: {
		        note_id: note_id,
		        sheet_id: sheet_id,
		        meetup_id: meetup_id,
		        vote: 	 vote
		    }
		}).done(function(data){
			var downs = parseInt($("#voteDownCounts").text()) + 1;
			$('#voteDownCounts').text(downs);

		}).fail(function(data){
			console.log(data);
			console.log('Ajax log failed');
		})
		$(this).prop('disabled', true);
	});	
});
