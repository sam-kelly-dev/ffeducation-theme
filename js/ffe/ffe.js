

/**
 * File ffe.js
 *
 * Scripts for Fantastic Fungi Education.!
 */
( function() {
    function checkScroll(){
        var startY = $('.navbar').height() * 100; //The point where the navbar changes in px
        console.log('Checkin scroll');
        if($(window).scrollTop() > startY){
            $('.navbar-scrollable').addClass("scrolled");
        }else{
            $('.navbar-scrollable').removeClass("scrolled");
        }
    }
    $(document).ready(){
        if($('.navbar-scrollable').length > 0){
            console.log('Found navbar');
            $(window).on("scroll load resize", function(){
                checkScroll();
            });
        }
    }
})();