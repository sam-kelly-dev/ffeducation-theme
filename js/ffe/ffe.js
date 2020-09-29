

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
            $('.navbar').addClass("scrolled");
        }else{
            $('.navbar').removeClass("scrolled");
        }
    }
    $(document).ready(){
        console.log('DOCUMENT READY!');
        if($('.navbar').length > 0){
            console.log('Found navbar');
            $(window).on("scroll load resize", function(){
                checkScroll();
            });
        }
    }
})();