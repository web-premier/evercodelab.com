    // Initalize slider
    var sliderInit = function() {
    var sliderContainer = $("#slides"),
        sliderWrapper = $("#slides-wrapper");

    sliderWrapper.css('backgroundImage', 'url("'+sliderContainer.find('.item:first').data('bg-image')+'")');
    sliderWrapper.attr('data-bg-image', sliderContainer.find('.item:first').data('bg-image'));

    $("#slides").slides({
        generateNextPrev: true,
        pagination: true,
        effect: 'fade',
        play: 10000,
        animationComplete: function(current) {
            var bgImage = sliderContainer.find('.item:nth-child(' + current + ')').data('bg-image');
            if (sliderWrapper.data('bg-image') != bgImage) {
                sliderWrapper.css('backgroundImage', 'url("' + bgImage + '")');
            }
        }
    });
};

$(document).ready(function(){
    sliderInit();
    $(".scrollbar").scroller();

    /* tabs */
    // $('.tabs li').click(function(){
    //     $('.tabs li').removeClass('active');
    //     $(this).addClass('active');
    //     $('.all-tabs div').fadeOut(1);
    //     $('.' + $(this).attr('data-content') ).fadeIn(1);
    // })

    /* плашка с контактами */
    $('#contact_right .contact-trigger').on('click', function() {
        $(this).parent().toggleClass('contact_right_show')
    });

    $('.review').attr('data-start-height',$('.review', this).height()+parseInt($('.review', this).css('padding-top'), 10)*2);

    $('.review-open').on('click',function(){
        if( $(this).parent().attr('data-height') == 'close' ){
            var pos = $(this).parent().find('.review-text');
            var newheight = pos.height() + parseInt($(this).parent().css('padding-top'), 10)*2 ;
            $(this).parent().css('height', newheight).attr('data-height', 'open');
            return false;
        }
        if( $(this).parent().attr('data-height') == 'open' ){
            $(this).parent().css('height', $(this).parent().attr('data-start-height') ).attr('data-height', 'close');
            return false;
        }
    })
});