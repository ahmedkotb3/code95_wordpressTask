window.addEventListener("load", function () {
  if (typeof Swiper !== "undefined") {
    new Swiper(".egypt-swiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      loop: false,
      breakpoints: {
        0: { slidesPerView: 1 },
        576: { slidesPerView: 2 },
        992: { slidesPerView: 4 },
      },
    });
  } else {
    console.error("Swiper is not loaded!");
  }
});
