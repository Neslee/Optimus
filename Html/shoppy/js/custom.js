$(document).ready(function(){
    
$('.deal-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,

    slideBy: 2,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        991:{
            items:5
        }
    }
})

$('.arrival-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    slideBy: 1,
    autoplay: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

$('.brand-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    slideBy: 1,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
});
