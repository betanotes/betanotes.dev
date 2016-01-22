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