// Initalize slider
var sliderInit = function() {
    var sliderContainer = $("#slides"),
        sliderWrapper = $("#slides-wrapper");

    sliderWrapper.css('backgroundImage', 'url("'+sliderContainer.find('.item').first().data('bg-image')+'")');

    $("#slides").slides({
        generateNextPrev: true,
        pagination: true,
        effect: 'fade',
        play: 10000,
        animationComplete: function(current) {
            sliderWrapper.css('backgroundImage', 'url("'+sliderContainer.find('.item:nth-child('+current+')').data('bg-image')+'")');
        }
    });
};

// Drawing shape for mission
var drawMissionShape = function(){
    var width = $('.mission').outerWidth();
    var height = 75;

    $('#canvas').width(width).height(height);

    var canvas = document.getElementById("canvas");
    var context = canvas.getContext('2d');

    context.moveTo(0, 0);
    context.lineTo(canvas.width/2, canvas.height-4);
    context.lineTo(canvas.width, 0);

    context.strokeStyle = "#e6e6e6";
    context.lineWidth = 4;
    context.stroke();
};

$(document).ready(function(){
    sliderInit();
    drawMissionShape();
});
