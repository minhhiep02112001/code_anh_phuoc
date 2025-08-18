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
            // Xử lý khi paste: xóa thẻ <a>
            editor.on("PastePreProcess", function (e) {
                const tempDiv = document.createElement("div");
                tempDiv.innerHTML = e.content;

                // Xóa tất cả thẻ <a> nhưng giữ nội dung bên trong
                const links = tempDiv.querySelectorAll("a");
                links.forEach((link) => link.remove());

                // Cập nhật lại nội dung paste đã xử lý
                e.content = tempDiv.innerHTML;
            });
            editor.addButton("custom_clearformat", {
                title: "Clear heading → <p><strong>...</strong></p>",
                image: editor.baseURI.toAbsolute("img/icons/remove.gif"),
                onclick: function () {
                    const content = editor.getContent(); // Lấy toàn bộ nội dung
                    const tempDiv = document.createElement("div");
                    tempDiv.innerHTML = content;

                    const headings =
                        tempDiv.querySelectorAll("h1,h2,h3,h4,h5,h6");

                    // Xóa tất cả thẻ <a> nhưng giữ nội dung bên trong
                    const links = tempDiv.querySelectorAll("a");
                    links.forEach((link) => link.remove());

                    headings.forEach(function (el) {
                        const strong = document.createElement("strong");
                        strong.innerHTML = el.innerHTML;

                        const p = document.createElement("p");
                        p.appendChild(strong);

                        el.parentNode.replaceChild(p, el);
                    });

                    // 2. XÓA các thẻ rỗng không nội dung thực
                    tempDiv.querySelectorAll("*").forEach(function (el) {
                        if (
                            el.textContent.trim() === "" &&
                            el.childNodes.length === 0
                        ) {
                            el.remove();
                        }
                    });

                    // 3. XÓA attributes, TRỪ img / iframe / video
                    tempDiv.querySelectorAll("*").forEach(function (el) {
                        const tagName = el.tagName.toLowerCase();
                        if (!["img", "iframe", "video"].includes(tagName)) {
                            while (el.attributes.length > 0) {
                                el.removeAttribute(el.attributes[0].name);
                            }
                        }
                    });

                    // XÓA tất cả <span> trong <p> nhưng giữ nội dung bên trong
                    tempDiv.querySelectorAll("p span").forEach(function (span) {
                        const parent = span.parentNode;
                        while (span.firstChild) {
                            parent.insertBefore(span.firstChild, span);
                        }
                        span.remove();
                    });

                    let cleaned = tempDiv.innerHTML;
                    cleaned = cleaned.replaceAll(/&amp;/g, "");
                    // XÓA khoảng trắng trước dấu chấm
                    cleaned = cleaned.replace(/\s+([.,!?;:])/g, "$1");
                    // Ghi đè lại toàn bộ nội dung editor
                    editor.setContent(cleaned);
                },
            });

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
            "table | removeformat | charmap emoticons | custom_clearformat | spellchecker | template restoredraft insertfile | post_block_top post_block_bottom",
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

            var cmsURL = `${window.SERVICE_FILEMANAGER}?field_name=${field_name}`;

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
        });
    },

    openImport: function () {
        let modal_form = $("#modal_form_import");
        modal_form.on("shown.bs.modal", function (e) {
            if ($(this).find("input").length > 0) {
                FileUpload.init(this);
            }
        });
    },
    closeImport: function () {
        $("#modal_form_import").on("hidden.bs.modal", function (e) {
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
                .find(".upload-box")
                .each(function (index, e) {
                    $(e).find("img").attr("src", "").removeClass("show");
                    $(e).find('input[type="hidden"]').remove();
                });

            $(this).find(".select2_suggest").empty().trigger("change");
            for (var j = 0; j < tinyMCE.editors.length; j++) {
                tinymce.get(tinyMCE.editors[j].id).setContent("");
            }
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
    saveImport: function () {
        let modal_form = $("#modal_form_import");
        let url = modal_form.find("form").attr("data-action");
        let method = modal_form.find("form").attr("data-method");
        modal_form.find(".btnSaveImport").attr("disabled", true);

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
                modal_form.find(".btnSaveImport").attr("disabled", false);
                DatatablesServerSide.initReload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                let body = jqXHR.responseJSON.message;
                Notification_Static.errors(jqXHR.status + ": " + body);
                modal_form.find(".btnSaveImport").attr("disabled", false);
            },
        });
        return false;
    },

    save: function (modal_form) {
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
        AJAX_CRUD_MODAL.openImport();
        AJAX_CRUD_MODAL.closeImport();

        // doc.on('click', '.btnReload', function (e) {
        //     e.preventDefault();
        //     AJAX_DATATABLES.reload();
        // });
        doc.on("click", ".btnImport", function (e) {
            e.preventDefault();
            console.log("click");

            let method = $(this).data("method");
            let action = $(this).data("action");
            $("#modal_form_import")
                .find("form")
                .attr("data-method", method)
                .attr("data-action", action)
                .attr("method", method)
                .attr("action", action);
            $("#modal_form_import").modal("show");
        });

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
            AJAX_CRUD_MODAL.save($(this).closest(".modal"));
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
                            <img class="preview-image show" alt="Preview" src="${FUNC.getImageThumb(
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

                const folder = parentUpload.attr("data-folder") || "";
                const disk = parentUpload.attr("data-disk") || "";
                const urlUpload = window.SERVICE_UPLOAD_FILE;
                const fullUrl = `${urlUpload}?folder=${encodeURIComponent(
                    folder
                )}&disk=${encodeURIComponent(disk)}`;

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

const AutoloadDataService = (function () {
    var objSelect2Suggest = {
        category: {
            url: window.APP_URL + "/admin/ajax/category",
            formated: "$(title)",
            id: "id",
            query: ["type"],
        },
        post: {
            url: window.APP_URL + "/admin/ajax/post",
            formated: "$(title)",
            id: "id",
        },
        page: {
            url: window.APP_URL + "/admin/ajax/page",
            formated: "$(title)",
            id: "id",
        },
        menu: {
            url: window.APP_URL + "/admin/ajax/menu",
            formated: "$(title)",
            id: "id",
        },

        keyword: {
            url: window.APP_URL + "/admin/ajax/keyword",
            formated: "$(title)",
            id: "id",
        },
    };
    var arrDomAutoFill = [
        {
            url: window.APP_URL + "/admin/ajax/keyword",
            dom: ".em-keyword",
            attr: "data-id",
            formated: "$(title)",
            fk: "id",
        },
        {
            url: window.APP_URL + "/admin/ajax/category",
            dom: ".em-category",
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

    //
    // Setup module components
    //

    var loadItemSelected = (domSelected) => {
        let _id = $(domSelected).val();
        let selector = $("select#color_id");
        let params = {
            params: {
                id: dataSelected,
            },
        };
        $.ajax({
            url: _url_load_color,
            dataType: "json",
            data: params,
        }).done(function (result) {
            let data = result.data;
            if (data.length > 0) {
                $.each(data, function (indexInArray, valueOfElement) {
                    let newOptionCo = new Option(
                        valueOfElement.title,
                        valueOfElement.id,
                        true,
                        true
                    );
                    $(selector).append(newOptionCo).trigger("change");
                });
            }
        });
    };

    // Basic Datatable examples
    var replaceData = function (parentDom) {
        $.each(arrDomAutoFill, function (idx, item) {
            var focusDom = $(parentDom).find(item.dom);
            if (!focusDom.length) {
                return true;
            }

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
            arrId = arrId.map(($item) => parseInt($item));

            var count = 1;
            if (arrId.length > 200) {
                count = Math.ceil(arrId.length / 200);
            }
            for (i = 1; i <= count; i++) {
                var objParams = {};
                let ob = {};
                ob[item.fk] = arrId.slice((i - 1) * 200, 200 * i);
                objParams["params"] = ob;
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

                var dataGet = objParams;

                $.ajax({
                    url: urlQuery,
                    type: "GET",
                    dataType: "json",
                    data: dataGet,
                    contentType:
                        "application/x-www-form-urlencoded; charset=UTF-8",

                    success: function (response) {
                        if (response.data.length == 0) {
                            return false;
                        }
                        var data = response.data;
                        var new_str = item.formated;
                        var objData = {};

                        $.each(data, function (key, value) {
                            objData[value[item.fk]] = value;
                        });

                        focusDom.each(async function () {
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
                                    $(this).text(
                                        formatReplace(tmp, objData[v])
                                    );
                                }
                            }
                        });
                    },
                    error: function () {},
                });
            }
        });
    };

    var selectData = function (parentDom) {
        var __cache = [];
        parentDom.find(".select2_suggest").each(function () {
            var self = $(this);
            loadSelectData(self);
            $(this).bind("select2_suggest", function (e) {
                var getID = $(this).select2("data");
                //console.log(getID[0]['_resultId']);
                var resultID = getID[0]["_resultId"];
                console.log(resultID);
                var res = resultID.split("-result-");

                //.text("TEST");
                $("#" + res[0] + "-container").text(
                    self.find("option:selected").text()
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
        var urlLoad = objData.url || "";

        if (typeof objSelect2Suggest == "undefined" || !objData) {
            console.log("Suggest data" + dataTable + " not found");
            return false;
        }
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
                var objQuery = current_dom.attr("data-query-" + qkey);

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
        var minimumInputLength =
            (typeof showType == "undefined" || showType != "all") &&
            search_param
                ? 2
                : 0;
        var limit = search_param ? 50 : 1000;
        var __cache = [];

        $(current_dom).select2({
            minimumInputLength: 0,
            allowClear: true,
            cache: false,
            placeholder: current_dom.attr("placeholder") || "Select an option",
            ajax: {
                url: urlLoad,
                type: "GET",
                dataType: "json",
                delay: 250,
                cache: false,
                data: function (params) {
                    var query = {};
                    if (minimumInputLength > 0) {
                        query = {
                            [search_param]: params.term,
                        };
                    }
                    $.extend(query, objParams);
                    var offset =
                        params.page > 1 ? (params.page - 1) * limit : 0;
                    var result = {
                        params: query,
                        length: limit,
                        start: offset,
                    };
                    return result;
                },
                processResults: function (responsive, params) {
                    if (!responsive.data) {
                        return false;
                    }

                    params.page = params.page || 1;
                    let dataResult = [];
                    $.each(responsive.data, function (item_key, item) {
                        if (item) {
                            dataResult.push({
                                id: item.id,
                                text: item.title,
                                html: item.title,
                            });
                        }
                    });

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
            templateResult: function (data) {
                return data.html || data.title;
            },
        });
    };
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

    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__avatar'><img src='" +
                repo.owner.avatar_url +
                "' /></div>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'></div>" +
                "<div class='select2-result-repository__description'></div>" +
                "<div class='select2-result-repository__statistics'>" +
                "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
                "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
                "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
                "</div>" +
                "</div>" +
                "</div>"
        );

        $container
            .find(".select2-result-repository__title")
            .text(repo.full_name);
        $container
            .find(".select2-result-repository__description")
            .text(repo.description);
        $container
            .find(".select2-result-repository__forks")
            .append(repo.forks_count + " Forks");
        $container
            .find(".select2-result-repository__stargazers")
            .append(repo.stargazers_count + " Stars");
        $container
            .find(".select2-result-repository__watchers")
            .append(repo.watchers_count + " Watchers");

        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.full_name || repo.text;
    }

    $.fn.loadSuggestData = function (params) {
        var o = $(this[0]); // This is the element
        loadSelectData($(this), params);
        return this; // This is needed so other functions can keep chaining off of this
    };

    function formatReplace(tpl, data) {
        return tpl.replace(/\$\(([^\)]+)?\)/g, function ($1, $2) {
            if (!data[$2] || data[$2] == "null") {
                return "";
            }
            return data[$2];
        });
    }

    //
    // Return objects assigned to module
    //

    return {
        init: async function (parentDom) {
            replaceData(parentDom);
            selectData(parentDom);
        },
        initReloadreplaceData: async function (parentDom) {
            replaceData(parentDom);
        },
        initReload: function (parentDom) {
            selectData(parentDom);
        },
    };
})();

const AutoloadDateService = (function () {
    function loadDate(parentDom) {
        // Chọn ngày giờ
        $(parentDom)
            .find(".pick_datetime")
            .each(function () {
                let $input = $(this);
                let defaultTime = $input.attr("data-default-time") || "00:00";
                let [hour, minute] = defaultTime.split(":").map(Number);

                let fp = flatpickr(this, {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                    allowInput: true,
                    onOpen: function (selectedDates, dateStr, instance) {
                        if (!instance.input.value) {
                            // chỉ khi chưa có giá trị
                            let today = new Date();
                            today.setHours(hour, minute, 0, 0);
                            instance.setDate(today, false); // set mặc định
                        }
                    },
                });
            });

        // Chỉ chọn ngày
        $(parentDom)
            .find(".pick_date")
            .each(function () {
                flatpickr(this, {
                    enableTime: false,
                    dateFormat: "Y-m-d",
                    allowInput: true,
                });
            });

        // Chỉ chọn giờ
        $(parentDom)
            .find(".pick_time")
            .each(function () {
                flatpickr(this, {
                    enableTime: true,
                    noCalendar: true, // ẩn phần lịch
                    dateFormat: "H:i",
                    time_24hr: true,
                    allowInput: true,
                });
            });
    }

    return {
        init: function (parentDom) {
            loadDate(parentDom);
        },
    };
})();

// Initialize module
// ------------------------------
$(document).on("DOMContentLoaded MainContentReloaded", function (e) {
    AutoloadDataService.init($(document));
    AutoloadDateService.init($(document));
});
const formatCurrency = (value) => {
    return new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
    }).format(value);
};

$(document).ready(function () {
    $(document).on("change_search", "#form-filter-data", function () {
        AutoloadDataService.init($("#form-filter-data"));
    });

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
