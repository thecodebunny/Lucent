jQuery(document).ready(function($){
	
	$('.icons-display .display-icon').click(function(){
		
		var field = $(this).closest('.icon-field');
		var input = field.find('.icon-input');
		
		var icon = $(this).attr('data-rel');
		
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		input.val( icon );			
			
	});
	
});