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
                var cv_letter_id = $(this).parentsUntil(".card-content",".card-body" ).attr('id');

                var da="cv_letter_id="+cv_letter_id+"&share="+1;

                //alert (da);

                $.ajax({
                    type:"POST",
                    dataType:"text",
                    url:"./test/sharingcv_letter.php",  
                    data: da,
                    success: function (data) {
                        Callback(data);
                    },
                    error: function (data) {
                        alert("error");
                        Callback(data);
                    //Callback("Error getting the data");
                }

                });

			}
            else{

                console.log("off");
                    console.log($(this).parentsUntil(".card-content",".card-body" ));
                var cv_letter_id = $(this).parentsUntil(".card-content",".card-body" ).attr('id');

                var da="cv_letter_id="+cv_letter_id+"&share="+0;

                //alert(da);

                $.ajax({
                    type:"POST",
                    dataType:"text",
                    url:"./test/sharingcv_letter.php",  
                    data: da,
                    success: function (data) {
                        Callback(data);
                    },
                    error: function (data) {
                        alert("error");
                        Callback(data);
                    //Callback("Error getting the data");
                }

                });


            }


            function Callback(data)
            {
                console.log(data);
                alert(data);
            }

   });

	


});