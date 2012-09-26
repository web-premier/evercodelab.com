(function($){
	function slider(){
		$('.items').jcarousel({
			vertical: true,
			scroll:1
		});
	}
	
	function init(){
		slider();
	}
	
	$(function(){
		init();
	});
	
})(jQuery,undefined)