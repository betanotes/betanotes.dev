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

    $(".deletermeets").click(function(event) {
        event.preventDefault();
        var meetupid = $(this).data("id");
        var meetuptitle = $(this).data("title");
        if(confirm("Are you sure you want to delete this Social Study: " + meetuptitle + "?")) {
            
            $('form[data-meetup-id="' + meetupid + '"]').submit();
        }
    });

    $(".deletercomments").click(function(event) {
        event.preventDefault();

        var commentid = $(this).data("id");
        var commenter = $(this).data("author");
        console.log(commentid);
        if(confirm("Are you sure you want to delete this comment?")) {
            $('form[data-comment-id="' + commentid + '"}').submit();
        }
    });
    
});