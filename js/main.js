// ============================================================ Gallery Slider

$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".slider-nav",
});
$(".slider-nav").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: false,
  centerMode: true,
  focusOnSelect: true,
  centerPadding: "60px",
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

// ============================================================ Floor Plans Slider

$(".slider").slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000,
  arrows: true,
  // prevArrow: '<span class="priv_arrow"><i class="fas fa-angle-left"></i></span>',
  // nextArrow: '<span class="next_arrow"><i class="fas fa-angle-right"></i></span>',
  // fade: true,
  // cssEase: 'linear',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});
$(".nav-pills").click(function () {
  $(".slider").slick("refresh");
});

// Fancy Box
$("[data-fancybox]").fancybox({
  infobar: true,
  toolbar: true,
  buttons: ["fullScreen", "thumbs", "close"],
});


// $(function () {
//   let $abctowers2 = new SimpleLightbox(".villa-one a", {
//     showCounter: true,
//   });
// });

// $(function () {
//   let $abctowers2 = new SimpleLightbox(".villa-two a", {
//     showCounter: true,
//   });
// });

// Fancybox.bind("[data-fancybox]", {
//   // Your custom options
// });