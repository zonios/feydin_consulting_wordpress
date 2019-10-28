
// Navbar transition
$(window).on('scroll', function () {
  let nav = $('.mainNav');
  let navHeight = parseFloat(nav.css("height"));
  let windowTop = $(window).scrollTop();
  if (4 * navHeight < windowTop) {
    nav.addClass('dynamicNav');
    nav.addClass('fixedNav');
  } else if (navHeight + 10 < windowTop) {
    nav.addClass('dynamicNav');
    nav.removeClass('fixedNav');
  } else {
    nav.removeClass('dynamicNav');
    nav.removeClass('fixedNav');
  }

  let goToTop = $('#goToTop');
  let goToTopHeight = $(window).height() / 2;

  if (goToTopHeight < windowTop) {
    goToTop.addClass("shown");
  } else {
    goToTop.removeClass("shown");
  }

  $(".mainNav>div>div").removeClass("shown");

});

$(document).ready(function () {
  $(".main").css("padding-top", $(".mainNav").css("height"));

  $("#goToTop").on("click", function () {
    $('html, body').stop().animate(
      {
        scrollTop: 0
      }, 400);
  });

  $(".mainNav .menuButt").on("click", function () {
    $(".mainNav>div>div").toggleClass("shown");
  });

});
setTimeout(function() {
  $(".main").css("padding-top", $(".mainNav").css("height"));
}, 20);

