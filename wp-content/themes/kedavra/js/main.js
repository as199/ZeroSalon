(function($) {

    'use strict';

/*-----------------------------------------------------------------------------------*/
/*  Initialize
/*-----------------------------------------------------------------------------------*/  

new WOW().init();

    /*-----------------------------------------------------------------------------------*/
    /*  Preloader
    /*-----------------------------------------------------------------------------------*/

    $(window).load(function() { 
        $('#status').fadeOut(); 
        $('#preloader').delay(350).fadeOut('fast'); 
        $('body').delay(350).css({'overflow':'visible'});

    });

    /*=========================
    KEDAVRA MAIN JS
    =========================*/

    // header
    $(window).scrollTop();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0.1) {
            $('.site-header').addClass("fixedwrap");
            
        } else {
            $('.site-header').removeClass("fixedwrap");
        }
    });

    $(document).scroll(function() { 
        if($('#home').length) {
            var pageY = $(this).scrollTop();
            var pageH = $(window).height();
            var c = pageY/pageH;
            $('.header').css("background", "rgba(23,25,30,"+pageY/pageH+")");
            $('section.home .border').css("opacity", 1-pageY/pageH);
        }
    });

       /**
     * This part causes smooth scrolling using scrollto.js
     * We target all a tags inside the nav, and apply the scrollto.js to it.
     */
/*    $("nav a").click(function(evn){
        evn.preventDefault();
        $('html,body').scrollTo(this.hash, this.hash); 
    });*/


    // menu
    $(".header .menu li").hover(function(e) {
        $(".header .menu li").each(function() {
            if (!$(this).hasClass("active")) {
                $(this).stop().animate({
                    opacity: 0.4
                }, 'fast');
                $('.menus li.page_item_has_children:hover').stop().animate({
                    opacity: 1
                }, 'fast');
            }
        });
        $(this).stop().animate({
            opacity: 1
        }, 'fast');
    }, function() {
        $(".header .menu li").each(function() {
            if (!$(this).hasClass("active")) {
                $(this).stop().animate({
                    opacity: 1
                }, 'fast');
            }
        });
    });


    // blog
    $(".blog-loop article").hover(function(e) {
        $('.blog-loop article').stop().animate({
            opacity: "0.25"
        }, 'slow');
        $(this).stop().animate({
            opacity: "1"
        }, 'slow');
    }, function() {
        $('.blog-loop article').stop().animate({
            opacity: "1"
        }, 'slow');
    });

    $("section.blog .post").hover(function(e){
        $("section.blog .post").find(".thumbnail").stop().animate({ opacity: 0.4 }, 'slow');
        $("section.blog .post").find(".info").stop().animate({ opacity: 0.4 }, 'slow');
        $(this).find(".info").stop().animate({ opacity: 1 }, 'slow');
        $(this).find(".thumbnail").stop().animate({ opacity: 1 }, 'slow');
    }, function(){ 
        $("section.blog .post").find(".thumbnail").stop().animate({ opacity: 1 }, 'slow');
        $("section.blog .post").find(".info").stop().animate({ opacity: 1 }, 'slow');
    });
    //Blog
    

$(document).ready(function() {

    /*-----------------------------------------------------------------------------------*/
    /*  SLIDER
    /*-----------------------------------------------------------------------------------*/

    $('.home-slider .flexslider').flexslider({
        animation: "fade",
        animationLoop: true,
        animationSpeed: 1500,
        slideshow: true,
        pauseOnHover: false,
        controlNav: false,
        directionNav: true
    });

    $('.home-slider .navigate .prev').on('click', function(){
        $('.home-slider .flexslider').flexslider('prev')
        return true;
    });

    $('.home-slider .navigate .next').on('click', function(){
        $('.home-slider .flexslider').flexslider('next')
        return true;
    });

    var windowHeight;
    var windowWidth;

    windowHeight = $(window).height();
    windowWidth = $(window).width();

    $("section.home-slider .slides img").each(function() {
        var h = $(this).height();
        var w = $(this).width();
        var ratA = w / h;
        var ratI = windowWidth / windowHeight;
        if (ratA > ratI) {
            var r = w / h;
            $(this).css('height', windowHeight);
            $(this).css('width', windowHeight * r);
            var m = ((windowHeight * r) - windowWidth) / 2;
            $(this).css('margin-left', -m);
            $(this).attr("rat", 1);
            $(this).attr("mar", m);
        } else {
            var r = h / w;
            $(this).css('width', windowWidth);
            $(this).css('height', windowWidth * r);
            var m = ((windowWidth * r) - windowHeight) / 2;
            $(this).css('margin-top', -m);
            $(this).attr("rat", 0);
            $(this).attr("mar", m);
        }
    });

    $("section.gallery .flexslider").flexslider({
        animation: "fade",
        selector: ".slides > li",
        animationLoop: false,
        controlNav: false,
        directionNav: false,
        pauseOnHover: false,
        slideshow: true,
        slideshowSpeed: 5000
    });

    $('section.gallery .navigate .prev').on('click', function(){
        $('section.gallery .flexslider').flexslider('prev')
        return false;
    });

    $('section.gallery .navigate .next').on('click', function(){
        $('section.gallery .flexslider').flexslider('next')
        return false;
    });

    $("section.gallery .slides img").mousemove(function( event ) {
      var rat =  parseInt($(this).attr("rat"));
      var mar = parseInt($(this).attr("mar")) * 2;
      if(rat==1) {
        if(event.pageX < mar) $(this).css("margin-left", -event.pageX);
      } else {
        if(event.pageY < mar) $(this).css("margin-top", -event.pageY);
      }
    });

    var windowHeight;
    var windowWidth;

    windowHeight = $(window).height();
    windowWidth = $(window).width();

    $(".fullscreen").css('height', windowHeight);

    $('.home-slider .slides li, section.gallery .slides li').css('height', window.innerHeight - 0);

    $("section.gallery .slides img").each(function() {
        var h = $(this).height();
        var w = $(this).width();
        var ratA = w / h;
        var ratI = windowWidth / windowHeight;
        if (ratA > ratI) {
            var r = w / h;
            $(this).css('height', windowHeight);
            $(this).css('width', windowHeight * r);
            var m = ((windowHeight * r) - windowWidth) / 2;
            $(this).css('margin-left', -m);
            $(this).attr("rat", 1);
            $(this).attr("mar", m);
        } else {
            var r = h / w;
            $(this).css('width', windowWidth);
            $(this).css('height', windowWidth * r);
            var m = ((windowWidth * r) - windowHeight) / 2;
            $(this).css('margin-top', -m);
            $(this).attr("rat", 0);
            $(this).attr("mar", m);
        }
    });

    //Product
    $('section.single-product .image').flexslider({
        animation: "fade",
        animationLoop: true,
        controlNav: false,
        directionNav: true,
        pauseOnHover: false,
        slideshow: true,
        slideshowSpeed: 5000
    });
    //Product

    
    //Navigate
    $("header#header .menu-mobile").click(function(){

        if (!$("header#header").hasClass("active")) {
            $('header#header').addClass("active", "slow", "swing");
            var h = $("header#header .navigation #main-menu").height() + $("header#header .navigation .navigation-right .links").height() + 70;
        } else {
            $('header#header').removeClass("active", "slow", "swing");
        }

    });

    //Contact
    $('#contact .form .submit').click(function(){ 

        $('#contact input#name').removeClass(".error");
        $('#contact textarea#message').removeClass(".error");
        $('#contact input#email').removeClass(".error");
        $('#contact input#subject').removeClass(".error");
        
        var error = false; 
        var name = $('input#name').val(); 
        if(name == "" || name == " ") { 
            error = true; 
            $('#contact input#name').addClass(".error");
        }  

        var subject = $('input#subject').val(); 
        if(subject == "" || subject == " ") { 
            error = true; 
            $('#contact input#subject').addClass(".error");
        } 
        
        var msg = $('#contact textarea#message').val(); 
        if(msg == "" || msg == " ") {
            error = true;
            $('#contact textarea#message').addClass(".error");
            
        }
        
        var email_compare = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i; 
        var email = $('#contact input#email').val(); 
        if (email == "" || email == " ") { 
            $('#contact input#email').addClass(".error");
            error = true;
        }else if (!email_compare.test(email)) { 
            $('#contact input#email').addClass(".error");
            error = true;
        }

        if(error == true) {
            return false;
        }

        var data_string = $('#contact form').serialize(); 
        
        $.ajax({
            type: "POST",
            url: $('#contact form').attr('action'),
            data: data_string,
            
            success: function(message) {
                if(message === 'ok'){
                    $('#contact .success').fadeIn('slow');
                    $('#contact input#name').val('');
                    $('#contact input#email').val('');
                    $('#contact input#subject').val('');
                    $('#contact textarea#message').val('');
                }
                else{
                    $('#contact .error').fadeIn('slow');
                }
            }
        });

        return false; 
    });
    //Contact

});//Ready Close

    /*-----------------------------------------------------------------------------------*/
    /*  HERO IMAGE
    /*-----------------------------------------------------------------------------------*/

    var heroImageHeight = function() {

        var screenHeight = $(window).height();

            $('.hero-image').css('height', screenHeight);
            $('.hero-image .border, .home-slider .border, .home-slider .slider-wrapper').css('height', screenHeight - 160);
            $(".vertical-center").each(function() {
            $(this).css('top', ($(this).parent().height() - $(this).height()) / 2);
        });
    }

    window.onload = heroImageHeight;
    window.onresize = heroImageHeight;

    $(window).load(function() {
        var blogWrapper = $('.single-post #content-wrapper').height();
        var screenWidth = $(window).width();
        if (screenWidth > 768) {
            $('.single-post .article .background img').css('min-height', blogWrapper);
        }

        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    });


    /*-----------------------------------------------------------------------------------*/
    /*  SHOP
    /*-----------------------------------------------------------------------------------*/

    function filterShop(sCat) {
        if($('section.shop .filter').length) {
            $("section.shop .product").removeClass("hidden");
            var i = 0;
            $("section.shop .product").each(function() {
                var pCat = $(this).attr("data-category").toLowerCase();
                if(pCat!=sCat && sCat!="all") {
                    $(this).addClass("hidden").removeAttr("data-type");
                }
            });
        }
    }

    $('section.shop .filter li').click(function(){
        $('section.shop .filter li').removeClass("active");
        $(this).addClass("active");
        filterShop($(this).text().toLowerCase());
    });

    $("section.shop .product").hover(function(e){
        $("section.shop .product").find(".thumbnail").stop().animate({ opacity: 0.4 }, 'slow');
        $("section.shop .product").find(".info").stop().animate({ opacity: 0.4 }, 'slow');
        $(this).find(".info").stop().animate({ opacity: 1 }, 'slow');
        $(this).find(".thumbnail").stop().animate({ opacity: 1 }, 'slow');
    }, function(){ 
        $("section.shop .product").find(".thumbnail").stop().animate({ opacity: 1 }, 'slow');
        $("section.shop .product").find(".info").stop().animate({ opacity: 1 }, 'slow');
    });

    /*-----------------------------------------------------------------------------------*/
    /*  PORTFOLIO
    /*-----------------------------------------------------------------------------------*/

    $("section.portfolio .portfolio-item").hover(function(e){
        $("section.portfolio .portfolio-item").find(".portfolio-image").stop().animate({ opacity: 0.5 }, 'slow');
        $(this).find(".portfolio-image").stop().animate({ opacity: 1 }, 'slow');
    }, function(){ 
        $("section.portfolio .portfolio-item").find(".portfolio-image").stop().animate({ opacity: 1 }, 'slow');
    });

    /*-----------------------------------------------------------------------------------*/
    /*  PORTFOLIO
    /*-----------------------------------------------------------------------------------*/

    $("section.causes .causes-item").hover(function(e){
        $("section.causes .causes-item").find(".causes-image").stop().animate({ opacity: 0.5 }, 'slow');
        $(this).find(".causes-image").stop().animate({ opacity: 1 }, 'slow');
    }, function(){ 
        $("section.causes .causes-item").find(".causes-image").stop().animate({ opacity: 1 }, 'slow');
    });

})(jQuery); 