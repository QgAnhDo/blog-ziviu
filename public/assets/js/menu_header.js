//Menu icon change
$(document).ready(function(){
    $(".expand_icon").click(function(){
        $("#menuExpand").fadeToggle(300);
        if ($("#menu-bar").css("display") == 'block') {
            $("#menu-bar").css("display","none");
            $("#menu-close").css("display","block");
        }
        else {
            $("#menu-bar").css("display","block");
            $("#menu-close").css("display","none");
        }
    });
});

//Searchbox expand
$(document).ready(function(){
    $('.search_icon').click(function() {
        $('.searchbox').animate({'width': 'toggle'});
    });
});

//Sticky menu
$(document).ready(function(){
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if ( scrollTop > 100 ) {
            $(".menu").css({"position":"fixed","top":"0"});
            $(".menu_expand").css({"position":"fixed","top":"45px"});
        } else if (scrollTop == 0) {
            $(".menu").css({"position":"absolute"});
            $(".menu_expand").css({"position":"absolute"});
        }
    });
});

//Scroll to top
$(document).ready(function(){
    // hide #back-top first
    $("#back-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 1000) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
});
