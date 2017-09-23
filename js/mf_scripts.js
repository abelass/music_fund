// collapsible actions
$(function() {
	$('.actions').show();
	$('.actions .trigger').click(function(){
		$('.collapsible').toggle();
		$('.actions').toggleClass('closed')
	});
});
