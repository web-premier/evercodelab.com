(function($){
		  
	function scrollLine() {
		var $scrollLine = $('#topLineMove'),
			$w = $(window),
			docHeight = $(document).height() - $w.height(),
			$topMenu = $('header menu li a'),
			topMenuHeight = $('.b-head').height(),
			scrollBack = false;
			
		$topMenu.click(function() {
			scrollBack = true;
		});
		
		if (location.hash == "#aboutus") {
			$w.scrollTop($w.scrollTop() - topMenuHeight);
		}
		$scrollLine.width(($w.scrollTop() / docHeight * 100) + '%');
		$w.scroll(function(e) {
			$scrollLine.width(($w.scrollTop() / docHeight * 100) + '%');
			
			if (scrollBack) {
				$w.scrollTop($w.scrollTop() - topMenuHeight);
			}
			
			scrollBack = false;
		});
	}
	
	function switcher() {
		var $switcherBlock = $('.b-switcher-block');
		
		$switcherBlock.each(function(i, elem){
			var $elem = $(elem);
			
			$elem.find('.b-switch.' + $elem.find('.b-switcher li.active').attr('rel')).show();
			$elem.find('.b-switcher li').click(function() {
				var $this = $(this);
				
				$elem.find('.b-switcher li.active').removeClass('active');
				$this.addClass('active');
				$elem.find('.b-switch').hide();
				$elem.find('.b-switch.' + $this.attr('rel')).show();
			});
		});
	}
		  
	function init(){
//		switcher();
		scrollLine();
	}
	
	$(function(){
		init();
	});
	
})(jQuery,undefined)