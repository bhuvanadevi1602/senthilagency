
(function($) {
    "use strict";

    $(document).on('ready', function() {

        $(window).on('load', function() {
            // Animate loader off screen
            $(".preloader").delay(500).fadeOut();                        
        });
                
        $(".hero-slider-active").owlCarousel({        
            items: 1,     
            dots: false,
            loop: true,
            autoplayTimeout: 8000,
            autoplay:true,
            nav: true,          
            navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
        });

        $(".testimonial-carousel-active").owlCarousel({        
            items: 1,     
            dots: true,
            loop: true,
            autoplayTimeout: 8000,
            autoplay:true,
        });
        
        $(".testimonial-carousel-2").owlCarousel({        
            items: 2,
            margin: 30,     
            dots: true,
            loop: true,
            autoplayTimeout: 8000,
            autoplay:true,
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 1
                },                
                // breakpoint from 992 up
                1191 : {
                    items: 2
                }
            }
        });

        $(".hero-slider-2").owlCarousel({        
            items: 1,     
            dots: true,
            loop: true,
            autoplayTimeout: 9000,
            autoplay:true,
        });

        $(".brand-carousel-active").owlCarousel({  
            margin: 70,    
            dots: false,
            loop: true,
            autoplayTimeout: 8000,
            autoplay:true,  
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 2,
                },
                767 : {
                    items: 2
                },                
                // breakpoint from 992 up
                1191 : {
                    items: 5
                }
            }
        });

        $(".case-study-items").owlCarousel({  
            margin: 30,    
            dots: false,
            loop: true,
            autoplayTimeout: 8000,
            center: true,
            autoplay:true,
            nav: true,
            navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
            navContainer: '.case-study-carousel-wrapper .work-process-nav', 
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 1
                },
                768 : {
                    items: 2
                },                
                1200 : {
                    items: 3
                }
            }
        });

        // $(".team-members-list").owlCarousel({        
        //     margin: 30,      
        //     dots: false,
        //     loop: true,
        //     autoplayTimeout: 8000,
        //     autoplay:true,
        //     nav: true,
        //     navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
        //     navContainer: '.popular-cause-section .cause-carousel-nav',   
        //     responsive : {
        //         // breakpoint from 0 up
        //         0 : {
        //             items: 1
        //         },
        //         767 : {
        //             items: 2
        //         },                
        //         // breakpoint from 992 up
        //         1191 : {
        //             items: 3
        //         }
        //     }
        // });

        // $('.collapse').on('shown.bs.collapse', function () {
        //     $(this).parent().find(".caret-down").removeClass("caret-down").addClass("caret-up");
        // }).on('hidden.bs.collapse', function () {
        //     $(this).parent().find(".caret-up").removeClass("caret-up").addClass("caret-down");
        // });

        /* =============================================
            # Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: 'image',
            fixedContentPos: false
        });

        $(".popup-gallery").magnificPopup({
            type: 'image',
            fixedContentPos: false,
            gallery: {
                enabled: true
            },
            // other options
        });

        $(".popup-video, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        
        /*==========================
           Scroll To Up Init
        ============================*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '1110', // Distance from top before showing element (px)
            topSpeed: 2000, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 300, // Animation in speed (ms)
            animationOutSpeed: 300, // Animation out speed (ms)
            scrollText: '<i class="fal fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        //# Smooth Scroll
        $('#responsive-menu a').on('click', function(event) {
            var $anchor = $(this);
            var headerH = '85';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1000, 'easeInOutExpo');
            event.preventDefault();
        });

        // Sticky Menu
        $(window).scroll(function() {
            var Width = $(document).width();

            if ($("body").scrollTop() > 100 || $("html").scrollTop() > 100) {
                if (Width > 767) {
                    $("header").addClass("sticky");
                }
            } else {
                $("header").removeClass("sticky");
            }
        });

        $('.container').imagesLoaded(function() {
            $('.portfolio-cat-filter').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            $('.case-cat-filter').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
            });
        });

        var catButton = '.portfolio-cat-filter button';

        var caseButton = '.case-cat-filter button';

        $(catButton).on('click', function(){
            $(catButton).removeClass('active');
            $(this).addClass('active');
        });

        $(caseButton).on('click', function(){
            $(caseButton).removeClass('active');
            $(this).addClass('active');
        });

        $('.single-funfact-item h3').counterUp({
            delay: 15,
            time: 2500,
        });

        $('#hamburger').on('click', function() {            
            $('.mobile-nav').addClass('show');
            $('.overlay').addClass('active');
        });

        $('.close-nav').on('click', function() {            
            $('.mobile-nav').removeClass('show');            
            $('.overlay').removeClass('active');          
        });

        $(".overlay").on("click", function () {
            $(".mobile-nav").removeClass("show");
            $('.overlay').removeClass('active');
        });

        $("#mobile-menu").metisMenu();

        new WOW().init();


        $('.side-toggle-menu, .offcanvas-btn').on('click', function() {            
            $('.offset-menu').addClass('show');
        });

        $('#offset-menu-close-btn').on('click', function() {            
            $('.offset-menu').removeClass('show');
        });

    }); // end document ready function
})(jQuery); // End jQuery
