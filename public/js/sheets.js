$(document).ready(function() { 
    "Use Strict";

    // Slides the info box into view.
    $('#infotitle').click(function() {
        $('.infobox').slideToggle();
    });

    // $(".clueclick").click(function() {
    //     $(".responseslide").fadeToggle();
    // });
    // This opens all responses on the click of this btn.
    $("#toggle-btn").click(function() { 
        $(".responseslide").fadeToggle();
    });
    // Next targets one dd at a time.
    $("dt").click(function() {
        var ddtofade = $(this).attr("data-clue");
        $('[data-response="'+ ddtofade +'"]').fadeToggle();
    });

    var i = 2;
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
        $(".lines").append(linesHTML)
        i = i + 1;
        console.log(i);
    });

    // Listerner for each delete button
    $(".deletebtn").on('click', function(event) {
        event.preventDefault();

        if (confirm("Are you sure you want to delete this post?")) {
            $(this).parent().submit();
        }
    });

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

});