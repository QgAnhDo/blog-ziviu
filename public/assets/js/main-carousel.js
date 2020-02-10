$(document).ready(function(){
    $('.item-carousel').owlCarousel({
        center: true,
        loop:false,
        autoplay:false,
        autoplayTimeout:5000,
        margin:20,
        nav:true,
        items:2.5,
        startPosition: 1,
        responsive:{
        	0:{
        		items:1,
                nav: false,
                margin:0
        	},
            1000:{
                items:2.5
            }
        }
    })


});
