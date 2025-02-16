"use strict";
document.addEventListener("DOMContentLoaded", function () {
    Comment.init();
});

let Comment = (function () {
    const _box_comment = $("#fbcomment");

    const _load_list_comment = () => {
        if (_box_comment.length > 0) {
            $(_box_comment).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            let data_id = _box_comment.attr("data-id");
            let type = _box_comment.attr("data-type");
            $.ajax({
                url: window.APP_URL + "/ajax/comment", // URL của API
                type: "GET", // Phương thức POST
                data: {
                    data_id: data_id,
                    type: type,
                }, // Chuyển đổi dữ liệu thành chuỗi JSON
                dataType: "Json",

                success: function (data) {
                    if (data.status == "success") {
                        _box_comment.html(data.html);
                    }
                },
                error: function (error) {
                    // Xử lý lỗi
                    console.error("Error:", error);
                },
            });
        }
    };

    const _load_page = () => {
        $(document).on("click", "#load_paginate", function () {
            let _this = $(this);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            let _limit = $(this).attr("limit");
            let _page = $(this).attr("page");
            let parent_id = $(this).attr("data-parent-id");
            let data_id = _box_comment.attr("data-id");
            let type = _box_comment.attr("data-type");

            $.ajax({
                url: window.APP_URL + "/ajax/list-comment", // URL của API
                type: "GET", // Phương thức POST
                data: {
                    data_id: data_id,
                    type: type,
                    parent_id: parent_id,
                    limit: _limit,
                    page: _page,
                }, // Chuyển đổi dữ liệu thành chuỗi JSON
                dataType: "json",
                success: function (data) {
                    if (_limit == data.count) {
                        _this.html("<span>Xem thêm</span>");
                        _this.attr("data-page", parseInt(_page) + 1);
                    } else {
                        _this.hide();
                    }
                    if (data.status == "success") {
                        $("#list_comment").append(data.html);
                    }
                },
                error: function (error) {
                    // Xử lý lỗi
                    console.error("Error:", error);
                },
            });
        });
    };
    const _load_event = () => {
        $(document).on("submit", ".form-submit-comment", function (e) {
            e.preventDefault();
            let _this = $(this);
            let data = $(this).serializeArray();
            let action = $(this).attr("action");
            let parent_id = $(this).find('input[name="parent_id"]').val();
            let method = $(this).attr("method");
            $.ajax({
                url: action, // URL của API
                type: method, // Phương thức POST
                data: data, // Chuyển đổi dữ liệu thành chuỗi JSON
                dataType: "json",
                success: function (respon) {
                    if (respon.status == "success") {
                        if (parent_id == 0) {
                            $("#list_comment").prepend(respon.html);
                        } else {
                            _this
                                .closest(".box_result")
                                .find("ul.child_replay")
                                .append(respon.html);
                        }
                    }
                    _this.find('[name="content"]').val("");
                },
                error: function (error) {
                    // Xử lý lỗi
                    console.error("Error:", error);
                },
            });
        });

        $(document).on("click", ".like-comment", function (e) {
            e.preventDefault();
            let _this = $(this);
            let id = $(this).attr("data-id");
            $.ajax({
                url: window.APP_URL + "/ajax/like-comment", // URL của API
                type: "POST", // Phương thức POST
                data: { id }, // Chuyển đổi dữ liệu thành chuỗi JSON
                dataType: "json",
                success: function (respon) {
                    _this.find(".count").html(respon.count);
                    _this.removeClass("like-comment");
                },
                error: function (xhr) {
                    if (xhr.status === 403) {
                        $(".js-login-modal").trigger("click");
                    }
                },
            });
        });

        $(document).on("click", ".replay_comment", function () {
            $(".form-comment-reply").hide();

            let _limit = $(this).attr("data-limit");
            let parent_id = $(this).attr("data-parent-id");
            let data_id = _box_comment.attr("data-id");
            let type = _box_comment.attr("data-type");

            let _dom = $(this)
                .closest(".result_comment")
                .find("ul.child_replay");

            $(_dom).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $.ajax({
                url: window.APP_URL + "/ajax/list-comment", // URL của API
                type: "GET", // Phương thức POST
                data: {
                    data_id: data_id,
                    type: type,
                    parent_id: parent_id,
                    limit: _limit,
                    sort: "asc",
                    page: 1,
                }, // Chuyển đổi dữ liệu thành chuỗi JSON
                dataType: "json",
                success: function (data) {
                    _dom.html(data.html);
                },
                error: function (error) {
                    // Xử lý lỗi
                    console.error("Error:", error);
                },
            });

            $(this)
                .closest(".result_comment")
                .find(".form-comment-reply")
                .removeClass("d-none")
                .show();
        });
    };
    const _check_auth = () => {
        $(document).on("focus", "[name='content']", function () {
            if (!window.is_authorized) {
                $(".js-login-modal").trigger("click");
            }
        });
    };
    return {
        init: function () {
            _load_list_comment();
            _load_event();
            _load_page();
            _check_auth();
        },
    };
})();
