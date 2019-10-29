$(document).ready(function() {

    /**
     * Scroll Effects
     */
    $('.navbar-brand').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1500);
        $('.navbar-collapse').removeClass('show');
    });
    $('.nav-link.main-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#albums-section").offset().top - 100
        }, 1500);
        $('.navbar-collapse').removeClass('show');
    });
    $('.nav-link.steps-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#steps-section").offset().top - 50
        }, 1500);
        $('.navbar-collapse').removeClass('show');
    });
    $('.nav-link.plans-section').click(function() {
        $('html, body').animate({
            scrollTop: $("#plans-section").offset().top - 50
        }, 1500);
        $('.navbar-collapse').removeClass('show');
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