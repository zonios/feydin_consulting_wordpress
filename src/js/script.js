$(".main").css("padding-top", $(".mainNav").css("height"));

// Navbar transition
$(window).on('scroll', function () {
  let nav = $('.mainNav');
  let navHeight = parseFloat(nav.css("height"));
  let windowTop = $(window).scrollTop();
  if (4 * navHeight < windowTop) {
    nav.addClass('dynamicNav');
    nav.addClass('fixedNav');
  } else if ( navHeight + 10 < windowTop) {
    nav.addClass('dynamicNav');
    nav.removeClass('fixedNav');
    console.log(nav.css("height"));
  } else {
    nav.removeClass('dynamicNav');
    nav.removeClass('fixedNav');
  }
});