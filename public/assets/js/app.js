"use strict";
document.addEventListener("DOMContentLoaded", function () {
    Handle.init();
});

let Handle = (function () {
    const _event_home = () => {
        jQuery(document).ready(function () {
            // Khởi tạo Slick Slider
            if (jQuery(".slide-banners").length > 0) {
                jQuery(".slide-banners").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 5000, // Chuyển ảnh sau mỗi 2 giây
                    arrows: true,
                    infinite: true,
                });
            }

            jQuery(".sliders").slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                arrows: true,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                        settings: {
                            slidesToShow: 4, // Hiển thị 5 ảnh
                        },
                    },
                    {
                        breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                        settings: {
                            slidesToShow: 1, // Hiển thị 4 ảnh
                        },
                    },
                    {
                        breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                        settings: {
                            slidesToShow: 1, // Hiển thị 3 ảnh
                        },
                    },
                ],
            });
            jQuery(".sliders-brands").slick({
                slidesToShow: 5,
                slidesToScroll: 2,
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                arrows: true,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                        settings: {
                            slidesToShow: 4, // Hiển thị 5 ảnh
                        },
                    },
                    {
                        breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                        settings: {
                            slidesToShow: 2, // Hiển thị 4 ảnh
                        },
                    },
                    {
                        breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                        settings: {
                            slidesToShow: 1, // Hiển thị 3 ảnh
                        },
                    },
                ],
            });
        });

        jQuery(document).ready(function () {
            jQuery("li.close-nav, .mobile-nav-offcanvas-right").on(
                "click",
                function () {
                    jQuery(".mobile-menu").toggleClass("nav-is-visible");
                }
            );
        });

        jQuery(document).ready(function () {
            var bannerSlider = jQuery(".sliders-photo");
            if (bannerSlider.length > 0) {
                // Ẩn slider lúc đầu (cũng có thể chỉ cần CSS thôi)
                bannerSlider.on("init", function (event, slick) {
                    bannerSlider.css({
                        visibility: "visible",
                        opacity: 1,
                    });
                });

                bannerSlider.css({
                    visibility: "hidden",
                    opacity: 0,
                });

                // Khởi tạo slick slider cho slide-banners
                bannerSlider.slick({
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    dots: false,
                    autoplay: false,
                    arrows: true,
                    infinite: true,
                    responsive: [
                        {
                            breakpoint: 800,
                            settings: {
                                slidesToShow: 5,
                            },
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 4,
                            },
                        },
                        {
                            breakpoint: 400,
                            settings: {
                                slidesToShow: 3,
                            },
                        },
                    ],
                });
            }

            var slider = jQuery("#list-recomend");

            slider.slick({
                slidesToShow: 6,
                slidesToScroll: 1, // số slide scroll mỗi lần
                dots: false,
                autoplay: false,
                autoplaySpeed: 0, // liên tục
                speed: 100, // tốc độ chuyển slide (ms)
                cssEase: "linear", // mượt liên tục
                arrows: true,
                infinite: true,
                pauseOnHover: false,
                responsive: [
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 5,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });

            // Khi slider thay đổi ảnh
            slider.on("afterChange", function (event, slick, currentSlide) {
                var newImage = jQuery(
                    '.sliders-photo .slick-slide[data-slick-index="' +
                        currentSlide +
                        '"] img'
                ).attr("src-set");
                jQuery(".box-show-image-photo img").attr(
                    "src",
                    newImage + "?" + currentSlide
                );
            });

            // Khi click vào ảnh nhỏ, ảnh lớn thay đổi
            jQuery(".sliders-photo .slide-item img").on("click", function () {
                var newImage = jQuery(this).attr("src-set");
                jQuery(".box-show-image-photo img").attr("src", newImage);
            });
        });
    };

    return {
        init: function () {
            _event_home();
        },
    };
})();
