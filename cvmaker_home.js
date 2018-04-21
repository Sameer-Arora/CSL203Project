
$(document).ready(function () {
 /* $('.selector').slick({
 // add the rest of your options here
});*/

  //$('.card-img-top').attr('clip', 'rect(10px,100px,100px,10px)');
/*
  $('').hover(

            function() {
              console.log("in");
              $(this).find(".option").attr("display","inline-block");
            },
      
         // Handles the mouseout
            function() {
              console.log("out");
              $(this).find(".option").attr("display","none");
            }
 );*/

  $('.scroll').slick({
    dots: true,
    centerMode: true,
    centerPadding: '60px',
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,

        centerMode: true,
        centerPadding: '60px',
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,

        centerMode: true,
        centerPadding: '60px',
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '60px',
      }
    }
    ]

  });

  $('.card-img-top').hover(
        // Handles the mouseover
        function() {

          /*window.debug_elem = $(this).parentsUntil(".card-content");
          console.log(window.debug_elem);
          window.debug_elem = $(this).parentsUntil(".card-content").children('.options');
          console.log(window.debug_elem);
          window.debug_elem = $(this).parentsUntil(".card-content").children('.options').find(".option");
          console.log(window.debug_elem);
          */
          var opt= $(this).parentsUntil(".card-content").children('.options').find(".option");
          //alert(opt);
          //console.log(opt);
          opt.toggle(10);

          },
        // Handles the mouseout
        function() {

          var opt= $(this).parentsUntil(".card-body").children('.options').find(".option");
          //opt.hide(100);

        }

  );

   $('.fa-edit').bind('click', function() {
            var star = this;
            var widget = $(this).parent();
            
            
            var clicked_on=$(this).attr('class').split(' ').pop();
            var cv_id = widget.attr('id');

            var da="cv_id="+cv_id+"&clicked_on="+clicked_on;
            //alert (da);

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

                });
    }); 

   //function to delete the entry.

   $('.fa-trash').bind('click', function() {

            var dele = this;

            var widget = $(this).parentsUntil(".card").find(".card-body");
            console.log(widget);
            var cv_id = widget.attr('id');
            console.log(cv_id);
            var da="cv_id="+cv_id;

            $.ajax({
                type:"POST",
                dataType:"text",
                url:"delete_cv.php",  
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
    }); 
 
 function Callback(data)
    {
        console.log(data);
        alert(data);
    }

  $('.dropify').dropify();
  
});
