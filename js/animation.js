
// ANIMATIONS MANAGEMENT

/* Scroll revelation
 *
 * Reveals each element to which the class is applied to the scroll
 */
jQuery(document).ready(function ($) {
  let revealClass = ".animated";
  let targetClass = ".revelation:not(" + revealClass + ")";
  let offset = 150; // Space of the bottom page for the appearance of elements (in pixels)

  // Get element height
  let winHeight = $(window).height();

  // Recalculate window height when resizing
  $(window).on("resizeEnd", function () {
    winHeight = $(window).height();
  });

  // When the page loads
  triggerAnimation(revealClass, targetClass, offset, winHeight);

  // When the page scroll
  $(window).on("scroll", function () {
    triggerAnimation(revealClass, targetClass, offset, winHeight);
  }); 
}); 

function triggerAnimation(revealClass, targetClass, offset, winHeight) {
  let trigger = $(window).scrollTop() + winHeight - offset;

  // Loop on the elements
  $(targetClass).each(function () {
    let elementOffset = $(this).offset().top;

    if (elementOffset < trigger) {
      $(this).addClass(revealClass.replace(".", ""));
    }
  });
}

/*
 * ResizeEnd
 *
 */
$(window).resize(function () {
  if (this.resizeTO) clearTimeout(this.resizeTO);

  this.resizeTO = setTimeout(function () {
    $(this).trigger("resizeEnd");
  }, 500);
});
