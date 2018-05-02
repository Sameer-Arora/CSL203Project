

$(document).ready(function () {

  function reinit(){
    return {
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

    };
  } 
  
  $('.scroll').slick(reinit());

$('.dropify').dropify();
  

$('.card-img-top').hover(
        // Handles the mouseover
        function() {

          var opt= $(this).parentsUntil(".card-content").children('.options').find(".option");
          ////alert(opt);
          opt.toggle(10);

        }
  );

  $("[data-hide]").on("click", function(){
        console.log($("." + $(this).attr("data-hide")));
      $('.alert').removeClass('.show');

  });

$('.added').hide();

$("form#upload").on("change",".select",function(e) {
  var f=$(this).val();
  console.log(f);
  if(f=="Latex"){
      var par=$(this).parent().parent();
      var label=par.find("label[for='fileToUpload']");
      label.html("Select to upload pdf file:"); 
      $('#fileToUpload').attr('title','Updated');
      par.find('.added').show();
      $('.dropify').dropify();

                      
  }else{
       var par=$(this).parent().parent();
      var label=par.find("label[for='fileToUpload']");
      label.html("Select to upload docx file:"); 
      console.log(par.find('.added'));
      par.find('.added').hide();
      $('.dropify').dropify();
  }

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
    url: "upload_cv_letter.php",
    type: 'POST',
    data: formData,
    success: function (data) {
      upl_callback(data)
    },
    error: function (data) {
                    ////alert("error");
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
  //alert(data);
  var values=deparam(data);
  console.log(values);
  var  doc_added=values['doc_added'];
  //alert(doc_added);

  if(doc_added){

    var image=values["imagePath"];
    var  cv_letter_id=values['cv_letter_id'];
    var  last_update=values['last_update'];
    var  name=values['name'];
    var  message=values['message'];
    var  title=values['title'];
    var  type=values['type'];
    var this_=$(" #your");
    console.log($(" #your"));

    if(message=="Updated, file already exists." ){
        console.log('remove');
        $("#"+cv_letter_id).remove();
        console.log($("#"+cv_letter_id));
    }

    $("#your").append("<div class=\"col-3\"> <div class=\"card card-block \">\
     <div class=\"card-content\"> <div class=\"card-body\" id=\""+ cv_letter_id+"\" > </div></div></div></div>");
  
  if(type=='Docx'){
      $('#'+cv_id).append('<div class=\"container\">\
        <div class=\"item\">\
        <img class=\"card-img-top img-fluid\" src=\"'+ image+ '\" alt=\"Card image cap\">\
        </div>\
        </div>\
        <div class=\"options\">\
        <ul class=\"option\">\
        <li><i class=\"fa fa-trash fa-2x \"></i></li>\
        <li><form action="CV_maker.php" method="post"><i class="fa fa-edit fa-2x "></i></form></li>\
        <li> Share\
        <label class=\"switch\">\
        <input type=\"checkbox\">\
        <span class=\"slider round\">\</span>\
        </label>\
        </li> \
        </ul>\
        </div>\
        <h4 class=\"card-title\">'+ title+'</h4>\
        <p class=\"card-text\">last uploaded: <span class=\"meta_info\">'+last_update+'</span></p>\
        ');
    }
    else{
      $('#'+cv_id).append('<div class=\"container\">\
        <div class=\"item\">\
        <img class=\"card-img-top img-fluid\" src=\"'+ image+ '\" alt=\"Card image cap\">\
        </div>\
        </div>\
        <div class=\"options\">\
        <ul class=\"option\">\
        <li><i class=\"fa fa-trash fa-2x \"></i></li>\
        <li> Share\
        <label class=\"switch\">\
        <input type=\"checkbox\">\
        <span class=\"slider round\">\</span>\
        </label>\
        </li> \
        </ul>\
        </div>\
        <h4 class=\"card-title\">'+ title+'</h4>\
        <p class=\"card-text\">last uploaded: <span class=\"meta_info\">'+last_update+'</span></p>\
        ');
    }
    $('#your').slick('unslick').slick(reinit());
  }

}

//function to edit document.

$('.row').on('click',".fa-edit", function() {

    var dele = this;
    var form=$(this).parent();

    var widget = $(this).parentsUntil(".card").find(".card-body");
    console.log(form);
    var cv_letter_id = widget.attr('id');
    console.log(cv_letter_id);
    var da="cv_letter_id="+cv_letter_id;

    $('<input>').attr({
    type: 'hidden',
    name: 'cv_letter_id',
    value: cv_letter_id
    }).appendTo(form);
    var formData = new FormData(form);
    //alert(form.serialize() );
    form.submit();

}); 


   //function to delete the entry.

$('.row').on('click',".fa-trash", function() {

    var dele = this;

    var widget = $(this).parentsUntil(".card").find(".card-body");
    console.log(widget);
    var cv_letter_id = widget.attr('id');
    console.log(cv_letter_id);
    var da="cv_letter_id="+cv_letter_id;

    $.ajax({
      type:"POST",
      dataType:"text",
      url:"delete_cv_letter.php",  
      data: da,
      success: function (data) {
        del_callback(data);
      },
      error: function (data) {
                    ////alert("error");
                    del_callback(data);
                    //del_callback("Error getting the data");
                  }

      });
  }); 

   function del_callback(data)
   {
    console.log(data);
    //alert(data);
    var values=deparam(data);
    console.log(values);
    var  cv_letter_id=values['cv_letter_id'] ;
    //alert(cv_letter_id);
    $("#"+cv_letter_id).remove();
    $('#your').slick('unslick').slick(reinit());
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