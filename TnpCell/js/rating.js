 
$(document).ready(function(){

     $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().attr("src","./images/star_h.png")
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().attr("src","./images/star.png")
            }
        );
    
    // widget_id = cv_id in my case.
    $('.rate_widget').each(function(i) {
            var widget = this;

            var out_data = {
                widget_id : $(widget).attr('id'),
                fetch: 1
            };

            $.post( './test/rating.php',
                out_data,
                function(INFO) {
                    alert("sucess");
                    $(widget).data( 'fsr', INFO );
                    alert("sucess");
                    set_votes(widget);
                },
                'json'
            );

    });

    $('.ratings_stars').bind('click', function() {
            var star = this;
            var widget = $(this).parent();
            
            alert("fs");
            
            var clicked_data = {
                clicked_on : $(star).attr('class'),
                widget_id : widget.attr('id')
            };
            alert("fs");

            $.post(
                './test/rating.php',
                clicked_data,
                function(INFO) {
                    alert("sucess");
                    widget.data( 'fsr', INFO );
                    alert("sucess");
                    set_votes(widget);
                },
                'json',
            ); 
            alert("fs");

        });


    function set_votes(widget) {

    var avg = $(widget).data('fsr').whole_avg;
    var votes = $(widget).data('fsr').number_votes;
    var exact = $(widget).data('fsr').dec_avg;
    
    $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
    $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
    $(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
    
    }

});
