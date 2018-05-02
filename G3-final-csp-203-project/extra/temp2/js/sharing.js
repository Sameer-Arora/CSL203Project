$(document).ready(function () {
	
    console.log("hello");
    console.log( $('.row').find('input[type="checkbox"]') ) ;

	$('.row').on('change','input[type="checkbox"]', function() {
            
            console.log($(this));

          /*  var val=$(this).val();
            console.log($(this).val());
*/
            if ($(this).is(":checked"))
			{
			  // it is checked
                console.log("on");
                console.log($(this).parentsUntil(".card-content",".card-body" ));
                var cv_id = $(this).parentsUntil(".card-content",".card-body" ).attr('id');

                var da="cv_id="+cv_id+"&share="+1;

                //alert (da);

                $.ajax({
                    type:"POST",
                    dataType:"text",
                    url:"./test/sharing.php",  
                    data: da,
                    success: function (data) {
                        Callback(data);
                    },
                    error: function (data) {
                        //alert("error");
                        Callback(data);
                    //Callback("Error getting the data");
                }

                });

			}
            else{

                console.log("off");
                    console.log($(this).parentsUntil(".card-content",".card-body" ));
                var cv_id = $(this).parentsUntil(".card-content",".card-body" ).attr('id');

                var da="cv_id="+cv_id+"&share="+0;

                //alert(da);

                $.ajax({
                    type:"POST",
                    dataType:"text",
                    url:"./test/sharing.php",  
                    data: da,
                    success: function (data) {
                        Callback(data);
                    },
                    error: function (data) {
                        //alert("error");
                        Callback(data);
                    //Callback("Error getting the data");
                }

                });


            }


            function Callback(data)
            {
                console.log(data);
                //alert(data);
               /* var values=deparam(data);
                console.log(values);
                var  cv_id=values['cv_id'] ;
                //alert(cv_id);
                $("#"+cv_id).remove();
                $('.scroll').slick('unslick').slick('reinit');
*/
            }

            
            /*
            var clicked_on=$(this).attr('class').split(' ').pop();
            var cv_id = widget.attr('id');

            var da="cv_id="+cv_id+"&clicked_on="+clicked_on;
            alert (da);

            $.ajax({
                type:"POST",
                dataType:"text",
                url:"./test/rating.php",  
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

                });*/ 
   });

	


});