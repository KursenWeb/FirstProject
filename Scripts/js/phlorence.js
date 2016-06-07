$(function () {

    var navbar = $('nav.navbar');

    /**
     * Add proper class to navbar when page is scrolled down
     */
    var shiftNavbar = function () {
        var scroll = $(window).scrollTop();
        if (scroll > 50) {
            navbar.addClass('navbar-shifted');
        } else {
            navbar.removeClass('navbar-shifted');
        }
    };

    shiftNavbar();

    $(window).scroll(function (event) {
        shiftNavbar();
    });

    /**
     * Toggle shifted class when click on the toggle
     */
    $('.navbar-toggle').on('click', function (e) {
        var navbar_collapse = $('.navbar-collapse'),
            current_scroll = $(window).scrollTop();

        if (current_scroll < 50) {
            if (!navbar_collapse.hasClass('in')) {
                navbar.addClass('navbar-shifted');
            } else {
                navbar.removeClass('navbar-shifted');
            }
        }
    });

    /**
     * Smooth scrolling
     */
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 40
                }, 1000);
                return false;
            }
        }
    });

    /**
     * Work list
     */
    var carousel = $('.own-carousel');
    carousel.owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        transitionStyle : "fade"
    });
});