var win = $(window),
    body = $("body"),
    doc = $(document),
    meta_csrf_token = $('meta[id="csrf_token"]'),
    csrf_cookie_name = "csrf_cookie_name",
    csrf_token_name = meta_csrf_token.attr("name"),
    csrf_token_hash = meta_csrf_token.attr("content"),
    method_modal = "",
    class_name = "post",
    slug_disable = false,
    option_TinyMCE = {
        height: "500",
        selector: "textarea.tinymce",
        entity_encoding: "raw",
        setup: function (editor) {
            editor.on("change", function (e) {
                var content = editor.getContent(); // Lấy nội dung hiện tại của TinyMCE
                var iframeMatch = content.match(
                    /&lt;iframe.*?&gt;&lt;\/iframe&gt;/
                ); // Tìm iframe mã hóa trong nội dung

                if (iframeMatch) {
                    // Giải mã thực thể HTML và chèn iframe vào nội dung
                    var decodedIframe = iframeMatch[0]
                        .replace(/&lt;/g, "<")
                        .replace(/&gt;/g, ">")
                        .replace(/&quot;/g, '"');
                    editor.setContent(
                        content.replace(iframeMatch[0], decodedIframe)
                    ); // Thay thế iframe mã hóa bằng iframe thực tế
                }  
                
                editor.save();
            });

            editor.on("ExecCommand", function (e) {
                if (e.command === "mceInsertContent") {
                    // Thêm timestamp vào URL ảnh sau khi upload
                    const images = editor.getDoc().querySelectorAll("img");
                    images.forEach(function (img) {
                        const src = img.getAttribute("src");
                        if (src && !src.includes("t=")) {
                            img.setAttribute(
                                "src",
                                src + "?t=" + new Date().getTime()
                            );
                        }
                    });
                }
            });
        },
        // setup: function (ed) {
        //     ed.on("DblClick", function (e) {
        //         if (e.target.nodeName === "IMG") {
        //             tinyMCE.activeEditor.execCommand("mceImage");
        //         }
        //     });

        //     ed.addButton("post_block_top", {
        //         type: "button",
        //         text: "Post Block Top",
        //         onclick: function () {
        //             ed.insertContent('[postblock id="top"]');
        //         },
        //     });

        //     ed.addButton("post_block_bottom", {
        //         type: "button",
        //         text: "Post Block Bottom",
        //         onclick: function () {
        //             ed.insertContent('[postblock id="bottom"]');
        //         },
        //     });
        // },
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker template",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern link image",
        ],
        toolbar1:
            "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2:
            "searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media code | forecolor backcolor",
        toolbar3:
            "table | removeformat | charmap emoticons | spellchecker | template restoredraft insertfile | post_block_top post_block_bottom",
        templates: [
            {
                title: "Textbox",
                description: "Tạo Textbox",
                url:
                    window.APP_URL +
                    "public/admin/plugins/tinymce/templates/text-box.html",
            },
        ],
        rel_list: [
            { title: "Do Follow", value: "dofollow" },
            { title: "No Follow", value: "nofollow" },
        ],
        menubar: false,
        element_format: "html",
        extended_valid_elements:
            "iframe[src|width|height|name|align], embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage]",
        toolbar_items_size: "small",
        relative_urls: false,
        remove_script_host: true,
        convert_urls: true,
        verify_html: false,
        style_formats: [
            { title: "Bold text", inline: "b" },
            { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
            { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
            { title: "Example 1", inline: "span", classes: "example1" },
            { title: "Example 2", inline: "span", classes: "example2" },
            { title: "Table styles" },
            { title: "Table row 1", selector: "tr", classes: "tablerow1" },
        ],
        file_browser_callback: function (field_name, url, type, win) {
            var x =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.getElementsByTagName("body")[0].clientWidth;
            var y =
                window.innerHeight ||
                document.documentElement.clientHeight ||
                document.getElementsByTagName("body")[0].clientHeight;

            var cmsURL =
                window.APP_URL +
                "/admin/filemanager?field_name=" +
                field_name;

            if (type === "image") {
                cmsURL += "&type=Images";
            } else {
                cmsURL += "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: "Filemanager",
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
            });
        },
    },
    datatables_columns = [];

var colors = ["#f44336", "#fbc02d", "#4caf50"];
var button_success = "btn m-btn--pill m-btn--air btn-outline-success";
var button_danger = "btn m-btn--pill m-btn--air btn-outline-danger";
var button_warning = "btn m-btn--pill m-btn--air btn-outline-warning";
var success = "form-group has-success";
var warning = "form-group has-warning";
var danger = "form-group has-danger";

var text_danger = "form-control text-danger";
var text_success = "form-control text-success";
var text_warning = "form-control text-warning";

var SEO = {
    meta_title: function () {
        let _this = $('input[name="meta_title"]');
        if (_this.length > 0) {
            _this.closest("div").removeClass();
            let c_title = _this.val().length;
            let l_title = $("span.count-title");
            $(l_title).html(c_title);
            if (c_title >= 40 && c_title <= 80) {
                _this.closest("div").addClass(success);
            } else if (c_title >= 25 && c_title < 40) {
                _this.closest("div").addClass(warning);
            } else {
                _this.closest("div").addClass(danger);
            }
            let seo_title = _this.val();
            $(".gg-title").html(seo_title);
        }
    },
    meta_description: function () {
        let _this = $('textarea[name="meta_description"]');
        if (_this.length > 0) {
            _this.closest("div").removeClass();
            let c_desc = _this.val().length;
            let l_desc = $("span.count-desc");
            $(l_desc).html(c_desc);
            if (c_desc >= 120 && c_desc <= 150) {
                _this.closest("div").addClass(success);
            } else if (c_desc >= 90 && c_desc < 120) {
                _this.closest("div").addClass(warning);
            } else {
                _this.closest("div").addClass(danger);
            }
            let seo_desc = _this.val();
            $(".gg-desc").html(seo_desc);
        }
    },
    meta_keyword: function () {
        let _this = $('input[name="meta_keyword"]');
        if (_this.length > 0) {
            _this.closest("div").removeClass();
            let c_key = _this.val().length;
            let l_key = $("span.count-key");
            $(l_key).html(c_key);
            if (c_key >= 10) {
                _this.closest("div").addClass(success);
            } else if (c_key >= 6 && c_key < 10) {
                _this.closest("div").addClass(warning);
            } else {
                _this.closest("div").addClass(danger);
            }
            let seo_key = _this.val();
            $(".gg-result").val(seo_key);
        }
    },
    generate_slug: function (title, ele) {
        let slug;
        if (slug_disable) {
            return;
        }
        slug = title.toLowerCase();
        slug = slug.replace(/\//gim, "-");
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");

        slug = slug.replace(/đ/gi, "d");
        slug = slug.replace(
            /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
            ""
        );
        // slug = slug.replace(/[^a-zA-Z0-9 ]/g, "");
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/\-\-\-\-\-/gi, "-");
        slug = slug.replace(/\-\-\-\-/gi, "-");
        slug = slug.replace(/\-\-\-/gi, "-");
        slug = slug.replace(/\-\-/gi, "-");
        slug = "@" + slug + "@";
        slug = slug.replace(/\@\-|\-\@|\@/gi, "");
        slug = slug.replace(/\s/g, "-");
        ele.val(slug);
    },
    init_slug: function () {
        let elementTitle = $('input[name="title"]');
        let elementSlug = $('input[name="slug"]');
        elementTitle.on("paste", function () {
            setTimeout(function () {
                SEO.generate_slug(elementTitle.val(), elementSlug);
            }, 500);
        });
        elementTitle.on("keyup", function () {
            SEO.generate_slug(elementTitle.val(), elementSlug);
        });
    },
    init: function () {
        SEO.init_slug();

        let cgg = $(".gg_1").text().split("").join("</span><span>");
        $(".gg_1").html(cgg);
        SEO.meta_title();
        SEO.meta_description();
        SEO.meta_keyword();
        $('input[name="meta_title"]').keyup(function () {
            SEO.meta_title($(this));
        });
        $('input[name="slug"]').keyup(function () {
            $(".gg-url").html(window.APP_URL + "/" + $(this).val());
        });
        $('input[name="meta_keyword"]').keyup(function () {
            SEO.meta_keyword($(this));
        });
        $('textarea[name="meta_description"]').keyup(function () {
            SEO.meta_description($(this));
        });
        $(".gg-url").html(window.APP_URL + $('input[name$="slug"]').val());
    },
};

function generate_slug_from_title(title) {
    let slug;
    slug = title.toLowerCase();
    slug = slug.replace(/\//gim, "-");
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    slug = slug.replace(/đ/gi, "d");
    // slug = slug.replace(/[^a-zA-Z0-9 ]/g, "");
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");
    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");
    slug = slug.replace(/\s/g, "-");
    return slug;
}

// This notice is used as a tooltip.
var make_tooltip = function () {
    tooltip = new PNotify({
        title: "Tooltip",
        text: "I'm not in a stack. I'm positioned like a tooltip with JavaScript.",
        hide: false,
        buttons: {
            closer: false,
            sticker: false,
        },
        history: {
            history: false,
        },
        animate_speed: 100,
        opacity: 0.9,
        icon: "ui-icon ui-icon-comment", // Setting stack to false causes PNotify to ignore this notice when positioning.
        stack: false,
        auto_display: false,
    });
    // Remove the notice if the user mouses over it.
    tooltip.get();
    // tooltip.get().mouseout(function(){
    //     tooltip.remove();
    // });
};
// I put it in a function so I could show the source easily.
make_tooltip();
// Hàm thông báo:
var Notification_Static = {
    success: function (message) {
        PNotify.prototype.options.styling = "bootstrap3";
        new PNotify({
            title: "Thành công",
            type: "success",
            icon: "glyphicon glyphicon-ok",
            text: message,
            remove: true,
            delay: 1000, // Thời gian hiển thị thông báo (2 giây)
            hide: true, // Đảm bảo tự ẩn
            mouseReset: true,
            placement: {
                from: "top",
                align: "right",
            },
        });
    },
    warning: function (message) {
        PNotify.prototype.options.styling = "bootstrap3";
        new PNotify({
            title: "Cảnh báo",
            type: "warning",
            icon: "glyphicon glyphicon-warning-sign",
            text: message,
            remove: true,
            delay: 1000, // Thời gian hiển thị thông báo (2 giây)
            hide: true,
            placement: {
                from: "top",
                align: "right",
            },
            icon_type: "class",
        });
    },
    errors: function (message, status = "") {
        PNotify.prototype.options.styling = "bootstrap3";
        new PNotify({
            title: "Lỗi " + status,
            type: "error",
            icon: "glyphicon glyphicon-remove-sign",
            text: message,
            remove: true,
            delay: 1000, // Thời gian hiển thị thông báo (2 giây)
            hide: true,
            placement: {
                from: "top",
                align: "right",
            },
        });
    },
};

/*Function CRUD Modal*/
var AJAX_CRUD_MODAL = {
    open: function () {
        let modal_form = $("#modal_form");
        modal_form.on("shown.bs.modal", function (e) {
            // body.addClass('fixed');
            SEO.init();
            if ($(this).find("input").length > 0) {
                FileUpload.init(this);
            }
            let diaLogScroll = modal_form,
                diaLogScrollHeight = diaLogScroll
                    .find(".modal-header")
                    .height(),
                diaLogScrollFooter = diaLogScroll.find(".modal-footer");
            diaLogScroll
                .find(".modal-footer")
                .addClass("modal-footer-top-button");
            diaLogScroll.scroll(function () {
                if (diaLogScroll.scrollTop() <= diaLogScrollHeight + 35) {
                    diaLogScrollFooter.addClass("modal-footer-top-button");
                } else {
                    diaLogScrollFooter.removeClass("modal-footer-top-button");
                }
            });
            setTimeout(function () {
                AutoloadDataService.init($("#modal_form"));
            }, 1000);
        });
    },
    close: function () {
        $("#modal_form").on("hidden.bs.modal", function (e) {
            body.removeClass("fixed");
            window.onbeforeunload = null;
            $(this).find("form").trigger("reset");
            $(this).find(".parent-upload input[type=hidden]").remove();
            $(this)
                .find("input[type=hidden]")
                .each(function (index, element) {
                    if (!$(element).hasClass("not_reload")) $(element).val("");
                });
            FileUpload.destroy(this);
            $(this)
                .find("input.not_reload")
                .each(function (index, e) {});

            $(this)
                .find(".upload-box")
                .each(function (index, e) {
                    $(e).find("img").attr("src", "").removeClass("show");
                    $(e).find('input[type="hidden"]').remove();
                });
            $(this).find(".gallery-upload .gallery-list").remove();

            $(this).find(".select2_suggest").empty().trigger("change");
            $(this).find("div.form-control-feedback").remove();
            $(this).find('[name="username"]').attr("disabled", false);
            $(this).find(".form-group").removeClass("has-danger");

            $(this).find('ul[role="tablist"] li a').removeClass("active show");
            $(this)
                .find('ul[role="tablist"] li:first-child a')
                .trigger("click")
                .addClass("active show");

            for (var j = 0; j < tinyMCE.editors.length; j++) {
                tinymce.get(tinyMCE.editors[j].id).setContent("");
            }
            $(this).find(".btnSave").attr("disabled", false);
        });
    },
    disable_close: function () {
        $("#modal_form").modal({
            backdrop: "static",
            keyboard: false,
            show: false,
        });
    },
    add: function () {
        slug_disable = false;
        // if (class_name == 'post' || class_name == 'page') {
        //     tinymce.get('content').setContent('');
        // }
        // if (class_name == 'story') {
        //     tinymce.get('description').setContent('');
        // }
        $("#modal_form").modal("show");
        return false;
    },
    edit: function (func) {
        slug_disable = true;

        return func();
    },
    viewRevision: function (func) {
        return func();
    },
    save: function () {
        let modal_form = $("#modal_form");
        let url = modal_form.find("form").attr("data-action");
        let method = modal_form.find("form").attr("data-method");
        modal_form.find(".btnSave").attr("disabled", true);

        if (tinyMCE.editors.length > 0) {
            for (let j = 0; j < tinyMCE.editors.length; j++) {
                let idInput = tinyMCE.editors[j].id;
                let content = tinymce.get(idInput).getContent();
                $('[name="' + idInput + '"]').val(content);
            }

            AJAX_CRUD_MODAL.getCountWordTinymce();
        }
        $.ajax({
            url: url,
            type: method,
            data: modal_form.find("form").serialize(),
            dataType: "JSON",
            beforeSend: function () {},
            success: function (data) {
                $(".form-control-feedback").remove();
                $(".form-group").removeClass("has-danger");
                if (data.status == "success") {
                    Notification_Static.success(data.message);
                } else if (data.status == "warning") {
                    Notification_Static.warning(data.message);
                }
                modal_form.modal("hide");
                modal_form.find(".btnSave").attr("disabled", false);
                DatatablesServerSide.initReload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                modal_form.find(".btnSave").attr("disabled", false);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                let body = jqXHR.responseJSON.message;
                Notification_Static.errors(jqXHR.status + ": " + body);
            },
        });
        return false;
    },
    saveDraft: function () {
        let modal_form = $("#modal_form");
        let url;

        modal_form.find(".btnSave").attr("disabled", true);
        modal_form.find(".btnSaveDraft").attr("disabled", true);
        let id = modal_form.find('input[name="id"]').val();
        if (modal_form.find('input[name="id"]').val() == 0) {
            url = url_ajax_add_post_private;
        } else {
            url = url_ajax_add_draft;
        }

        if (tinyMCE.editors.length > 0) {
            for (let j = 0; j < tinyMCE.editors.length; j++) {
                let idInput = tinyMCE.editors[j].id;
                let content = tinymce.get(idInput).getContent();
                $('[name="' + idInput + '"]').val(content);
            }

            AJAX_CRUD_MODAL.getCountWordTinymce();
        }
        $.ajax({
            url: url,
            type: "POST",
            data: modal_form.find("form").serialize(),
            dataType: "JSON",
            beforeSend: function () {
                $(".form-control-feedback").remove();
                $(".form-group").removeClass("has-danger");
            },
            success: function (data) {
                toastr[data.type](data.message);
                if (data.type === "warning") {
                    $.each(data.validation, function (i, val) {
                        let input = $('[name^="' + i + '"]');
                        if (input.parent().hasClass("input-group")) {
                            input.closest(".input-group").after(val);
                        } else {
                            input.after(val);
                        }
                        input.addClass("form-control-danger");
                        input.closest(".form-group").addClass("has-danger");
                    });
                } else {
                    modal_form.find('input[name="id"]').val(data.post_id);
                }
                modal_form.find(".btnSave").attr("disabled", false);
                modal_form.find(".btnSaveDraft").attr("disabled", false);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                Notification_Static.errors(jqXHR.status + ": " + errorThrown);
                modal_form.find(".btnSave").attr("disabled", false);
                modal_form.find(".btnSaveDraft").attr("disabled", false);
            },
        });
        return false;
    },
    delete: function () {
        return false;
    },
    tinymce: function () {
        tinymce.init(option_TinyMCE);
    },
    getCountWordTinymce: function () {
        if ($('[name="total_word"]').length > 0) {
            let wordcount = tinyMCE.activeEditor.plugins.wordcount;
            $('[name="total_word"]').val(wordcount.getCount());
        }
    },
    summernote: function () {
        $(".summernote").summernote({ height: 150 });
    },
    init: function () {
        AJAX_CRUD_MODAL.disable_close();
        AJAX_CRUD_MODAL.open();
        AJAX_CRUD_MODAL.close();

        // doc.on('click', '.btnReload', function (e) {
        //     e.preventDefault();
        //     AJAX_DATATABLES.reload();
        // });

        doc.on("click", ".btnAddForm", function (e) {
            e.preventDefault();
            let method = $(this).data("method");
            let action = $(this).data("action");
            console.log(true);
            $("#modal_form")
                .find("form")
                .attr("data-method", method)
                .attr("data-action", action);
            AJAX_CRUD_MODAL.add();
        });
        doc.on("click", ".btnDeleteAll", function (ev) {
            ev.preventDefault();
            let listChecked = table.getSelectedRecords();
            if (listChecked.length == 0) {
                toastr.warning("Vui lòng chọn bản ghi bạn muốn xóa !");
                return false;
            }

            swal({
                title: "Bạn có chắc chắn xóa những bản ghi này ?",
                text: "Bạn không thể khôi phục những bản ghi này sau khi xóa!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Đúng, Xóa ngay !",
                cancelButtonText: "Không, Hủy nó !",
                reverseButtons: !0,
            }).then(function (e) {
                let ids = [];
                $.each(listChecked, function (i, v) {
                    ids.push($(v).find('input[type="checkbox"]').val());
                });
                if (ids) {
                    if (e.value) {
                        $.each(ids, function (index) {
                            $.ajax({
                                url: url_ajax_delete,
                                type: "POST",
                                data: { id: ids[index] },
                                dataType: "JSON",
                                success: function (data) {
                                    if (data.type) {
                                        toastr[data.type](data.message);
                                    }
                                    if (data.type === "success") {
                                        e.value
                                            ? swal(
                                                  "Xóa thành công!",
                                                  "Những bản ghi bạn chọn đã được xóa.",
                                                  "success"
                                              )
                                            : "cancel" === e.dismiss &&
                                              swal(
                                                  "Hủy bỏ thành công !",
                                                  "Bản ghi của bạn đã được an toàn :)",
                                                  "warning"
                                              );
                                    }
                                    AJAX_DATATABLES.reload();
                                },
                                error: function (
                                    jqXHR,
                                    textStatus,
                                    errorThrown
                                ) {
                                    Notification_Static.errors(
                                        jqXHR.status + ": " + errorThrown
                                    );
                                    console.log(errorThrown);
                                    console.log(textStatus);
                                    console.log(jqXHR);
                                },
                            });
                        });
                    } else {
                        Notification_Static.warning(
                            "Bản ghi của bạn đã được an toàn !!!"
                        );
                    }
                }
            });
        });

        doc.on("change", ".updateSort", function (ev) {
            ev.preventDefault();
            let id = $(this).closest("tr").find('input[type="checkbox"]').val();
            let field = $(this).attr("name");
            let value = $(this).val();
            $.ajax({
                url: url_ajax_update_field,
                type: "POST",
                data: { id: id, field: field, value: value },
                dataType: "JSON",
                success: function (data) {
                    if (data.type) {
                        toastr[data.type](data.message);
                    }
                    AJAX_DATATABLES.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                    console.log(textStatus);
                    console.log(jqXHR);
                },
            });
        });

        doc.on("click", ".btnSave", function (e) {
            e.preventDefault();
            AJAX_CRUD_MODAL.save();
        });
        doc.on("click", ".btnSaveDraft", function (e) {
            e.preventDefault();
            AJAX_CRUD_MODAL.saveDraft();
        });
        $(".number").keyup(function () {
            var number = $(this)
                .val()
                .replace(/[^0-9]/g, "");
            $(this).val(number);
        });
    },
};
/*Function CRUD Modal*/
/*Đây là các Function để dùng chung*/
var FUNC = {
    getParam: function (param) {
        let url_string = window.location.href;
        let url = new URL(url_string);
        let c = url.searchParams.get(param);
        return c;
    },
    showFileManger: function () {
        let url_string = window.location.href;
        let url = new URL(url_string);
        let c = url.searchParams.get(param);
        return c;
    },
    imgError: (image) => {
        image.onerror = "";
        image.src = window.MEDIA_URL + "/public/admin/images/default.jpg";
        return true;
    },
    getImageThumb: (thumbnail) => {
        let trimmedThumbnail = thumbnail.replace(/^\/|\/$/g, "");
        let src = window.MEDIA_URL + trimmedThumbnail;
        return src;
    },

    itemGallery: function (name, urlImageResponse, index = 0) {
        return `<div class="upload_box_item mr-2 mb-1" data-name="${name}" >
                    <div class=" upload-container d-block m-0" data-field-name="${name}[${index}][thumb]">
                    <div class="upload-box">
                        <img class="preview-image show" alt="Preview"
                                                src="${FUNC.getImageThumb(
                                                    urlImageResponse
                                                )}">
                        <input type="hidden" name="${name}[${index}][thumb]" value="${urlImageResponse}">
                    </div>
                    </div>
                    <input type="number" name="${name}[${index}][position]" value="${index}" class="w-100">
                    <span class='fa fa-times removeInputImages'></span>
                </div>`;
    },

    showGallery: function (element, name, data) {
        if (data !== null && data.length > 0) {
            let length = $(element).find(".upload_box_item").length;
            $.each(data, function (i, v) {
                $(element).append(FUNC.itemGallery(name, v, length + i));
            });
        }
    },

    getCookie: function (name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    },
    getYoutubeKey: function (url) {
        var rx =
            /^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/;
        if (url) var arr = url.match(rx);
        if (arr) return arr[1];
    },
    ajaxShowRequest: function (formData, jqForm, options) {
        jqForm
            .find('[type="submit"]')
            .append(
                '<i class="fa fa-spinner fa-spin ml-2" style="fonts-size:24px;color: #ffffff;"></i>'
            );
        if (tinyMCE.editors.length > 0) {
            for (let j = 0; j < tinyMCE.editors.length; j++) {
                let idInput = tinyMCE.editors[j].id;
                let content = tinymce.get(idInput).getContent();
                $('[name="' + idInput + '"]').val(content);
            }
        }
        //let queryString = $.param(formData);
        return true;
    },

    clearCacheDb: function () {
        $.ajax({
            type: "GET",
            url: base_admin_url + "setting/ajax_clear_cache_db",
            dataType: "json",
            success: function (response) {
                if (typeof response.type !== "undefined") {
                    toastr[response.type](response.message);
                }
            },
        });
        return false;
    },
    clearCacheFile: function () {
        $.ajax({
            type: "GET",
            url: base_admin_url + "setting/delete_cache_file",
            dataType: "json",
            success: function (response) {
                if (typeof response.type !== "undefined") {
                    toastr[response.type](response.message);
                }
            },
        });
        return false;
    },
    clearCacheImage: function () {
        $.ajax({
            type: "GET",
            url: base_admin_url + "setting/ajax_clear_cache_image",
            dataType: "json",
            success: function (response) {
                if (typeof response.type !== "undefined") {
                    toastr[response.type](response.message);
                }
            },
        });
        return false;
    },
};
/*Đây là các Event Function để dùng chung*/
var UI = {
    activeMenu: function () {
        $('ul>li a[href="' + window.location.href + '"]')
            .parent()
            .addClass("m-menu__item--active")
            .closest(".m-menu__item--submenu")
            .addClass("m-menu__item--open m-menu__item--expanded");
    },
    ajaxFormSettingSubmit: function () {
        $('form[method="post"]').ajaxForm({
            url: url_ajax_setting_update,
            beforeSubmit: FUNC.ajaxShowRequest, // pre-submit callback
            success: FUNC.ajaxShowResponse, // post-submit callback
            type: "POST", // 'get' or 'post', override for form's 'method' attribute
            dataType: "JSON", // 'xml', 'script', or 'json' (expected server response type)
            clearForm: false, // clear all form fields after successful submit
            resetForm: true, // reset the form after successful submit
        });
    },
    ajaxFormSubmit: function () {
        $('form[method="post"]').ajaxForm({
            //target:        '#output1',   // target element(s) to be updated with server response
            beforeSubmit: FUNC.ajaxShowRequest, // pre-submit callback
            success: FUNC.ajaxShowResponse, // post-submit callback
            type: "POST", // 'get' or 'post', override for form's 'method' attribute
            dataType: "JSON", // 'xml', 'script', or 'json' (expected server response type)
            clearForm: false, // clear all form fields after successful submit
            resetForm: true, // reset the form after successful submit
            // $.ajax options can be used here too, for example:
        });
    },

    bootstrapSwitch: function () {
        $("[data-switch=true]").bootstrapSwitch();
    },
    init: function () {
        UI.activeMenu();
        // UI.bootstrapSwitch();
    },
};
jQuery(function ($) {
    UI.init();
});

var FileUpload = (function () {
    // Register FilePond plugins
    FilePond.registerPlugin(FilePondPluginImagePreview);

    var ponds = [];

    var _componentFileUpload = function (dom) {
        if (!$ || !FilePond) {
            return;
        }

        // Initialize FilePond for each input with class 'document_upload'
        $(dom)
            .find(".document_upload")
            .each(function () {
                const inputElement = this;
                let self = $(this);

                let parentUpload = $(inputElement).closest(".parent-upload");
                let isMultiUpload = $(inputElement).attr("multiple")
                    ? true
                    : false;
                let fieldName = parentUpload.attr("data-field");
                let files = [];
                if (!isMultiUpload) {
                    let _file = $(parentUpload)
                        .find(`input[name="${fieldName}"]`)
                        .val();
                    if (_file && _file != "") files.push(filesConfig(_file));
                } else {
                    $(parentUpload)
                        .find(`input[name="${fieldName}"]`)
                        .each(function () {
                            let _file = $(this).val();
                            files.push(filesConfig(_file));
                        });
                }

                const pond = FilePond.create(inputElement, {
                    files: files,
                    allowMultiple: inputElement.hasAttribute("multiple"),
                    maxParallelUploads: 10,
                    checkValidity: true,
                    forceRevert: true,
                    server: {
                        url: "",
                        timeout: 7000,
                        checkValidity: true,
                        forceRevert: true,
                        process: {
                            url: window.SERVICE_UPLOAD_FILE,
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf_token"]'
                                ).attr("content"),
                            },
                            withCredentials: false,
                            onload: (response) => {
                                response = JSON.parse(response);
                                if (response.error) {
                                    alert(response.message);
                                    return;
                                }
                                parentUpload.append(
                                    `<input type="hidden" name="${fieldName}" value="${response.path}">`
                                );
                                return response.path;
                            },
                            onerror: (response) => {
                                alert("Lỗi Upload: " + response);
                            }, //,
                        },
                        revert: null,
                        restore: null,
                        load: window.MEDIA_URL + "/",
                        fetch: null,
                    },
                    onremovefile: (error, file) => {
                        files = self.filepond("getFiles");
                        // xoa input file cu
                        parentUpload
                            .find(`input[name="${fieldName}"]`)
                            .remove();
                        $.each(files, function (idx, item) {
                            parentUpload.append(
                                `<input type="hidden" name="${fieldName}" value="${item.serverId}">`
                            );
                        });
                    },
                });
                ponds.push(pond);
            });
        console.log("FilePond instances đã được khởi tạo.");
    };
    var filesConfig = function (url) {
        return {
            source: decodeURIComponent(url),
            options: {
                type: "local",
            },
        };
    };
    var _destroyFilePond = function (dom) {
        // Destroy all FilePond instances
        ponds.forEach((pond) => {
            pond.destroy();
        });
        ponds = [];
        console.log("FilePond instances đã được phá hủy.");
    };

    return {
        init: function (parentDom) {
            _componentFileUpload(parentDom);
        },
        destroy: function (parentDom) {
            _destroyFilePond(parentDom);
        },
    };
})();

/* ------------------------------------------------------------------------------
 *
 *  # Fixed Columns extension for Datatables
 *
 *  Demo JS code for datatable_extension_fixed_columns.html page
 *
 * ---------------------------------------------------------------------------- */

// Setup module
// ------------------------------

const AutoloadDataService = (function () {
    var objSelect2Suggest = {
        category: {
            url: window.APP_URL + "/admin/ajax/category",
            formated: "$(title)",
            id: "id",
            // search_param : "title",
            query: ["type", "is_status", "id"],
            version: 2,
        },

        brand: {
            url: window.APP_URL + "/admin/ajax/brand",
            formated: "$(title)",
            id: "id",
            search_param: "title",
            query: ["is_status"],
        },
        producer: {
            url: window.APP_URL + "/admin/ajax/producer",
            formated: "$(title)",
            id: "id",
            search_param: "title",
            query: ["is_status"],
        },
        post: {
            url: window.APP_URL + "/admin/ajax/post",
            formated: "$(title)",
            id: "id",
            search_param: "title",
            query: ["is_status"],
        },
        product: {
            url: window.APP_URL + "/admin/ajax/product",
            formated: "$(title)",
            id: "id",
            search_param: "title",
            query: ["is_status"],
        },
        page: {
            url: window.APP_URL + "/admin/ajax/page",
            formated: "$(title)",
            id: "id",
            search_param: "title",
            query: ["is_status"],
        },
        menu: {
            url: window.APP_URL + "/admin/ajax/menu",
            formated: "$(title)",
            id: "id",
            search_param: "title",
            query: ["is_status"],
        },
    };
    var arrDomAutoFill = [
        {
            url: window.APP_URL + "/admin/ajax/category",
            dom: ".em-category",
            attr: "data-id",
            formated: "$(title)",

            fk: "id",
        },

        {
            url: window.APP_URL + "/admin/ajax/brand",
            dom: ".em-brand",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },
        {
            url: window.APP_URL + "/admin/ajax/product",
            dom: ".em-product",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },

        {
            url: window.APP_URL + "/admin/ajax/producer",
            dom: ".em-producer",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },

        {
            url: window.APP_URL + "/admin/ajax/menu",
            dom: ".em-menu",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },
        {
            url: window.APP_URL + "/admin/ajax/post",
            dom: ".em-post",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },
        {
            url: window.APP_URL + "/admin/ajax/page",
            dom: ".em-page",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },
    ];

    function formatReplace(tpl, data) {
        return tpl.replace(/\$\(([^\)]+)?\)/g, function ($1, $2) {
            if (!data[$2] || data[$2] == "null") {
                return "";
            }
            return data[$2];
        });
    }

    function stringToSlug(str) {
        // remove accents
        var from =
                "àáãảạăằắẳẵặâầấẩẫậèéẻẽẹêềếểễệđùúủũụưừứửữựòóỏõọôồốổỗộơờớởỡợìíỉĩịäëïîöüûñçýỳỹỵỷ",
            to =
                "aaaaaaaaaaaaaaaaaeeeeeeeeeeeduuuuuuuuuuuoooooooooooooooooiiiiiaeiiouuncyyyyy";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(RegExp(from[i], "gi"), to[i]);
        }

        str = str
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\-]/g, "-")
            .replace(/-+/g, "-");

        return str;
    }
    var replaceData = function (parentDom) {
        $.each(arrDomAutoFill, function (idx, item) {
            var focusDom = parentDom.find(item.dom);
            if (!focusDom.length) {
                return true;
            }

            /////////// FIX TAM CHO CAC DOM DANG CHAY ///////////

            /////////////  END //////////////////

            //if (item.pquery) {
            var arrId = [];
            focusDom.each(function () {
                var selfDom = $(this);
                if (selfDom.prop("tagName") == "SELECT") {
                    selfDom.find("option").each(function () {
                        var v = $(this).val();
                        if (v && $.inArray(v, arrId) == -1) {
                            arrId.push(v);
                        }
                    });
                } else {
                    var v = selfDom.attr(item.attr);

                    if (v && $.inArray(v, arrId) == -1) {
                        arrId.push(v);
                    }
                }
            });
            if (!arrId.length) {
                return;
            }
            var count = 1;
            if (arrId.length > 200) {
                // lay so lam tron len
                count = Math.ceil(arrId.length / 200);
            }
            for (i = 1; i <= count; i++) {
                var objParams = {};

                var inqId = arrId.slice((i - 1) * 200, 200 * i);

                objParams[item.fk] = inqId;

                //replace url arg
                var urlQuery = item.url;
                if (item.url_arg) {
                    $.each(item.url_arg, function (k, v) {
                        urlQuery = urlQuery.replace(
                            "{" + k + "}",
                            objParams[v]
                        );
                        delete objParams[v];
                    });
                }
                var dataGet = {};
                if (!$.isEmptyObject(objParams)) {
                    dataGet = { params: objParams, limit: 1000 };
                }
                // ktra query bat buoc

                $.ajax({
                    url: urlQuery,
                    type: "GET",
                    dataType: "json",
                    // xhrFields: {
                    //   withCredentials: true
                    // },
                    data: dataGet,
                    contentType:
                        "application/x-www-form-urlencoded; charset=UTF-8",
                    // beforeSend: function(xhr) {
                    //     //console.log('test',xhr);
                    // },

                    success: function (response) {
                        if (response.error) {
                            ////console.log(data);
                            return false;
                        }
                        var new_str = item.formated;
                        var new_link = item.link;
                        var objData = {};
                        objLink = {};
                        $.each(response.data, function (key, value) {
                            objData[value[item.fk]] = value;
                        });
                        focusDom.each(function () {
                            if ($(this).prop("tagName") == "SELECT") {
                                var selectData = $(this);
                                var tmp = $(this).attr("data-format")
                                    ? $(this).attr("data-format")
                                    : new_str;
                                selectData
                                    .find("option")
                                    .each(function (index, element) {
                                        var v = $(element).val();

                                        if (objData[v]) {
                                            var replaced = formatReplace(
                                                tmp,
                                                objData[v]
                                            );
                                            let newOptionCo = new Option(
                                                replaced,
                                                v,
                                                true,
                                                true
                                            );
                                            $(element).replaceWith(newOptionCo);
                                        }
                                    });
                                $(selectData).trigger("change");
                            } else {
                                var v = $(this).attr(item.attr);
                                if (objData[v]) {
                                    var tmp = $(this).attr("data-format")
                                        ? $(this).attr("data-format")
                                        : new_str;
                                    if (new_link) {
                                        $(this).html(
                                            '<a href="' +
                                                formatReplace(
                                                    new_link,
                                                    objData[v]
                                                ) +
                                                '" class="load_not_ajax" target="_blank">' +
                                                formatReplace(tmp, objData[v]) +
                                                "</a>"
                                        );
                                    } else {
                                        $(this).text(
                                            formatReplace(tmp, objData[v])
                                        );
                                    }
                                }
                            }
                        });
                    },
                    error: function () {},
                });
            }
        });
    };

    const VERSION = 1; // Đặt phiên bản cho cơ sở dữ liệu
    const dbName = "ERPDBV4"; // Tên cơ sở dữ liệu
    //luc them ojectstorename cần tăng version lên
    const objectStoreNames = [
        "em-profile",
        "em-class",
        "em-branch",
        "em-department",
        "em-brand",
        "em-course",
        "em-sys-city",
        "em-position",
        "em-job-title",
    ]; // Danh sách các tên ObjectStore
    const CLEAR_DELAY = 3 * 24 * 60 * 60 * 1000; //Thời gian trì hoãn xóa dữ liệu

    let db = null; // Đối tượng để lưu trữ kết nối đến cơ sở dữ liệu

    // Mở cơ sở dữ liệu và lưu trữ kết nối
    function openIndexedDB() {
        return new Promise((resolve, reject) => {
            if (db) {
                resolve(db);
                return;
            }

            const request = indexedDB.open(dbName, VERSION);

            request.onupgradeneeded = function (event) {
                const db = event.target.result;
                objectStoreNames.forEach((storeName) => {
                    if (!db.objectStoreNames.contains(storeName)) {
                        db.createObjectStore(storeName, {
                            keyPath: "_id",
                            autoIncrement: true,
                        });
                    }
                });
            };

            request.onsuccess = function (event) {
                db = event.target.result;
                resolve(db);
            };

            request.onerror = function (event) {
                reject(`IndexedDB error: ${event.target.errorCode}`);
            };
        });
    }

    // Lấy dữ liệu từ một object store trong cơ sở dữ liệu cụ thể
    function getDataFromIndexedDB(objectStoreName, selectedId) {
        return new Promise((resolve, reject) => {
            if (!db) {
                return reject("Database is not initialized");
            }

            const transaction = db.transaction([objectStoreName], "readonly");
            const objectStore = transaction.objectStore(objectStoreName);
            var id = Number(selectedId);
            if (isNaN(id) || id <= 0) {
                // Kiểm tra xem id có phải là số và lớn hơn 0
                id = 0;
            }
            const request = objectStore.get(id);

            request.onsuccess = (event) => {
                resolve(request.result ? request.result : null);
            };

            request.onerror = (event) => {
                reject("Error querying IndexedDB");
            };
        });
    }

    // Lưu dữ liệu vào một object store trong cơ sở dữ liệu cụ thể
    function saveDataToIndexedDB(objectStoreName, id, data) {
        objectStoreName = String(objectStoreName).replace(/\./g, "");
        return new Promise((resolve, reject) => {
            if (!db) {
                return reject("Database is not initialized");
            }

            const transaction = db.transaction([objectStoreName], "readwrite");
            const objectStore = transaction.objectStore(objectStoreName);
            const request = objectStore.put({ _id: id, ...data });

            request.onsuccess = () => {
                resolve();
            };

            request.onerror = (event) => {
                reject(`Error saving to IndexedDB: ${event.target.errorCode}`);
            };
        });
    }

    // Hàm cập nhật DOM với dữ liệu
    function updateDomWithData(focusDom, objData, item) {
        focusDom.each(function () {
            if ($(this).prop("tagName") == "SELECT") {
                const selectData = $(this);
                const tmp = $(this).attr("data-format") || item.formated;
                selectData.find("option").each(function () {
                    const v = $(this).val();
                    if (objData[v]) {
                        const replaced = formatReplace(tmp, objData[v]);
                        $(this).text(replaced);
                        setTimeout(() => {
                            selectData.trigger("change_select2");
                        }, 1000);
                    }
                });
                selectData.trigger("change");
            } else {
                const v = $(this).attr(item.attr);
                if (objData[v]) {
                    const tmp = $(this).attr("data-format") || item.formated;
                    if (item.link) {
                        $(this).html(
                            `<a href="${formatReplace(
                                item.link,
                                objData[v]
                            )}" class="load_not_ajax" target="_blank">
                                ${formatReplace(tmp, objData[v])}
                            </a>`
                        );
                    } else {
                        $(this).text(formatReplace(tmp, objData[v]));
                    }
                }
            }
        });
    }

    // Hàm gửi yêu cầu AJAX
    function ajaxRequest(url, dataGet, item) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: dataGet,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",

                success: function (response) {
                    resolve(response);
                },
                error: function (error) {
                    reject(error);
                },
            });
        });
    }

    var selectData = function (parentDom) {
        var __cache = [];
        parentDom.find(".select2_suggest").each(async function () {
            var self = $(this);
            await loadSelectData(self);
            $(this).on("select2:unselect", function (e) {
                if (!$(this).prop("multiple")) {
                    $(this).val(null).trigger("change");
                    console.log("select2:unselect set null");
                }
                $(this).find(`option[value="${e.params.data.id}"]`).remove();
            });

            $(this).bind("change_select2", function (e) {
                console.log($(this).val());

                var getID = $(this).select2("data");
                //console.log(getID[0]['_resultId']);
                var resultID = getID[0]["_resultId"];

                var res = resultID.split("-result-");

                //.text("TEST");
                $("#" + res[0] + "-container").html(
                    $("#" + res[0] + "-container")
                        .find("span")
                        .prop("outerHTML") + self.find("option:selected").text()
                );
            });
        });
    };

    var loadSelectData = function (current_dom, option = {}) {
        var dataTable = option.module || current_dom.attr("data-module");
        var showType = option.show || current_dom.attr("data-show");
        if (!dataTable) {
            return false;
        }
        var objData = objSelect2Suggest[dataTable];

        if (typeof objSelect2Suggest == "undefined" || !objData) {
            console.log("Suggest data" + dataTable + " not found");
            return false;
        }
        var urlLoad = objData.url || "";
        if (!urlLoad) {
            console.log("Thieu config cho suggest");
            return false;
        }
        var objParams = {};
        if (typeof option.query != "undefined") {
            $.each(option.query, function (qidx, qkey) {
                if (typeof objData["url_to_" + qidx] != "undefined") {
                    urlLoad = formatReplace(objData["url_to_" + qidx], {
                        [qidx]: qkey,
                    });
                } else {
                    if (objData.version == 2) {
                        objParams[qidx] = qkey;
                    } else {
                        if (typeof qkey == "object") {
                            objParams[qidx] = { inq: qkey };
                        } else {
                            objParams[qidx] = { eq: qkey };
                        }
                    }
                }
            });
        } else if (typeof objData.query != "undefined") {
            $.each(objData.query, function (qidx, qkey) {
                var queryKey = qkey;
                if (qkey == "_id") {
                    queryKey = "id";
                }
                var objQuery = current_dom.attr("data-query-" + queryKey);
                if (objQuery) {
                    if (typeof objData["url_to_" + qkey] != "undefined") {
                        urlLoad = formatReplace(objData["url_to_" + qkey], {
                            [qkey]: objQuery,
                        });
                    } else {
                        /////////// API MOI ///////////
                        if (objData.version == 2) {
                            if (objQuery.indexOf(",") > 0) {
                                objQuery = objQuery.split(",");
                            }
                            objParams[qkey] = objQuery;
                        } else {
                            if (objQuery.indexOf(",") > 0) {
                                objQuery = objQuery.split(",");
                                objParams[qkey] = { inq: objQuery };
                            } else {
                                objParams[qkey] = { eq: objQuery };
                            }
                        }
                    }
                }
            });
        }
        var search_param = objData.search_param || "";
        //console.debug(objParams);
        var minimumInputLength =
            (typeof showType == "undefined" || showType != "all") &&
            search_param
                ? 2
                : 0;
        var limit = search_param ? 50 : 500;
        var __cache = [];
        current_dom.select2({
            minimumInputLength: minimumInputLength,
            allowClear: true,
            closeOnSelect: false,
            cache: false,
            placeholder: current_dom.attr("placeholder") || "Select an option",
            ajax: {
                url: urlLoad,
                dataType: "json",
                delay: 300,
                cache: true,
                data: function (params) {
                    var query = {};
                    if (minimumInputLength > 0) {
                        if (search_param == "keyword") {
                            var moreParams = { keyword: params.term };
                        } else {
                            if (objData.version == 2) {
                                query = {
                                    [search_param]: { like: params.term },
                                };
                            } else {
                                query = {
                                    [search_param]: {
                                        like: "%" + params.term + "%",
                                    },
                                };
                            }
                        }
                    }
                    $.extend(query, objParams);
                    var offset =
                        params.page > 1 ? (params.page - 1) * limit : 0;

                    var result = {
                        params: query,
                        limit: limit,
                        offset: offset,
                    };

                    if (typeof moreParams != "undefined") {
                        $.extend(result, moreParams);
                    }
                    return result;
                },

                processResults: function (data, params) {
                    if (data.error) {
                        //console.log(data);
                        return false;
                    }
                    var term = stringToSlug($.trim(params.term).toLowerCase());
                    //console.log(params);
                    var new_str = objData.formated;
                    var tmp = current_dom.attr("data-format")
                        ? current_dom.attr("data-format")
                        : new_str;
                    // dung de thay doi key khac id
                    var tmp_val = current_dom.attr("data-format-val")
                        ? current_dom.attr("data-format-val")
                        : "$(" + objData.id + ")";
                    var html = objData.html || "";
                    var dataResult = [];
                    $.each(data.data, function (item_key, item) {
                        //console.log(tmp,item);
                        if (item) {
                            var replaced = formatReplace(tmp, item);
                            var valReplaced = formatReplace(tmp_val, item);
                            var htmlReplace = !html
                                ? replaced
                                : formatReplace(html, item);
                            if (params.term && !search_param) {
                                if (
                                    stringToSlug(
                                        replaced.toLowerCase()
                                    ).indexOf(term) > -1
                                ) {
                                    dataResult.push({
                                        id: valReplaced,
                                        text: replaced,
                                        html: htmlReplace,
                                    });
                                }
                            } else {
                                dataResult.push({
                                    id: valReplaced,
                                    text: replaced,
                                    html: htmlReplace,
                                });
                            }
                        }
                    });

                    //console.log(dataResult);
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: dataResult,
                        pagination: {
                            more: dataResult.length == limit ? true : false,
                        },
                    };
                },
                transport: function (params, success, failure) {
                    //retrieve the cached key or default to _ALL_
                    //console.log(params);
                    var __cachekey = params.url + "?" + $.param(params.data);
                    if ("undefined" !== typeof __cache[__cachekey]) {
                        success(__cache[__cachekey]);
                        return;
                    }
                    var $request = $.ajax(params);
                    $request.then(function (data) {
                        //store data in cache
                        __cache[__cachekey] = data;
                        //display the results
                        success(__cache[__cachekey]);
                    });
                    $request.fail(failure);
                    //return $request;
                },
            },
            ...(option.multiple && { multiple: true }),
            templateResult: function (data) {
                return $($.parseHTML(data.html || data.title));
            },
        });
    };
    $.fn.loadSuggestData = function (params) {
        var o = $(this[0]); // This is the element
        loadSelectData($(this), params);
        return this; // This is needed so other functions can keep chaining off of this
    };

    //
    // Return objects assigned to module
    //

    return {
        init: function (parentDom) {
            //console.log(parentDom);
            replaceData(parentDom);
            selectData(parentDom);
        },
        getDataFromIndexedDB: getDataFromIndexedDB,
    };
})();
// Initialize module
// ------------------------------
$(document).on("DOMContentLoaded MainContentReloaded", function (e) {
    AutoloadDataService.init($(e.target));
});

// Initialize module
// ------------------------------
$(document).on("DOMContentLoaded MainContentReloaded", function (e) {
    AutoloadDataService.init($(document));
});
const formatCurrency = (value) => {
    return new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
    }).format(value);
};

$(document).ready(function () {
    $(document)
        .off("click", ".removeInputImages")
        .on("click", ".removeInputImages", function () {
            let _parent = $(this).closest(".gallery-list");
            $(this).closest(".upload_box_item").remove();
            _parent.find(".upload_box_item").each(function (index, element) {
                let _name = $(element).attr("data-name");
                $(element).attr("data-field-name", `${_name}[${index}][thumb]`);
                $(element)
                    .find('input[type="hidden"]')
                    .attr("name", `${_name}[${index}][thumb]`);
                $(element)
                    .find('input[type="number"]')
                    .attr("name", `${_name}[${index}][position]`)
                    .val(index);
            });
        });

    $(document)
        .off("click", ".upload-box")
        .on("click", ".upload-box", function () {
            let _parent_dom = $(this).closest(".upload-container");
            let is_mutil = _parent_dom.attr("is_multiple");
            let _name = _parent_dom.attr("data-field-name");
            let _this = $(this);

            window.open(
                `${window.SERVICE_FILEMANAGER}?type=image`,
                "FileManager",
                "width=900,height=600"
            );

            window.SetUrl = function (items) {
                // Only pick the first selected file
                var file_paths = items.map(
                    (item) => new URL(item.url).pathname
                );

                // Update input value and preview
                if (is_mutil == "true") {
                    let _parent_dom = $(_this).closest(".gallery-upload");
                    if (_parent_dom.find(".gallery-list").length == 0) {
                        $(_parent_dom).append(
                            '<div class="gallery-list p-1"></div>'
                        );
                    }

                    FUNC.showGallery(
                        _parent_dom.find(".gallery-list"),
                        _name,
                        file_paths
                    );
                } else {
                    let file_path = file_paths[0];
                    _this.find('input[type="hidden"]').remove();
                    _this.append(
                        `<input type="hidden" name="${_name}" value="${file_path}">`
                    );
                    _this
                        .find("img")
                        .addClass("show")
                        .attr("src", FUNC.getImageThumb(file_path));
                }
            };
        });
});
