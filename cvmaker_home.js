

$(document).ready(function () {

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
          infinite: false,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: false,

          centerMode: true,
          centerPadding: '60px',
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          infinite: false,
          slidesToScroll: 1,
          centerMode: true,
          centerPadding: '60px',
        }
      }
      ]

    });

    $('.dropify').dropify();
  

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
          console.log(opt);
          opt.toggle(10);

        },
        // Handles the mouseout
        function() {

          var opt= $(this).parentsUntil(".card-body").children('.options').find(".option");
          //opt.hide(100);

        }

  );


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
          console.log(opt);
          opt.toggle(10);

        },
        // Handles the mouseout
        function() {

          var opt= $(this).parentsUntil(".card-body").children('.options').find(".option");
          //opt.hide(100);

        }

  );

  $("[data-hide]").on("click", function(){
        console.log($("." + $(this).attr("data-hide")));
        $("." + $(this).attr("data-hide")).hide();
        /*
         * The snippet above will hide all elements with the class specified in data-hide,
         * i.e: data-hide="alert" will hide all elements with the alert property.
         *
         * Xeon06 provided an alternative solution:
         * $(this).closest("." + $(this).attr("data-hide")).hide();
         * Use this if are using multiple alerts with the same class since it will only find the closest element
         * 
         * (From jquery doc: For each element in the set, get the first element that matches the selector by
         * testing the element itself and traversing up through its ancestors in the DOM tree.)
        */

    });

$("form#upload").submit(function(e) {

  e.preventDefault();    
  var formData = new FormData(this);
  console.log(formData);
  var f=$(this).find('input[name="fileToUpload"]');
  console.log(f);
  
  var fileName = f.val().split('\\')[2];
  var FilePattern = new RegExp('^[a-zA-Z0-9\\_:.]+$');
  console.log('The file "' + fileName +  '" has been selected.');

  // Password validation.
  if (!FilePattern.test(fileName) ) {
    console.log(fileName);
    console.log("name error");

    $("#status").html('Failed');
    $('.alert').addClass('show fade');
    $("#message").html('name error enter file name with no spaces.');
    $('.alert').removeClass('alert-sucess');
    $('.alert').addClass('alert-danger');


    return false;
  }



  $.ajax({
    url: "upload.php",
    type: 'POST',
    data: formData,
    success: function (data) {
      upl_callback(data)
    },
    error: function (data) {
                    //alert("error");
                    Callback(data);
                    //Callback("Error getting the data");
                  },    
    cache: false,
    contentType: false,
    processData: false

  });

});

function upl_callback(data)
{
  console.log(data);
  alert(data);
  var values=deparam(data);
  console.log(values);
  var  doc_added=values['doc_added'];
  alert(doc_added);

  if(doc_added){

    var image=values["imagePath"];
    var  cv_id=values['cv_id'];
    var  last_update=values['last_update'];
    var  name=values['name'];
    var  message=values['message'];
    var  title=values['title'];
    var this_=$(" #your");
    console.log($(" #your"));

    if(message=="Updated, file already exists." ){
        console.log('remove');
        $("#"+cv_id).remove();
        console.log($("#"+cv_id));
    }

    $("#your").append("<div class=\"col-3\"> <div class=\"card card-block \">\
     <div class=\"card-content\"> <div class=\"card-body\" id=\""+ cv_id+"\" > </div></div></div></div>");

    $('#'+cv_id).append('<div class=\"container\">\
      <div class=\"item\">\
      <img class=\"card-img-top img-fluid\" src=\"'+ image+ '\" alt=\"Card image cap\">\
      </div>\
      </div>\
      <div class=\"options\">\
      <ul class=\"option\">\
      <li><i class=\"far fa-edit fa-2x \"></i></li>\
      <li><i class=\"fa fa-trash fa-2x \"></i></li>\
      <li><i class=\"far fa-edit fa-2x\"></i></li>\
      <li> Share\
      <label class=\"switch\">\
      <input type=\"checkbox\">\
      <span class=\"slider round\">\</span>\
      </label>\
      <li> \
      </ul>\
      </div>\
      <h4 class=\"card-title\">'+ title+'</h4>\
      <div  class=\"rate_widget\" >\
      <img class=\" ratings_stars img-responsive star_1\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_2\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_3\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_4\" src=\"./images/star.png\" ></img>\
      <img class=\"img-responsive  ratings_stars star_5\" src=\"./images/star.png\" ></img>\
      <div class=\"total_votes\"></div>\
      </div>\
      <p class=\"card-text\">last updated<span class=\"meta_info\">'+last_update+'</span></p>\
      ');

    $('.scroll').slick('unslick').slick('reinit');
  
  }

}


$('.row').on('click',".fa-edit", function() {

  var edit = this;
 var widget = $(this).parentsUntil(".card").find(".card-body");
    console.log(widget);
    var cv_id = widget.attr('id');
    console.log(cv_id);
    var da="cv_id="+cv_id;

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

$('.row').on('click',".fa-trash", function() {

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
        del_callback(data);
      },
      error: function (data) {
                    //alert("error");
                    del_callback(data);
                    //del_callback("Error getting the data");
                  }

                });
  }); 

   function del_callback(data)
   {
    console.log(data);
    alert(data);
    var values=deparam(data);
    console.log(values);
    var  cv_id=values['cv_id'] ;
    alert(cv_id);
    $("#"+cv_id).remove();
    $('.scroll').slick('unslick').slick('reinit');

  }

  function deparam(query) {
    var pairs, i, keyValuePair, key, value, map = {};
          // remove leading question mark if its there
          if (query.slice(0, 1) === '?') {
            query = query.slice(1);
          }
          if (query.slice(0, 1) === '\n') {
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

});