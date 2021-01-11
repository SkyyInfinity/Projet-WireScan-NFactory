$(document).ready(function() {
    // START JQUERY

    // HAMBURGER NAV
    $('#js_db-hamburger').on('click', function(e) {
        e.preventDefault();
        $('#header').toggleClass('openned');
        $('#overlay').toggleClass('actived');
    });
    
    // END JQUERY
 });