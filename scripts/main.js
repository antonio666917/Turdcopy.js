$(document).ready(function(){
	$('.editable').click(function(){
		var $el = $(this);
		$('#tcjs-sidebar textarea').val($el.text());
		$('#tcjs-sidebar input').val($el.data('blurb-id'));
		console.log($el.text());
	});
})