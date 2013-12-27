// Initalize slider
var sliderInit = function() {
    $("#slides").slidesjs({
        height: 500,
        navigation: {
            effect: "fade"
        },
        pagination: {
            effect: "fade"
        },
        play: {
            active: false,
            effect: "fade",
            interval: 5000,
            swap: false,
            auto: true,
            pauseOnHover: false,
            restartDelay: 2500
        },
        effect: {
            fade: {
                speed: 800
            }
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
