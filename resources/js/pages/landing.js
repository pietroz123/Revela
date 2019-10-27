$(document).ready(function() {

    /**
     * Scroll Effects
     */
    $('.nav-link.main-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#albums-section").offset().top
        }, 1500);
    });
    $('.nav-link.steps-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#steps-section").offset().top
        }, 1500);
    });
    $('.nav-link.plans-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#plans-section").offset().top
        }, 1500);
    });

});