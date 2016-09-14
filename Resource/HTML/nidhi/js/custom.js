// $('.main-slider-area').slick({
//   dots: false,
//   infinite: true,
//   speed: 300,
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   adaptiveHeight: true,
//   fade: true,
// });

//Supporting Partners
$('.brand_slide').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
       
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

// res-nav
$('.res_box span').click(function() { 
   $(this).toggleClass("rotate");
   $('.main-navigation .man_ul').slideToggle("100");
});

$('.main-navigation .man_ul li.submenu').click(function() { 
   $(this).toggleClass("add");
   $('.main-navigation ul li ul').slideToggle("100");
});

