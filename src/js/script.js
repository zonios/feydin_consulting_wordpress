// Navbar transition
$(window).on('scroll', function () {
  let nav = $('.mainNav');
  let windowTop = $(window).scrollTop();
  if ($("header").height() < windowTop) {
    nav.addClass('dynamicNav');
    nav.addClass('fixedNav');
  } else if (nav.height() + 20 < windowTop) {
    nav.addClass('dynamicNav');
    nav.removeClass('fixedNav');
  } else {
    nav.removeClass('dynamicNav');
    nav.removeClass('fixedNav');
  }
});