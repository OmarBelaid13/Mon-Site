// Sticky Header
// Code Jquery trouvé sur internet et adapté
$(window).scroll(function () {
  if ($(window).scrollTop() > 0) {
    $(".main_h").addClass("sticky");
  } else {
    $(".main_h").removeClass("sticky");
  }
});

// Mobile Navigation
$(".mobile-toggle").click(function () {
  if ($(".main_h").hasClass("open-nav")) {
    $(".main_h").removeClass("open-nav");
  } else {
    $(".main_h").addClass("open-nav");
  }
});

$(".main_h li a").click(function () {
  if ($(".main_h").hasClass("open-nav")) {
    $(".navigation").removeClass("open-nav");
    $(".main_h").removeClass("open-nav");
  }
});

// Navigation scroll -- Allows to arrive on an anchor (categories in the menus) in an animated way.
$("nav a").click(function (event) {
  let id = $(this).attr("href");
  let offset = 70;
  let target = $(id).offset().top - offset;
  $("html, body").animate(
    {
      scrollTop: target,
    },
    500
  );
  event.preventDefault();
});
