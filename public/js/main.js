
$(window).scroll(function(){
  if($(window).scrollTop() > 750){
      $("#navMenu").slideDown("fast");
	  $('#navMenu').removeClass('hide').addClass('show');
	  
  }
});
$(window).scroll(function(){
  if($(window).scrollTop() < 750){
      $("#navMenu").slideUp("fast");
	  $('#navMenu').removeClass('show').addClass('hide');

  }
});