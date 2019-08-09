$(document).ready(function () {
    $(".champ_hide").click(function () {
        $(".champ_welcome").hide();
        $(".champ_show").show();
        $(".champ_hide").hide();
        $(".champ_show").addClass("champ_demo");
    });

    $(".champ_show").click(function () {
        $(".champ_welcome").show();
        $(".champ_hide").show();
        $(".champ_show").hide();
    });

    $(".toggle_prime").click(function () {
        $(".optimus_prime").toggle();
        $(".toggle_prime").addClass("toggle_text");
    });

    $(".fadein_button").click(function () {
        $(".div_color1").fadeIn(200);
        $(".div_color2").fadeIn(400);
        $(".div_color3").fadeIn(600);
        $(".fadeout_button").show();
    });

    $(".fadeout_button").click(function () {
        $(".div_color1").fadeOut(200);
        $(".div_color2").fadeOut(400);
        $(".div_color3").fadeOut(2000);
    });

    $(".slider-clicker").click(function () {
        $(".specbee").slideToggle();
    });

    $(".animation_button").click(function () {
        $(".animation-text").animate({ fontSize: '1.5em' }, "slow");
        $(".animation-text").animate({ height: '300px', opacity: '0.4' }, "slow");
        $(".animation-text").animate({ width: '300px', opacity: '0.8' }, "slow");
        $(".animation-text").animate({ height: '100px', opacity: '0.4' }, "slow");
        $(".animation-text").animate({ width: '100px', opacity: '0.8' }, "slow");
    });

    $(".slide_start").click(function () {
        $(".slide_text").slideDown(3000);
    });
    $(".slide_stop").click(function () {
        $(".slide_text").stop();
    });

    $(".callback_button").click(function () {
        $(".callback_text").hide(1000);
        alert("Text to Callback will be Hidden");
    });

    $(".chaining_button").click(function () {
        $(".chaining_text").css("color", "red").slideUp(2000).slideDown(2000);
    });

    $(".append_button").click(function () {
        $(".append_text").append(" | Hello World ");
    });
    $(".remove_button").click(function () {
        $(".append_text").empty();
    });

});