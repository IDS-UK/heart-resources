// Toggle comments
jQuery(document).ready(function(){
   jQuery('#comments-reveal').click(function(){
      jQuery('#comments-block').toggle();
      jQuery('#comments-reveal i').toggleClass('fa-plus fa-minus');
   });
});

// For Search Icon Toggle effect on top nav - closes field if icon clicked and no search value given.
jQuery(function($){

	$('.search-link').click(function(e){
		e.preventDefault();
		$(this).parent().toggleClass('active').find('input[type="search"]').focus();
	});
	$('.search-button').click(function(e){
		if( $(this).parent().find('.search-field').val() == '' ) {
			e.preventDefault();
			$(this).parent().parent().parent().removeClass('active');
		}

	});
});