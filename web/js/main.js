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

var portfolioItems = {
    init: function() {
        this.container = $('.portfolio-items');
        this.items = [];

        if(this.container.length > 0) {
            this.build_items_list();
            this.define_rows_last();
            this.bind_togglers();
        }

        this.showing = -1;
    },
    build_items_list: function() {
        var that = this;
        this.container.find(".work").each(function() {
            var el = $(this);
            var hidden = el.find(".work-hidden");

            that.items.push({
                "el": el,
                "toggler": el.find(".work-name"),
                "hidden": hidden,
                "about_template": $("<div />").addClass("work-description").html(hidden.html()),
                "about": false,
                "mode": "hiding",
                "target": false
            });
        });
    },
    define_rows_last: function() {
        var that = this;
        var last_offset = 0;
        var row = [];
        var prev_item = false;
        $.each(that.items, function(i, item) {
            var offset = item.el.offset().top;
            if(i == 0) {
                row.push(item);
                last_offset = offset;
            } else if (last_offset == offset) {
                row.push(item);
            } else {
                $.each(row, function(j, row_item) {
                    row_item.target = prev_item;
                });

                row = [];
                row.push(item);
                last_offset = offset;
            }
            prev_item = item;
        });

        $.each(row, function(j, row_item) {
            row_item.target = prev_item;
        });
    },
    bind_togglers: function() {
        var that = this;
        $.each(this.items, function(i, item) {
            item.toggler.on("click", function(e) {
                e.preventDefault();
                if(item.mode == "hiding") {
                    if(that.showing >= 0) {
                        that.remove_description(that.items[that.showing]);
                    }
                    if(that.can_show(item)) {
                        that.show_description(item);
                        that.showing = i;
                    }
                } else {
                    that.showing = -1;
                    that.remove_description(item);
                }
            });
        });
    },
    can_show: function(item) {
        return check_for_showing = item.about_template.find(".work-about-text").html() != "";
    },
    show_description: function (item) {
        var that = this;
        item.about = item.about_template.clone();
        item.about.insertAfter(item.target.el);
        var work_about = item.about.find(".work-about");
        work_about.css({
            "margin-top": -1 * parseInt(work_about.outerHeight())/2
        });

        if(work_about.outerHeight() > item.about.outerHeight()) {
            item.about.css({
                "height": parseInt(work_about.outerHeight())
            });
        }
        item.mode = "showing";
        item.el.addClass("active");
    },
    remove_description: function (item) {
        item.about.remove();
        item.about = false;
        item.mode = "hiding";
        item.el.removeClass("active");
    }
};

$(document).ready(function(){
    sliderInit();
    portfolioItems.init();
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