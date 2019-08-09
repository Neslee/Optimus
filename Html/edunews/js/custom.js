$(document).ready(function() {
 
    $('.home-page-slider').owlCarousel({
loop:true,
margin:1,
nav:true,
autoplay:false,
startPosition:4,
responsive:{
    0:{
        items:1
    },
    600:{
        items:2
    },
    1000:{
        items:4
    }
}
})

});


