"use strict"; 
document.addEventListener("DOMContentLoaded", function () {
    

    ajaxCart.init();
    
    Handle.init();
});

let Handle = (function () {
    const _box_cart = $("#_box_cart");
    const _event_home = () => {
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        if (sync1.length > 0 || sync2.length > 0) {
            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: 300,
                lazyLoad: true,
                autoPlay: 5000,
                navigation: false,
                pagination: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 100,
            });
            // Custom Navigation Events
            $(".owl-next").click(function () {
                sync1.trigger("owl.next");
            });
            $(".owl-prev").click(function () {
                sync1.trigger("owl.prev");
            });
            sync2.owlCarousel({
                items: 5,
                pagination: false,
                responsiveRefreshRate: 100,
                afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                },
            });
        }

        function syncPosition(el) {
            var current = this.currentItem;
            $("#sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced");
            if ($("#sync2").data("owlCarousel") !== undefined) {
                center(current);
            }
        }

        $("#sync2").on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo", number);
        });

        function center(number) {
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for (var i in sync2visible) {
                if (num === sync2visible[i]) {
                    var found = true;
                }
            }
            if (found === false) {
                if (num > sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", num - sync2visible.length + 2);
                } else {
                    if (num - 1 === -1) {
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if (num === sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", sync2visible[1]);
            } else if (num === sync2visible[0]) {
                sync2.trigger("owl.goTo", num - 1);
            }
        }
    };
    const _cart = () => {
        $(document).on("click", ".btn-remove-cart", function () {
            let _this = $(this);
            let _cart_id = _this.closest("tr").attr("data-id");
            if (_cart_id) {
                $.ajax({
                    url: window.APP_URL + "/ajax/cart", // URL của API
                    type: "POST", // Phương thức POST
                    data: {
                        cart_id: _cart_id,
                        action: "ajax_delete_to_cart",
                    }, // Chuyển đổi dữ liệu thành chuỗi JSON
                    dataType: "json",

                    success: function (data) {
                        if (data.status == "success") {
                            _this.closest("tr").remove();
                        }
                    },
                    error: function (error) {
                        // Xử lý lỗi
                        console.error("Error:", error);
                    },
                });
            }
        });
        $(document).on("click", ".btn-down", function () {
            let _dom = $(this).closest(".btn-update-cart");
            let _val = _dom.find("input.input-number").val();
            $(_dom)
                .find("input.input-number")
                .attr("value", parseInt(_val) - 1);
            $(_dom).trigger("change");
        });
        $(document).on("click", ".btn-up", function () {
            let _dom = $(this).closest(".btn-update-cart");
            let _val = _dom.find("input.input-number").val();
            $(_dom)
                .find("input.input-number")
                .attr("value", parseInt(_val) + 1);
            $(_dom).trigger("change");
        });
        $(document).on("change", ".btn-update-cart", function () {
            let _this = $(this);
            let _tr = $(_this).closest("tr");
            let _cart_id = _this.closest("tr").attr("data-id");
            let _qty =
                _this.closest("tr").find("input.input-number").attr("value") ??
                1;
            if (_cart_id) {
                $.ajax({
                    url: window.APP_URL + "/ajax/cart", // URL của API
                    type: "POST", // Phương thức POST
                    data: {
                        cart_id: _cart_id,
                        action: "ajax_edit_to_cart",
                        qty: _qty,
                    }, // Chuyển đổi dữ liệu thành chuỗi JSON
                    dataType: "json",

                    success: function (data) {
                        $(_tr)
                            .find(".total_price")
                            .text(
                                data.data.total_price + " " + window.currency
                            );
                        console.log(data.data.total_cart);
                        $(".total-price-cart").text(
                            data.data.total_cart + " " + window.currency
                        );
                    },
                    error: function (error) {
                        // Xử lý lỗi
                        console.error("Error:", error);
                    },
                });
            }
        });
    };
    const _event_product = () => {
        // follow

        if ($("#ProductPhoto img").length > 0) {
            if ($(window).innerWidth() <= 580) {
                $("#ProductPhoto img").removeAttr("id");
            }
        }

        if ($(".related-slider").length > 0) {
            $(".related-slider").owlCarousel({
                navigation: true,
                pagination: false,
                autoPlay: false,
                items: 4,
                slideSpeed: 200,
                paginationSpeed: 1000,
                rewindSpeed: 1000,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [768, 2],
                itemsTabletSmall: [540, 2],
                itemsMobile: [360, 1],
            });
        }

        $(document).on("click", ".wish-list", function (e) {
            e.preventDefault();
            let _this = $(this);
            let product_id = $(this).attr("data-product-id");
            if (product_id) {
                $.ajax({
                    url: window.APP_URL + "/ajax/wishlist", // URL của API
                    type: "POST", // Phương thức POST
                    data: {
                        product_id: product_id,
                    }, // Chuyển đổi dữ liệu thành chuỗi JSON
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (error) {
                        // Xử lý lỗi
                        console.error("Error:", error);
                    },
                });
            }
        });
        if ($(".product-single___thumbnails").length > 0) {
            // $('.product-single__thumbnails').owlCarousel({
            //     navigation: true,
            //     pagination: false,
            //     autoPlay: 7000,
            //     items: 4,
            //     slideSpeed: 200,
            //     paginationSpeed: 1000,
            //     rewindSpeed: 1000,
            //     itemsDesktop: [1199, 5],
            //     itemsDesktopSmall: [979, 5],
            //     itemsTablet: [768, 5],
            //     itemsTabletSmall: [540, 5],
            //     itemsMobile: [360, 5],
            // });
            let carousel = $(".product-single___thumbnails");
            carousel.owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 7000,
                autoplaySpeed: 1000,
                slideSpeed: 200,
                responsive: {
                    0: {
                        items: 4,
                        nav: true,
                    },
                    600: {
                        items: 4,
                        nav: false,
                    },
                    1000: {
                        items: 7,
                        nav: true,
                        loop: false,
                    },
                },
            });
        }
    };
    const _event_payment = () => {
        if ($("#form_data_payment").length > 0) {
            let storedData = JSON.parse(localStorage.getItem("formData"));
            if (storedData) {
                $.each(storedData, function (index, field) {
                    $('[name="' + field.name + '"]').val(field.value);
                });
            }

            $("#form_data_payment").on("submit", function (e) {
                e.preventDefault();
                let _this = $(this);
                _this.find("button").attr("disabled", "disabled");
                _this.find(`input`).css({
                    border: "none",
                });

                _this
                    .find("input,select")
                    .removeClass("is-invalid")
                    .addClass("is-valid");

                _this.find(".error").each(function () {
                    $(this).html("");
                });
                let data = $(this).serializeArray();
                localStorage.setItem("formData", JSON.stringify(data));
                let _url = $(this).attr("action");
                let _method = $(this).attr("method");
                $.ajax({
                    url: _url, // URL của API
                    type: _method, // Phương thức POST
                    data: data, // Chuyển đổi dữ liệu thành chuỗi JSON
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            localStorage.clear();
                            $.notify(data.message, "success");
                            setTimeout(function () {
                                window.location.href = "/";
                            }, 3000);
                        } else {
                            $.notify(data.message, "error");
                            _this.find("button").removeAttr("disabled");
                        }
                    },
                    error: function (xhr) {
                        _this.find("button").removeAttr("disabled");
                        if (xhr.status === 403) {
                            $(".js-login-modal").trigger("click");
                        } else if (xhr.status === 422) {
                            // Xử lý lỗi xác thực từ Laravel
                            let errors = xhr.responseJSON.errors;
                            console.log(errors);
                            let errorMessages = [];
                            for (let field in errors) {
                                if (
                                    _this.find(`input[name="${field}"]`)
                                        .length > 0
                                ) {
                                    _this
                                        .find(`input[name="${field}"]`)
                                        .addClass("is-invalid");
                                    let _dom = _this
                                        .find(`input[name="${field}"]`)
                                        .closest(".form-control")
                                        .find(".invalid-feedback");
                                    $(_dom).append(
                                        '<span "> ' +
                                            errors[field][0] +
                                            " </span>"
                                    );
                                }
                            }
                            // reject(errorMessages);
                        } else {
                            console.log("Có lỗi xảy ra, vui lòng thử lại.");
                        }
                    },
                });
            });
        }
    };
    const _load_image = () => {
        // Gọi hàm khi thay đổi kích thước màn hình
        $(window).on("resize", function () {
            if ($(".image-banner").length > 0) {
                $(".image-banner").each(function () {
                    let mobileSrc = $(this).attr("data-src-mobile");
                    let tabletSrc = $(this).attr("data-src-table");
                    let desktopSrc = $(this).attr("data-src-desktop");
                    let src = "";

                    if (window.innerWidth <= 768) {
                        // Kích thước cho thiết bị di động
                        src = mobileSrc;
                    } else if (
                        window.innerWidth > 768 &&
                        window.innerWidth <= 1024
                    ) {
                        // Kích thước cho máy tính bảng
                        src = tabletSrc;
                    } else {
                        // Kích thước cho máy tính để bàn
                        src = desktopSrc;
                    }
                    $(this).find("img").attr("src", src);
                });
            }
        });
    };
    return {
        init: function () {
            _load_image();
            _cart();
            _event_home();
            _event_product();
            _event_payment();
        },
    };
})();

 
