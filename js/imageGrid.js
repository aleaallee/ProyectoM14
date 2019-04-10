$(function () {
  let context = $(".imagegrid");
  $(context).on("click", ".image", function (e) {
    if (!$(".image", context).hasClass("activeImg")) {
      $(".image", context).removeClass('activeImg');
      $(this).addClass('activeImg');
      $('html, body').animate({
        scrollTop: $(this).offset().top
      }, 350);
    }else{
      e.target.parentNode.classList.remove("activeImg");
    }
  })
});
