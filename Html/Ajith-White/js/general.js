$(window).scroll(function() {
    var height = $(window).scrollTop();
    if(height  < 300) {
      $('#page-title').addClass('hidden');
    }
    if(height  > 400) {
      $('#page-title').removeClass('hidden');
    }
});

$(document).ready(function(){
  $(".fancybox").fancybox({
      openEffect: "none",
      closeEffect: "none",
  });
});
 