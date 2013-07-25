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

    function paginate(options) {
        var defaults = {
            items_per_page : 3
        }
        var options = $.extend(defaults,options);
        var current_page = 0;

        var $items = $('.b-portfolio-text > ul > li');
        var $control_container = $('.b-slider');

        // Get the total number of items
        var total_items = $items.size();

        // Calculate the number of pages needed
        var number_of_pages = Math.ceil(total_items/options.items_per_page);

        // hide all pages
        $items.hide();
        // Show the first page
        $items.slice(0, options.items_per_page).show();

        // Event handler for 'Prev' link
        $control_container.find('.prev').click(function(e){
            e.preventDefault();
            showPrevPage($(this));
        });

        // Event handler for 'Next' link
        $control_container.find('.next').click(function(e){
            e.preventDefault();
            showNextPage($(this));
        });

        function showPrevPage(e){
            new_page = current_page - 1;

            // Check that we aren't on a boundary link
            if($(e).hasClass('disabled')){
                return;
            }else{
                gotopage(new_page);
            }
        };

        function showNextPage(e){
            new_page = current_page + 1;

            // Check that we aren't on a boundary link
            if($(e).hasClass('disabled')){
                return;
            }else{
                gotopage(new_page);
            }
        };

        function gotopage(page_num){
            var ipp = options.items_per_page;

            var isLastPage = false;

            // Find the start of the next slice
            start_from = page_num * ipp;

            // Find the end of the next slice
            end_on = start_from + ipp;
            // Hide the current page
            var items = $items.hide().slice(start_from, end_on);

            items.show();

            // Set the current page meta data
            current_page = page_num;

            // Add a class to the next or prev links if there are no more pages next or previous to the active page
            if (page_num == 0) {
                $control_container.find('.prev').addClass('disabled');
                $control_container.find('.next').removeClass('disabled');
            } else if (page_num == number_of_pages - 1) {
                $control_container.find('.prev').removeClass('disabled');
                $control_container.find('.next').addClass('disabled');
            } else {
                $control_container.find('.prev').removeClass('disabled');
                $control_container.find('.next').removeClass('disabled');
            }
        };


    }

    function init(){
//        switcher();
        scrollLine();
        paginate();
    }
    
    $(function(){
        init();
    });

        var collapseAboutBlock, deselectTemiList, extendAboutBlock, hideMasterclass, showMasterclass, showMission, showTeam;

    extendAboutBlock = function() {
        return $("#aboutus").addClass('extended');
    };

    collapseAboutBlock = function() {
        return $("#aboutus").removeClass('extended');
    };

    deselectTemiList = function() {
        var item, items, _i, _len, _results;

        items = $('.b-temi-list').children('.item').toArray();
        _results = [];
        for (_i = 0, _len = items.length; _i < _len; _i++) {
            item = items[_i];
            _results.push($(item).removeClass('active'));
        }
        return _results;
    };

    showTeam = function() {
        $('#mission-block').addClass('hidden');
        $('#team-block').removeClass('hidden');
        $('#about-team-switch').addClass('active');
        return extendAboutBlock();
    };

    showMission = function() {
        $('#team-block').addClass('hidden');
        $('#mission-block').removeClass('hidden');
        $('#about-mission-switch').addClass('active');
        return extendAboutBlock();
    };

    $(document).on('click', '#about-team-switch', function() {
        if ($(this).hasClass('active')) {
            deselectTemiList();
            return collapseAboutBlock();
        } else {
            if ($('#about-mission-switch').hasClass('active')) {
                collapseAboutBlock();
                deselectTemiList();
                $('#about-team-switch').addClass('active');
                return setTimeout((function() {
                    return showTeam();
                }), 650);
            } else {
                return showTeam();
            }
        }
    });

    $(document).on('click', '#about-mission-switch', function() {
        if ($(this).hasClass('active')) {
            deselectTemiList();
            return collapseAboutBlock();
        } else {
            if ($('#about-team-switch').hasClass('active')) {
                collapseAboutBlock();
                deselectTemiList();
                $('#about-mission-switch').addClass('active');
                return setTimeout((function() {
                    return showMission();
                }), 650);
            } else {
                return showMission();
            }
        }
    });

    
})(jQuery,undefined)