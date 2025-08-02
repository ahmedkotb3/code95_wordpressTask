jQuery(document).ready(function ($) {
  $(".egypt-owl-carousel").owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: true,
    navText: [
      '<span class="owl-prev">&lt;</span>',
      '<span class="owl-next">&gt;</span>',
    ],
    responsive: {
      0: { items: 1 },
      576: { items: 2 },
      992: { items: 4 },
    },
  });
});
