$(document).ready(function() {

    /**
     * Scroll Effects
     */
    $('.navbar-brand').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1500);
    });
    $('.nav-link.main-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#albums-section").offset().top - 100
        }, 1500);
    });
    $('.nav-link.steps-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#steps-section").offset().top - 50
        }, 1500);
    });
    $('.nav-link.plans-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#plans-section").offset().top - 50
        }, 1500);
    });

    /**
     * Window Scroll Navbar Effect
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 0) {
            $('#main-navbar').addClass('scrolled');
        }
        else {
            $('#main-navbar').removeClass('scrolled');
        }
    });

});