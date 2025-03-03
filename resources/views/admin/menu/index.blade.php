@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">


            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <legend class="w-auto ">Cài đặt menu:</legend>
                        <div class="form-row">
                            <select name="key_selected" id="" class="form-control select2">
                                @foreach (config('data.setting_menu') as $k => $item)
                                    <option value="{{ $k }}"> {{ $item }}</option>
                                @endforeach
                            </select>

                            <button class=" btn btn-success" id="btnShowMenu" style="margin-top:10px;">Loading <i
                                    class="fa fa-spinner fa-spin" style="display: none"></i></button>
                        </div>
                    </fieldset>

                    <div class="row mt-3">
                        <div class="col-5">
                            <div class="card">
                                <div class="card-content">
                                    <div class="nav-tabs-custom">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                            <a class="nav-item nav-link  active show" id="nav-home-tab" data-toggle="tab"
                                                href="#tab_information" role="tab" aria-controls="nav-home"
                                                aria-selected="false">Thông tin menu</a>

                                            <a class="nav-item nav-link " id="nav-post-tab" data-toggle="tab"
                                                href="#tab_post" role="tab" aria-controls="nav-post"
                                                aria-selected="true">Bài viết</a>

                                            <a class="nav-item nav-link " id="nav-page-tab" data-toggle="tab"
                                                href="#tab_page" role="tab" aria-controls="nav-page"
                                                aria-selected="true">Page</a>

                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_information">
                                                <div class="card ">
                                                    <!-- /.card-header -->
                                                    <!-- form start -->
                                                    <form class="form-horizontal" id="form-action-menu">
                                                        <div class="card-body p-1">
                                                            <div class="form-group">
                                                                <label for="input_title"
                                                                    class="col-sm-2 control-label">Title</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="title"
                                                                        class="form-control" id="input_title"
                                                                        placeholder="Title">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input_link"
                                                                    class="col-sm-2 control-label">Link</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" name="link"
                                                                        class="form-control" id="input_link"
                                                                        placeholder="Link">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input_link"
                                                                    class="col-sm-2 control-label">Class</label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" name="class"
                                                                        class="form-control" id="input_class"
                                                                        placeholder="Class">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input_position"
                                                                    class="col-sm-2 control-label">Position</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="position"
                                                                        class="form-control" id="input_position"
                                                                        placeholder="Position">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input_target" name="title"
                                                                    class="col-sm-2 control-label">Target</label>

                                                                <div class="col-sm-10">
                                                                    <select name="target" id="input_target"
                                                                        class="form-control">
                                                                        <option value=""></option>
                                                                        <option value="_self">Opens the linked document
                                                                            in
                                                                            the
                                                                            same
                                                                            frame as it was clicked
                                                                            (this is default)
                                                                        </option>
                                                                        <option value="_blank">Opens the linked document
                                                                            in
                                                                            a new
                                                                            window
                                                                            or tab
                                                                        </option>
                                                                        <option value="_parent"> Opens the linked
                                                                            document
                                                                            in the
                                                                            parent
                                                                            frame
                                                                        </option>
                                                                        <option value="_top">Opens the linked document
                                                                            in
                                                                            the
                                                                            full
                                                                            body of the window
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer p-1">
                                                            <button type="reset" class="btn btn-light">Reset</button>
                                                            <button type="submit"
                                                                class="btn btn-info pull-right btn_add_menu">Add
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-warning pull-right btn_edit_menu"
                                                                style="display: none;">Update
                                                            </button>
                                                        </div>
                                                        <!-- /.card-footer -->
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="tab-pane parent_form" id="tab_post">
                                                <div class="p-3">
                                                    <select class="form-control select2_suggest em-category select_menu"
                                                        id="tab_post_menu" data-module="post" style="width: 100%;">
                                                    </select>
                                                    <button class="btn btn-warning addtonavmenu"
                                                        style="margin-top: 5px;">Thêm
                                                        vào menu
                                                        <i class="fa fa-spinner fa-spin"
                                                            style="display: none"></i></button>
                                                </div>
                                            </div>

                                            <div class="tab-pane  parent_form" id="tab_page">
                                                <div class="p-3">
                                                    <select class="form-control select2_suggest em-page select_menu"
                                                        name="page" data-module="page" style="width: 100%;">
                                                    </select>
                                                    <button class="btn btn-warning addtonavmenu"
                                                        style="margin-top: 5px;">Thêm
                                                        vào menu
                                                        <i class="fa fa-spinner fa-spin"
                                                            style="display: none"></i></button>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <!-- general form elements -->

                            <fieldset class="" style="position: relative;">
                                <legend class="w-auto ">Menu:</legend>
                                <div style="position: absolute; top:-24px; right: 0;">
                                    <button type="button"
                                        class="btn-save-menu-position btn btn-sm btn-success">Save</button>
                                </div>



                                <div class="dd nestable" id="nestable">
                                    <ol class="dd-list">
                                    </ol>
                                </div>
                            </fieldset>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admins/js/jquery.nestable.js') }}"></script>
    <style>
        span.button-edit.btn.btn-warning.btn-sm.pull-right {
            position: absolute;
            top: 3px;
            padding: 0 5px;
            right: 30px;
        }

        span.button-delete.btn.btn-danger.btn-sm.pull-right {
            position: absolute;
            top: 3px;
            padding: 0 5px;
            right: 0px;
        }
    </style>

    <script>
        /*jslint browser: true, devel: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
        /*global $ */

        /*************** General ***************/

        var url_ajax_load = window.APP_URL + "/admin/ajax/menu";
        var url_ajax_edit = window.APP_URL + "/admin/menu";
        var url_ajax_edit_multiple = window.APP_URL + "/admin/ajax/update-multiple-menu";
        // Dom Ready

        var loadDataNestable = function(e) {

        }

        var loadItemNestable = function(data, newId = 0) {
            nestableList.append(
                '<li class="dd-item" ' +
                'data-id="' + newId + '" ' +
                'data-name="' + data.title + '" ' +
                'data-target="' + data.target + '" ' +
                'data-link="' + data.link + '" ' +
                'data-position="' + data.position + '" ' +
                'data-class="' + data.class + '" ' +
                'data-new="1" ' +
                'data-deleted="0">' +
                '<div class="dd-handle">' + data.title + '</div> ' +
                '<span class="button-delete btn btn-danger btn-sm pull-right" ' +
                'data-owner-id="' + newId + '"> ' +
                '<i class="fa fa-times" aria-hidden="true"></i> ' +
                '</span>' +
                '<span class="button-edit btn btn-warning btn-sm pull-right" ' +
                'data-owner-id="' + newId + '">' +
                '<i class="fa fa-pencil-square" aria-hidden="true"></i>' +
                '</span>' +
                '</li>'
            );
        }

        var HandleMenu = (function() {
            var _btnShowMenu = $("#btnShowMenu");
            var _btnUpdateMenu = $(".btn_edit_menu");
            var _btnAddMenu = $(".btn_add_menu");
            var _btnUpdatePositionMenu = $(".btn-save-menu-position");
            var nestableList = $("#nestable > .dd-list");
            var _form_action = $("#form-action-menu");
            var newIdCount = 1;

            function showMenu() {

                $('#nestable').nestable({
                    maxDepth: 2
                })

                var _this = this;
                let _type = $('select[name="key_selected"]').val();
                loadAjaxMenuType(_type);
                _btnShowMenu.on('click', function(e) {
                    console.log('click');

                    let _type = $('select[name="key_selected"]').val();
                    loadAjaxMenuType(_type);
                })
                $('select[name="key_selected"]').on('change', function(e) {
                    let _type = $('select[name="key_selected"]').val();
                    loadAjaxMenuType(_type);
                })
            };

            var eventMenu = () => {
                $("button[type='reset']").on('click', function(e) {
                    _form_action_reset();
                });
                AutoloadDataService.init($(".tab-content"));
                $(document).off("click", '.button-delete').on("click", '.button-delete', deleteFromMenu);
                $(document).off("click", '.button-edit').on("click", '.button-edit', prepareEdit);
                _btnAddMenu.on('click', function(e) {
                    e.preventDefault();
                    addToMenu();
                })

                $(document).on('click', '.addtonavmenu', function() {
                    let _parent = $(this).closest('.parent_form');
                    let _value_id = _parent.find('select.select_menu').val();
                    let _module = _parent.find('select.select_menu').attr('data-module');
                    let type = $('select[name="key_selected"]').val();
                    let _url = '';
                    switch (_module) {
                        case 'category':
                            _url = window.APP_URL + "/admin/category/" + _value_id;
                            break;
                        case 'page':
                            _url = window.APP_URL + "/admin/page/" + _value_id;
                            break;
                        case 'post':
                            _url = window.APP_URL + "/admin/post/" + _value_id;
                            break;
                    }
                    if (_url) {
                        $.ajax({
                            type: "GET",
                            url: _url,
                            dataType: "json",
                            cache: "false",
                            success: function(result) {
                                console.log(result);
                                if (result.data_info) {
                                    let data = result.data_info;
                                    let obj = {
                                        'title': data.title,
                                        'link': data.url ?? '/',
                                        'type': type,
                                    }
                                    ajax_add_menu(obj);
                                    newIdCount++;
                                }
                            },
                        });
                    }
                })

                _btnUpdateMenu.on('click', function(e) {
                    e.preventDefault();
                    let _id = _btnUpdateMenu.attr("owner-id");
                    editMenuItem(_id);
                })

                _btnUpdatePositionMenu.on('click', function(e) {
                    e.preventDefault();

                    var type = $('select[name="key_selected"]').val()
                    let data = $("#nestable").nestable("serialize");
                    $.ajax({
                        url: url_ajax_edit_multiple,
                        type: "POST",
                        data: {
                            data,
                            type
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response.status == 'success') {
                                Notification_Static.success("Lưu thành công !");
                            } else {
                                Notification_Static.errors("Lưu không thành công !");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            if (jqXHR.status == 422) {
                                Notification_Static.errors(
                                    jqXHR.responseJSON.message,
                                    jqXHR.status
                                );
                            } else {
                                Notification_Static.errors(
                                    "Lỗi!!! Liên hệ Hiệp để xử lý...",
                                    jqXHR.status
                                );
                            }
                        }
                    });
                })
            };


            var loadAjaxMenuType = (type) => {
                $.ajax({
                    type: "GET",
                    url: url_ajax_load,
                    data: {
                        params: {
                            type: type
                        },
                        limit: 1000
                    },
                    beforeSend: function() {
                        nestableList.html('');
                    },
                    dataType: "json",
                    cache: "false",
                    success: function(result) {
                        let data = result.data;
                        loadDataNestable(data)
                    },
                });
            }

            var loadDataNestable = function(data) {
                if (data.length > 0) {
                    let html = '';
                    for (let item of data) {
                        html += loadItemNestable(item, item.id);
                    }
                    nestableList.append(html); // Thêm một lần để giảm số lần DOM manipulation
                }
            }

            var loadItemNestable = function(item, newId = 0) {
                let childrenHtml = item.children && item.children.length > 0 ? buildNestableList(item.children,
                    item.id) : '';
                let collapseControls = item.children && item.children.length > 0 ?
                    '<button data-action="collapse" type="button">Collapse</button><button data-action="expand" type="button" style="display: none;">Expand</button>' :
                    '';

                return `
        <li class="dd-item" data-id="${newId}" data-name="${item.title}" data-target="${item.target || ''}"
        data-link="${item.link || ''}" data-position="${item.position || ''}" data-class="${item.class || ''}"
        data-new="1" data-deleted="0">
            ${collapseControls}
            <div class="dd-handle">${item.title}</div>
            <span class="button-delete btn btn-danger btn-sm pull-right" data-owner-id="${newId}">
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
            <span class="button-edit btn btn-warning btn-sm pull-right" data-owner-id="${newId}">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
            </span>
            ${childrenHtml}
        </li>`;
            }

            function buildNestableList(children, parentId) {
                let html = '<ol class="dd-list">';
                for (let child of children) {
                    html += loadItemNestable(child, child.id);
                }
                html += '</ol>';
                return html;
            }


            var addToMenu = function() {
                let serializedArray = _form_action.serializeArray();
                serializedArray.push({
                    'name': 'type',
                    'value': $('select[name="key_selected"]').val()
                });
                ajax_add_menu(serializedArray);
                newIdCount++;
            };

            var ajax_add_menu = (data) => {
                if (data) {
                    $.ajax({
                        type: "POST",
                        url: "/admin/menu",
                        data: data,
                        dataType: "json",
                        cache: "false",
                        success: function(result) {
                            if (result.status == 'success') {
                                Notification_Static.success("Lưu thành công !");
                                let data = result.data;
                                if (data) {
                                    let _html = loadItemNestable(data, data.id);
                                    nestableList.append(_html);
                                    $("#form-action-menu")[0].reset();
                                }
                            } else {
                                Notification_Static.errors("Lưu không thành công !");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
                            console.log(textStatus);
                            console.log(jqXHR);
                            if (jqXHR.status == 422) {
                                Notification_Static.errors(
                                    jqXHR.responseJSON.message,
                                    jqXHR.status
                                );
                            } else {
                                Notification_Static.errors(
                                    "Lỗi!!! Liên hệ Hiệp để xử lý...",
                                    jqXHR.status
                                );
                            }
                            return true;
                        },
                    });
                }
            }

            var _form_action_reset = function() {
                _btnAddMenu.show();
                _btnUpdateMenu.hide();
                _form_action[0].reset();
                return
            }

            var editMenuItem = function(id) {
                let serializedArray = _form_action.serializeArray();

                $.ajax({
                    type: "PUT",
                    url: "/admin/menu/" + id,
                    data: serializedArray,
                    dataType: "json",
                    cache: "false",
                    success: function(result) {
                        if (result.status == 'success') {
                            Notification_Static.success("Lưu thành công !");
                            let _type = $('select[name="key_selected"]').val();
                            loadAjaxMenuType(_type);
                            _form_action_reset();
                            _btnUpdateMenu.removeAttr("owner-id");
                        } else {
                            Notification_Static.errors("Lưu không thành công !");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 422) {
                            Notification_Static.errors(
                                jqXHR.responseJSON.message,
                                jqXHR.status
                            );
                        } else {
                            Notification_Static.errors(
                                "Lỗi!!! Liên hệ Hiệp để xử lý...",
                                jqXHR.status
                            );
                        }
                        return true;
                    },
                });
            };


            var deleteFromMenu = function() {
                var targetId = $(this).data('owner-id');

                var target = $('[data-id="' + targetId + '"]');

                var result = confirm("Delete " + target.data('name') + " and all its subitems ?");


                if (!result) {
                    return;
                }

                $.ajax({
                    type: "DELETE",
                    url: "/admin/menu/" + targetId,
                    dataType: "json",
                    cache: "false",
                    success: function(result) {
                        if (result.status == 'success') {
                            Notification_Static.success(result.message);
                            let _type = $('select[name="key_selected"]').val();
                            loadAjaxMenuType(_type);
                        } else {
                            Notification_Static.error(result.message);
                        }
                    },
                });
            };
            var prepareEdit = function() {
                $(".nav-tabs li").removeClass('active');
                $(".nav-tabs a[href='#tab_information']").closest('li').addClass('active');
                $(".tab-pane").removeClass('active');
                $("#tab_information").addClass('active');

                var targetId = $(this).data('owner-id');
                var target = $('[data-id="' + targetId + '"]');
                $.ajax({
                    type: "GET",
                    url: "/admin/menu/" + targetId,
                    dataType: "json",
                    cache: "false",
                    success: function(result) {
                        if (result.data_info) {
                            _btnUpdateMenu.attr("owner-id", targetId).show();
                            _btnAddMenu.hide();
                            $.each(result.data_info, function(key, value) {
                                let element = _form_action.find('[name="' + key +
                                    '"]');
                                $(element).val(value);
                                if (element.hasClass('switchBootstrap')) {
                                    element.prop('checked', value);
                                }
                            });
                        }
                    },
                });
            };

            return {
                init: function() {
                    showMenu();
                    eventMenu();
                },
            };
        })();
        document.addEventListener("DOMContentLoaded", function() {

            $('#form-action-menu').on('click', function(e) {
                e.preventDefault();
                return false;
            })

            HandleMenu.init();
            // $("#btnShowMenu").on("click", function() {
            //     HandleMenu.showMenu();

            //     console.log('click124');
            // });

        });
    </script>
@endpush
