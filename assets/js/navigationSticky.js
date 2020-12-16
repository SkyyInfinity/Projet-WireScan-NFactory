$(document).ready(function(){
    // START JQUERY
    $(window).on("scroll touchmove", function () {
        $('#header').toggleClass('sticky', $(document).scrollTop() > 100);
    });
    // END JQUERY
 });