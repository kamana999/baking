jQuery(document).ready(function ($) {
    "use-strict";
    $('#bestsellinggifts').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots: true,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });
});

jQuery(document).ready(function ($) {
    "use-strict";
    $('#shopbypersonality').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots: true,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });
});

jQuery(document).ready(function ($) {
    "use-strict";
    $('#bestgiftunder300').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots: true,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });
});

jQuery(document).ready(function ($) {
    "use-strict";
    $('#customerratings').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots: true,
        autoplayTimeout: 8500,
        smartSpeed: 450,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });
});

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("navbar").style.top = "0";
    }
    else {
        document.getElementById("navbar").style.top = "-90px";
    }
}


//NAVIGATION
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

//Login
function toggleSignup() {
    document.getElementById("login-toggle").style.backgroundColor = "#fff";
    document.getElementById("login-toggle").style.color = "#222";
    document.getElementById("signup-toggle").style.backgroundColor = "#e8bbb5";
    document.getElementById("signup-toggle").style.color = "#fff";
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "block";
}

function toggleLogin() {
    document.getElementById("login-toggle").style.backgroundColor = "#e8bbb5";
    document.getElementById("login-toggle").style.color = "#fff";
    document.getElementById("signup-toggle").style.backgroundColor = "#fff";
    document.getElementById("signup-toggle").style.color = "#222";
    document.getElementById("signup-form").style.display = "none";
    document.getElementById("login-form").style.display = "block";
}

//Product

var ProductImg = document.getElementById("ProductImg");
var SmallImg = document.getElementsByClassName("small-img");

$(document).ready(function () {
    $(SmallImg[0]).click(function () {
        $(".product-title").css("color", "#8ea47e");
        $(".price span:first-child").css("color", "#8ea47e");
        $(".custom-btn").css("background", "#8ea47e");
        $(".reviews i").css("color", "#8ea47e");
        $(".colors").css("background", "#8ea47e");
        ProductImg.src = SmallImg[0].src
    });
    $(SmallImg[1]).click(function () {
        $(".product-title").css("color", "#e8bbb5");
        $(".price span:first-child").css("color", "#e8bbb5");
        $(".custom-btn").css("background", "#e8bbb5");
        $(".reviews i").css("color", "#e8bbb5");
        $(".colors").css("background", "#e8bbb5");
        ProductImg.src = SmallImg[1].src
    });
    $(SmallImg[2]).click(function () {
        $(".product-title").css("color", "#8ea47e");
        $(".price span:first-child").css("color", "#8ea47e");
        $(".custom-btn").css("background", "#8ea47e");
        $(".reviews i").css("color", "#8ea47e)");
        $(".colors").css("background", "#8ea47e");
        ProductImg.src = SmallImg[2].src
    });
    $(SmallImg[3]).click(function () {
        $(".product-title").css("color", "#e8bbb5)");
        $(".price span:first-child").css("color", "#e8bbb5");
        $(".custom-btn").css("background", "#e8bbb5");
        $(".reviews i").css("color", "#e8bbb5");
        $(".colors").css("background", "#e8bbb5");
        ProductImg.src = SmallImg[3].src
    });
    $('.product-inf a').click(function () {

        $('.product-inf li').removeClass('active');
        $(this).parent().addClass('active');

        let currentTab = $(this).attr('href');
        $('.tabs-content div').hide();
        $(currentTab).show();

        return false;
    });
});


(function ($) {
    'use strict';

    jQuery(document).on('ready', function () {

        $('a.page-scroll').on('click', function (e) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top - 50
            }, 1500);
            e.preventDefault();
        });

    });


})(jQuery);

$('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
    if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
    }
    var $subMenu = $(this).next('.dropdown-menu');
    $subMenu.toggleClass('show');


    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
        $('.dropdown-submenu .show').removeClass('show');
    });


    return false;
});

'use strict';

$(document).ready(function () {
    $(window).bind('scroll', function (e) {
        parallaxScroll();
    });
});

function parallaxScroll() {
    const scrolled = $(window).scrollTop();
    $('#team-image').css('top', (0 - (scrolled * .20)) + 'px');
    $('.img-1').css('top', (0 - (scrolled * .35)) + 'px');
    $('.img-2').css('top', (0 - (scrolled * .05)) + 'px');
}
