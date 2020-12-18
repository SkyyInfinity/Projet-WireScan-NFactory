$(document).ready(function() {
    // START JQUERY

    // STICKY NAV
    $(window).on("scroll touchmove", function () {
        $('#header').toggleClass('sticky', $(document).scrollTop() > 100);
    });

    // HAMBURGER NAV
    $('#js_hamburger').on('click', function(e) {
        e.preventDefault();
        $('#js_nav-links').toggleClass('openned-hamburger');
        $('#overlay').toggleClass('actived');
    });
    
    // END JQUERY
 });