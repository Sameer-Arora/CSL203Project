
$(document).ready(function () {
 /* $('.selector').slick({
 // add the rest of your options here
});*/

  //$('.card-img-top').attr('clip', 'rect(10px,100px,100px,10px)');
 /*$('#zoomimg').hover(function() {
    $(this).css("cursor", "pointer");
    $(this).animate({
        width: "20%",
        height: "20%"
    }, 'slow');

}, function() {
    $(this).animate({
        width: "10%"
    }, 'slow');

});​*/


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

});
