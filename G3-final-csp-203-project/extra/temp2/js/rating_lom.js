 
$(document).ready(function(){
   
     $('.row').on('mouseenter', '.ratings_stars', function() {
                $(this).prevAll().andSelf().attr("src","./images/star_h.png");
            })
           .on('mouseleave', '.ratings_stars', function( ) {
                $(this).prevAll().andSelf().attr("src","./images/star.png");
            });


    // lom_id = lom_id in my case. find alternative
    
    $('.rate_widget').each(function(i) {

            var widget = $(this).parent();
            var lom_id = widget.attr('id');

            var da="lom_id="+lom_id+"&fetch=2";
            //alert (da);

            $.ajax({
                type:"POST",
                dataType:"text",
                url:"./test/rating_lom.php",  
                data: da,
                success: function (data) {
                    Callback(data);   
                    set_votes(widget,data);
               

                },
                error: function (data) {
                    //alert("error");
                    Callback(data);
                    //Callback("Error getting the data");
                }

                });

    });

    $('.row').on('click','.ratings_stars', function() {
            var star = this;
            var widget = $(this).parent().parent();
            
            
            var clicked_on=$(this).attr('class').split(' ').pop();
            var lom_id = widget.attr('id');

            var da="lom_id="+lom_id+"&clicked_on="+clicked_on;
            //alert (da);

            $.ajax({
                type:"POST",
                dataType:"text",
                url:"./test/rating_lom.php",  
                data: da,
                success: function (data) {
                    Callback(data);
                    set_votes(widget,data);
                },
                error: function (data) {
                    //alert("error");
                    Callback(data);
                    //Callback("Error getting the data");
                }

                });
    }); 

    function deparam(query) {
        var pairs, i, keyValuePair, key, value, map = {};
        // remove leading question mark if its there
        if (query.slice(0, 1) === '?') {
            query = query.slice(1);
        }
        if (query !== '') {
            pairs = query.split('&');
            for (i = 0; i < pairs.length; i += 1) {
                keyValuePair = pairs[i].split('=');
                key = decodeURIComponent(keyValuePair[0]);
                value = (keyValuePair.length > 1) ? decodeURIComponent(keyValuePair[1]) : undefined;
                map[key] = value;
            }
        }
        return map;
    }


    function Callback(data)
    {
        console.log(data);
        //alert(data);
    }

    function set_votes(widget,data) {

    var values=deparam(data);
    var avg =values['avg_rating'] ;
    var votes = values['no_votes'];
    
    //alert(avg); 
    console.log(avg);   
    //alert(votes);
    console.log(votes);   

    $(widget).find('.star_' + avg).prevAll().andSelf().attr("src","./images/star_f.png");
    $(widget).find('.star_' + avg).nextAll().attr("src","./images/star.png"); 
    $(widget).find('.total_votes').text( votes + ' votes recorded (' + avg + ' rating)' );
    
    }

});
