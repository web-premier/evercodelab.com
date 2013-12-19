// Initalize slider
var sliderInit = function() {
    $("#slides").slidesjs({
        height: 400,
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

$(document).ready(function(){
    sliderInit();
});
