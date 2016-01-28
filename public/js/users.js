$(document).ready(function() { 
    "Use Strict";

    $(".deleter").click(function(event) {
        event.preventDefault();
        var userid = $(this).data("id");
        var username = $(this).data("name");
        if(confirm("Are you sure you want to leave Social Notes forever, " + username + "?")) {

            $('form[data-user-id="' + userid + '"]').submit();
        }
    });
    
});