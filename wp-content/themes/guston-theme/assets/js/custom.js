const IS_MOBILE_DEVICE = window.matchMedia(
    "only screen and (max-width: 767px)"
).matches;
const IS_TAB_DEVICE = window.matchMedia(
    "only screen and (min-width: 768px) and (max-width: 1024px)"
).matches;
const IS_DESKTOP_DEVICE = !IS_MOBILE_DEVICE && !IS_TAB_DEVICE;
const IS_HANDHELD_DEVICE = IS_MOBILE_DEVICE || IS_TAB_DEVICE;

if (IS_DESKTOP_DEVICE && document.querySelector(".wow") != null) {
    new WOW().init();
}

jQuery(document).ready(function ($) {
    let windowWidth = $(window).width();
    if (windowWidth < 1025) {
        new Mmenu(
            "#navbarCollapse",
            {
                offCanvas: {
                    position: "right-front",
                },
                navbars: [
                    {
                        position: "top",
                        content: ["<img src='" + SITE_LOGO + "' />"],
                    },
                    {
                        position: "bottom",
                        content: THEME_PARAMS.SOCIAL_MEDIA,
                    },
                ],
            },
            {
                offCanvas: {
                    page: {
                        selector: "#page",
                    },
                },
            }
        );
    }

    if ($("#bannerSwiper").length) {
        new Swiper("#bannerSwiper", {
            loop: true,
            autoplay: {
                delay: 19000,
                disableOnInteraction: false,
            },
            speed: 500,
            preventClicksPropagation: false,
            // Navigation arrows
            navigation: {
                nextEl: ".banner-next",
                prevEl: ".banner-prev",
            },
            pagination: {
                el: ".banner-pagination",
                clickable: true,
            }
        });
    }

    if ($("#productsThumbSwiper").length) {
        const element = $("#productsThumbSwiper");
        let childCount = $(element).find(".swiper-slide").length;

        // enable loop and touch move after checking device and child count
        let enableSwiper =
            (IS_MOBILE_DEVICE && childCount > 4) ||
            (IS_TAB_DEVICE && childCount > 4) ||
            (IS_DESKTOP_DEVICE && childCount > 4);

        const productsThumbSwiper = new Swiper("#productsThumbSwiper", {
            loop: enableSwiper,
            allowTouchMove: enableSwiper,
            speed: 500,
            preventClicksPropagation: false,
            spaceBetween: 10,
            breakpoints: {
                0: {
                    slidesPerView: 4,
                },
                768: {
                    slidesPerView: 4,
                },
                1025: {
                    slidesPerView: 4,
                },
            },
            initialSlide: 0,
            slidesPerGroup: 1,
        });

        const productsSwiper = new Swiper("#productsSwiper", {
            loop: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            allowTouchMove: false,
            autoplay: false,
            speed: 1000,
            preventClicksPropagation: false,
            thumbs: {
                swiper: productsThumbSwiper,
            },
        });
    }

    // Sticky Menu
    if (windowWidth >= 1025) {
        $(window).scroll(function (event) {
            stickyMenu();
        });

        stickyMenu();
    }

    function stickyMenu() {
        let scroll = $(window).scrollTop();
        if (scroll > 0) {
            if (!$("header.main-header").hasClass("sticky")) {
                $("header.main-header").addClass("sticky");
            }
        } else {
            $("header.main-header").removeClass("sticky");
        }
    }

    $(".scroll-to").on("click", function (event) {
        let element = $(".scroll-to").data("target");
        if ($(element).length) {
            $([document.documentElement, document.body]).animate(
                {
                    scrollTop:
                        $(element).offset().top -
                        (IS_HANDHELD_DEVICE ? 0 : 100),
                },
                500
            );
        }
    });

    if (IS_MOBILE_DEVICE) {
        $("section.home-company .nav-link").on("click", function (event) {
            $([document.documentElement, document.body]).animate(
                {
                    scrollTop: $(".tab-content").offset().top,
                },
                500
            );
        });
    }

    // Fancybox
    if ($("[data-fancybox]").length) {
        Fancybox.bind("[data-fancybox]");
    }

    // Factories gallery
    if ($(".factory-gallery").length) {
        $($(".factory-gallery")).each(function (index, element) {
            let childCount = $(element).find(".swiper-slide").length;

            let factoryID = $(element).data("factory");

            let enableSwiper =
                (IS_MOBILE_DEVICE && childCount > 1) ||
                (IS_TAB_DEVICE && childCount > 2) ||
                (IS_DESKTOP_DEVICE && childCount > 5);

            if (!enableSwiper) {
                $("#nav-prev-" + factoryID).hide();
                $("#nav-next-" + factoryID).hide();
            }

            new Swiper(element, {
                loop: enableSwiper,
                autoplay: enableSwiper
                    ? {
                        delay: 5000,
                        disableOnInteraction: false,
                    }
                    : false,
                allowTouchMove: enableSwiper,
                speed: 500,
                preventClicksPropagation: false,
                spaceBetween: 10,
                // Navigation arrows
                navigation: {
                    nextEl: "#nav-prev-" + factoryID,
                    prevEl: "#nav-next-" + factoryID,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1025: {
                        slidesPerView: 5,
                    },
                },
            });
        });
    }

    // Set job title on careers page form when job selected
    $(".career-apply-btn").on("click", function () {
        let title = $(this).data("title");
        $(".job-title input").val(title);
    });

    // Set product title on home page form when product inquiry modal open
    $(".product-inquiry-btn").on("click", function () {
        let title = $(this).data("title");
        $(".product-input input").val(title);
    });

    // Product collection show all product button
    $(".collection-trigger").on("click", function (event) {
        event.preventDefault();
        let rowParent = $(this).parents().eq(2);
        if ($(rowParent).find(".hide").length) {
            $(rowParent).find(".hide").removeClass("hide");
            $(this).parents().eq(1).hide("medium");
        }
    });

    //Counter Animation
    if ($(".sustain-commitment .stats").length) {
        let counter = false;
        if (!counter) {
            $(".sustain-commitment .stat h2").each(function () {
                $(this).data("count", $(this).text());
                $(this).text("0");
            });
            $(window).scroll(function () {
                let a = 0;
                var oTop =
                    $(".sustain-commitment .countries").offset().top -
                    window.innerHeight +
                    500;
                if (a == 0 && $(window).scrollTop() > oTop) {
                    $(".sustain-commitment .stat h2").each(function () {
                        $(this)
                            .prop("Counter", 0)
                            .animate(
                                {
                                    Counter: $(this).data("count"),
                                },
                                {
                                    duration: 3000,
                                    easing: "swing",
                                    step: function (now) {
                                        $(this).text(Math.ceil(now));
                                    },
                                    complete: function () {
                                        $(this).text(this.Counter);
                                        counter = true;
                                    },
                                }
                            );
                    });
                    a = 1;
                }
            });
        }

        $(window).scroll(function () {
            if (
                isInViewport(
                    document.querySelector(".sustain-features .features"),
                    true
                )
            ) {
                $(".sustain-features .features .circle-wrap").addClass(
                    "active"
                );
            }
        });
    }

    // About Milestones swiper
    if ($("#timelineSwiper").length) {
        let swiperElement = $("#timelineSwiper");
        let maxHeight = 0;
        $(swiperElement)
            .find(".swiper-slide")
            .each(function (index, element) {
                if ($(element).height() > maxHeight) {
                    maxHeight = $(element).height();
                }
            });

        $(".timeline").height(maxHeight + "px");

        const timelineBGSwiper = new Swiper("#timelineBGSwiper", {
            allowTouchMove: false,
            noSwiping: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            speed: 1000,
        });

        const timelineSwiper = new Swiper("#timelineSwiper", {
            direction: "vertical",
            mousewheel: true,
            slidesPerView: 1,
            autoHeight: true,
            pagination: {
                el: ".timeline-pagination",
                clickable: true,
                renderBullet: function (index, className) {
                    let year = $(swiperElement)
                        .find(".swiper-slide")
                        .eq(index)
                        .find("h5")
                        .text();
                    return (
                        '<div class="' +
                        className +
                        '"><span></span>' +
                        year +
                        "</div>"
                    );
                },
            },
            thumbs: {
                swiper: timelineBGSwiper,
            },
        });
    }

    // Road Map swiper
    if ($("#roadMapSwiper").length) {
        let swiperElement = $("#roadMapSwiper");
        let maxHeight = 0;
        $(swiperElement)
            .find(".swiper-slide")
            .each(function (index, element) {
                if ($(element).height() > maxHeight) {
                    maxHeight = $(element).height();
                }
            });

        $(".road-map").height(maxHeight + "px");

        const roadMapBGSwiper = new Swiper("#roadMapBGSwiper", {
            allowTouchMove: false,
            noSwiping: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            speed: 1000,
        });

        const roadMapSwiper = new Swiper("#roadMapSwiper", {
            direction: "vertical",
            mousewheel: true,
            slidesPerView: 1,
            autoHeight: true,
            pagination: {
                el: ".road-map-pagination",
                clickable: true,
                renderBullet: function (index, className) {
                    let year = $(swiperElement)
                        .find(".swiper-slide")
                        .eq(index)
                        .find("h5")
                        .text();
                    return (
                        '<div class="' +
                        className +
                        '"><span></span>' +
                        year +
                        "</div>"
                    );
                },
            },
            thumbs: {
                swiper: roadMapBGSwiper,
            },
        });
    }

    // Product Collections gallery
    if ($(".collection-products-swiper").length) {
        $($(".collection-products-swiper")).each(function (index, element) {
            let childCount = $(element).find(".swiper-slide").length;

            let collectionID = $(element).data("collection");

            // enable loop and touch move after checking device and child count
            let enableSwiper =
                (IS_MOBILE_DEVICE && childCount > 1) ||
                (IS_TAB_DEVICE && childCount > 2) ||
                (IS_DESKTOP_DEVICE && childCount > 4);

            if (!enableSwiper) {
                $("#nav-prev-" + collectionID).hide();
                $("#nav-next-" + collectionID).hide();
            }

            new Swiper(element, {
                loop: enableSwiper,
                autoplay: enableSwiper
                    ? {
                        delay: 5000,
                        disableOnInteraction: false,
                    }
                    : false,
                allowTouchMove: enableSwiper,
                speed: 500,
                preventClicksPropagation: false,
                spaceBetween: 10,
                // Navigation arrows
                navigation: {
                    nextEl: "#nav-prev-" + collectionID,
                    prevEl: "#nav-next-" + collectionID,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1025: {
                        slidesPerView: 4,
                    },
                },
            });
        });
    }

    if ($("#homeStatsNavSwiper").length) {
        const element = $("#homeStatsNavSwiper");
        let childCount = $(element).find(".swiper-slide").length;

        const homeStatsNavSwiper = new Swiper("#homeStatsNavSwiper", {
            allowTouchMove: false,
            speed: 500,
            preventClicksPropagation: false,
            spaceBetween: 0,
            centerInsufficientSlides: true,
            breakpoints: {
                0: {
                    slidesPerView: childCount,
                },
                1025: {
                    slidesPerView: childCount,
                },
            },
        });

        new Swiper("#homeStatsSwiper", {
            loop: true,
            effect: "creative",
            creativeEffect: {
                prev: {
                    // shadow: true,
                    translate: [0, 0, -400],
                },
                next: {
                    translate: ["100%", 0, 0],
                },
            },
            allowTouchMove: false,
            autoplay: false,
            speed: 1000,
            preventClicksPropagation: false,
            thumbs: {
                swiper: homeStatsNavSwiper,
            },
            breakpoints: {
                0: {
                    autoHeight: true,
                    effect: "fade",
                },
                1025: {
                    autoHeight: false,
                },
            },
        });
    }

    if ($("#sustainBannerSwiper").length) {
        new Swiper("#sustainBannerSwiper", {
            loop: true,
            speed: 500,
            preventClicksPropagation: false,
            // Navigation arrows
            navigation: {
                nextEl: ".banner-next",
                prevEl: ".banner-prev",
            },
            pagination: {
                el: ".sustain-banner .swiper-pagination",
                clickable: true
            },
        });
    }
    if ($("#commitmentCertificationsSwiper").length) {
        const element = $("#commitmentCertificationsSwiper");
        let childCount = $(element).find(".swiper-slide").length;

        // enable loop and touch move after checking device and child count
        let enableSwiper =
            (IS_MOBILE_DEVICE && childCount > 1) ||
            (IS_TAB_DEVICE && childCount > 2) ||
            (IS_DESKTOP_DEVICE && childCount > 5);

        if (!enableSwiper) {
            $("#commitment-prev").hide();
            $("#commitment-next").hide();
        }

        new Swiper("#commitmentCertificationsSwiper", {
            loop: enableSwiper,
            autoplay: enableSwiper
                ? {
                    delay: 5000,
                    disableOnInteraction: false,
                }
                : false,
            allowTouchMove: enableSwiper,
            speed: 500,
            preventClicksPropagation: false,
            spaceBetween: 20,
            // Navigation arrows
            navigation: {
                nextEl: "#commitment-prev",
                prevEl: "#commitment-next",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1025: {
                    slidesPerView: 5,
                },
            },
        });
    }

    if ($("#pillarsNavSwiper").length) {
        const element = $("#pillarsNavSwiper");
        let childCount = $(element).find(".swiper-slide").length;

        let enableSwiper = IS_MOBILE_DEVICE && childCount > 1;

        const pillarsNavSwiper = new Swiper("#pillarsNavSwiper", {
            allowTouchMove: false,
            speed: 500,
            preventClicksPropagation: false,
            spaceBetween: 0,
            centerInsufficientSlides: true,
            breakpoints: {
                0: {
                    slidesPerView: childCount,
                },
                1025: {
                    slidesPerView: childCount,
                },
            },
        });

        new Swiper("#pillarsSwiper", {
            loop: true,
            // effect: "fade",
            allowTouchMove: false,
            autoplay: false,
            speed: 1000,
            preventClicksPropagation: false,
            thumbs: {
                swiper: pillarsNavSwiper,
            },
            breakpoints: {
                0: {
                    autoHeight: true,
                },
                1025: {
                    autoHeight: false,
                },
            },
        });

        $('.pillar-slideshow').each(function (index, element) {
            let itemID = $(this).data('gallery');
            let childCount = $(element).find(".swiper-slide").length;

            if (childCount < 2) {
                $(element).find(".swiper-nav").hide();
            }

            new Swiper('#pillar-swiper-' + itemID, {
                loop: true,
                speed: 500,
                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });

        const accordionPillars = document.getElementById("accordionPillars");
        accordionPillars.addEventListener("hidden.bs.collapse", (event) => {
            var $panel = $(".accordion-header").not(".collapse ");
            $("html,body").animate(
                {
                    scrollTop: $panel.offset().top,
                },
                500
            );
        });
    }

    if ($("#homeFactoriesNavSwiper").length) {
        const element = $("#homeFactoriesNavSwiper");
        let childCount = $(element).find(".swiper-slide").length;

        const homeFactoriesNavSwiper = new Swiper("#homeFactoriesNavSwiper", {
            allowTouchMove: false,
            speed: 500,
            preventClicksPropagation: false,
            spaceBetween: 0,
            centerInsufficientSlides: true,
            slidesPerView: childCount,
        });

        new Swiper("#homeFactoriesSwiper", {
            loop: true,
            effect: "fade",
            allowTouchMove: false,
            autoplay: false,
            speed: 1000,
            preventClicksPropagation: false,
            thumbs: {
                swiper: homeFactoriesNavSwiper,
            },
            breakpoints: {
                0: {
                    autoHeight: true,
                },
                1025: {
                    autoHeight: false,
                },
            },
        });
    }
});

function isInViewport(element, partiallyVisible = false) {
    const { top, left, bottom, right } = element.getBoundingClientRect();
    const { innerHeight, innerWidth } = window;
    return partiallyVisible
        ? ((top > 0 && top < innerHeight) ||
            (bottom > 0 && bottom < innerHeight)) &&
        ((left > 0 && left < innerWidth) ||
            (right > 0 && right < innerWidth))
        : top >= 0 && left >= 0 && bottom <= innerHeight && right <= innerWidth;
}
