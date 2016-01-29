$(document).ready(function() { 
    "Use Strict";

    // Slides the info box into view.
    $('#infotitle').click(function() {
        $('.infobox').slideToggle();
    });

    // This opens all responses on the click of this btn.
    $("#toggle-btn").click(function() { 
        $(".responseslide").fadeToggle();
    });

    // Next targets one dd at a time.
    $("dt").click(function() {
        var ddtofade = $(this).attr("data-clue");
        $('[data-response="'+ ddtofade +'"]').fadeToggle();
    });

    // Adds inputs for Clue and Response on create.blade.php and edit.blade.php.
    $("#makeline").click(function() {
        var linesHTML = "<div class='col-xs-6'>";
            linesHTML += "<div class='form-group'>";
            linesHTML += "<label for='clue'>Clue</label>";
            linesHTML += "<input class='form-control' name='cluesArray[]' type='text'>";
            linesHTML += "</div>";
            linesHTML += "</div>";
            linesHTML += "<div class='col-xs-6'>";
            linesHTML += "<div class='form-group'>";
            linesHTML += "<label for='response'>Response</label>";
            linesHTML += "<input class='form-control' name='responsesArray[]' type='text'>";
            linesHTML += "</div>";
            linesHTML += "</div>";
        $(".lines").append(linesHTML);
    });

    // Listerner for each delete button
    $(".deletebtn").on('click', function(event) {
        event.preventDefault();

        if (confirm("Are you sure you want to delete this post?")) {
            $(this).parent().submit();
        }
    });

    // Sorts any table with the class of 'mytable'. 
    // Used on feed pages and dashboard pages where it sorts by the first column.
    function sortTable() {

        var rows = $('.mytable tbody  tr').get();
        rows.sort(function(a, b) {

            var A = $(a).children('td').eq(0).text().toUpperCase();
            var B = $(b).children('td').eq(0).text().toUpperCase();
            console.log(A);

            if (A > B) {
                return -1;
            }

            if (A < B) {
                return 1;
            }

            return 0;

        });

        $.each(rows, function(index, row) {
            $('.mytable').children('tbody').append(row);
        });

    }
    sortTable();

    // Randomly sorts the divs on the matching.blade.php page.
    var parent = $(".matchingblock");
    var divs = parent.children();
    while (divs.length) {
        parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
    }

    // Countdown of game play, disables clicks at end. 
    var i = 20;
    function countDown() {
        var intervalId = setInterval(function() {
            $("#thecountdown").text(i);
            i = i - 1;
            if (i < 0) {
                clearInterval(intervalId);
                $("#thecountdown").text("0");
                $("div").off("click");
                $('div').removeClass("correctmatch");
                $('.cluematch, .responsematch').addClass("nomatch");
            }
        }, 1000);
    }

    // On clicking a clue on matching.blade.php page, this stores the data-clue number as cluepick.
    var cluepick;
    var firsttime = true;
    var responsepick;
    $(".cluematch").click(function() {
        if (firsttime) {
            countDown();
            firsttime = false;
        }
        cluepick = $(this).attr("data-clue");
        $(this).addClass("correctmatch");
    });

    // On clicking a response, this sees if data-response equals the above data-clue.
    $(".responsematch").click(function() {
        responsepick = $(this).attr("data-response");
        $(this).addClass("correctmatch");
        if (cluepick == responsepick) {
            $('[data-clue="'+ cluepick +'"]').fadeOut();
            $('[data-response="'+ responsepick +'"]').fadeOut();
            setTimeout(function(){
                $('div').removeClass("correctmatch");
            },700);
        } else {
            $('div').removeClass("correctmatch");
            cluepick = 'x';
            responsepick = 'y';
        }
    });

    // Slides the how to play box into view.
    $('.countholder').click(function() {
        $('.countholder p').slideToggle();
    });

});