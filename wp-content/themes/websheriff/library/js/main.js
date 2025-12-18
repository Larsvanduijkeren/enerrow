jQuery.noConflict();

(function ($) {
    $(document).ready(function () {
        smoothScroll();
        menu();
        accordion();
        headerController();
        marquee();
        reviewSlider();
        workoutSlider();
        pricingToggle();
        languagePopup();

        if ($(window).width() > 991) {
            lenis();

            AOS.init({
                offset: 50,
                duration: 1000,
                delay: 10000,
            });
        } else {
            AOS.init({
                offset: 50,
                duration: 600,
                delay: 10000,
            });
        }
    });

    let languagePopup = () => {
        $('.lang-trigger').click(function () {
            $('body').addClass('lang-popup-open');
        })

        $('.lang-popup .overlay, .lang-popup .close').click(function () {
            $('body').removeClass('lang-popup-open');
        })
    }

    let pricingToggle = () => {
        $('.pricing .control').click(function () {
            if ($(this).hasClass('yearly')) {
                $(this).removeClass('yearly');
                $('.pricing .yearly-price').removeClass('active');
                $('.pricing .monthly-price').addClass('active');
            } else {
                $(this).addClass('yearly');
                $('.pricing .yearly-price').addClass('active');
                $('.pricing .monthly-price').removeClass('active');
            }
        })
    }

    let workoutSlider = () => {
        let slider = $(".workout-slider .usps");

        // Helper function to init the slider safely
        let initSlider = (rtl = false) => {
            if (!slider.hasClass('slick-initialized')) {
                slider.slick({
                    autoplay: false,
                    infinite: true,
                    dots: true,
                    arrows: false,
                    slidesToShow: 2,
                    rtl: rtl,
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
            } else {
                slider.slick('setOption', 'rtl', rtl, true);
                slider.slick('refresh');
            }
        };

        // Check if body already has RTL
        if ($('body').hasClass('rtl')) {
            initSlider(true);
        } else {
            initSlider(false);
        }

        // Watch for Weglot toggling RTL dynamically
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    const isRTL = $('body').hasClass('rtl');
                    const currentRTL = slider.slick('slickGetOption', 'rtl');
                    if (isRTL !== currentRTL) {
                        slider.slick('unslick');
                        initSlider(isRTL);
                    }
                }
            });
        });

        observer.observe(document.body, { attributes: true });
    };


    let reviewSlider = () => {
        let slider = $(".review-slider .slider");

        // Helper to initialize or refresh the slider
        let initSlider = (rtl = false) => {
            if (!slider.hasClass('slick-initialized')) {
                slider.slick({
                    autoplay: true,
                    dots: true,
                    arrows: false,
                    variableWidth: true,
                    autoplaySpeed: 4000,
                    rtl: rtl,
                });
            } else {
                slider.slick('unslick');
                slider.slick({
                    autoplay: true,
                    dots: true,
                    arrows: false,
                    variableWidth: true,
                    autoplaySpeed: 4000,
                    rtl: rtl,
                });
            }
        };

        // Initial check
        initSlider($('body').hasClass('rtl'));

        // Watch for Weglot toggling RTL dynamically
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    const isRTL = $('body').hasClass('rtl');
                    const currentRTL = slider.slick('slickGetOption', 'rtl');
                    if (isRTL !== currentRTL) {
                        slider.slick('unslick');
                        initSlider(isRTL);
                    }
                }
            });
        });

        observer.observe(document.body, { attributes: true });
    };


    let marquee = () => {
        $('.marquee-slider').marquee({
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true,
            duration: 20000,
        });
    };

    let headerController = function () {
        let scrollWrapper = $(window);
        let body = $("body");

        if (scrollWrapper.scrollTop() > 0) {
            body.addClass("scrolled");
        }

        scrollWrapper.scroll(function () {
            if (scrollWrapper.scrollTop() > 10) {
                body.addClass("scrolled");
            } else {
                body.removeClass("scrolled");
            }
        });
    };

    let accordion = () => {
        let list = $(".accordion");

        if (list) {
            list.accordion({
                collapsible: true,
                active: false,
                header: "h4",
                heightStyle: "content",
            });
        }

        $(".accordion .question").click(function () {
            if ($(this).find(".ui-accordion-header").hasClass("ui-state-active")) {
                $(".accordion .question").removeClass("open");
                $(this).addClass("open");
            } else {
                $(".accordion .question").removeClass("open");
            }
        });
    };

    let lenis = () => {
        const lenis = new Lenis();

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    };

    let smoothScroll = function () {
        $(document).on("click", "a[href^=\"#\"]", function (event) {
            event.preventDefault();

            $("html, body").animate({
                scrollTop: $($.attr(this, "href")).offset().top - 120,
            }, 500);
        });
    };

    var menu = function () {
        $('.mobile-nav .menu-item-has-children > a').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('open');
        });

        $(".hamburger").click(function () {
            $("body").toggleClass("mobile-nav-open");

            setTimeout(function () {
                $("body, html").toggleClass("no-scroll");
            }, 500);
        });
    };

    let casesIso;

    const casesMasonry = () => {
        const $grid = $('.team-archive .masonry');
        if (!$grid.length) return;

        // Init Isotope after images known
        $grid.imagesLoaded(() => {
            casesIso = $grid.isotope({
                itemSelector: '.team-member',
                layoutMode: 'masonry',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                    gutter: '.gutter-sizer'
                }
            });

            // As images progressively load (slow networks), keep tightening layout
            $grid.imagesLoaded().progress(() => casesIso.isotope('layout'));
        });

        // Debounced relayout on resize/orientation
        const debounce = (fn, ms = 150) => {
            let t;
            return (...a) => {
                clearTimeout(t);
                t = setTimeout(() => fn.apply(null, a), ms);
            };
        };
        const relayout = debounce(() => {
            if (casesIso) casesIso.isotope('layout');
        }, 150);

        $(window).on('resize orientationchange', relayout);

        // Catch container width changes (tabs/accordions)
        if (window.ResizeObserver) {
            const ro = new ResizeObserver(() => relayout());
            $grid.each((_, el) => ro.observe(el));
        }

        // Fonts can change metrics after load
        if (document.fonts?.ready) document.fonts.ready.then(() => relayout());
    };

    jQuery(casesMasonry);
})(jQuery);

