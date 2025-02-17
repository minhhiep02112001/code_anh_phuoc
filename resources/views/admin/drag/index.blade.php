@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <legend class="w-auto ">Cài đặt trending:</legend>
                        <div class="form-row">
                            <select name="key" id="" class="form-control select2">
                                @foreach (config('data.config_trending') as $item)
                                    <option value="{{ $item['key'] }}" <?php if (!empty($item['query'])) {
                                        foreach ($item['query'] as $key => $value) {
                                            echo " data-query-{$key}='{$value}' ";
                                        }
                                    } ?>
                                        data-module="{{ $item['module'] }}">
                                        {{ $item['text'] }}
                                    </option>
                                @endforeach
                            </select>
                            <button class=" btn btn-success btnShowDrag" style="margin-top:10px;">Loading <i
                                    class="fa fa-spinner fa-spin" style="display: none"></i></button>
                        </div>
                    </fieldset>

                    <div class="row mt-3 content-drag hide">
                        <div class="col-5">
                            <input type="hidden" name="type">
                            <div class="card">
                                <div class="card-content">
                                    <div class="p-3">
                                        <select class="form-control select2_suggest selecter_data" style="width: 100%;">
                                        </select>
                                        <button class="btn btn-warning addtonavmenu" style="margin-top: 5px;">Thêm
                                            vào Trending
                                            <i class="fa fa-spinner fa-spin" style="display: none"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <!-- general form elements -->

                            <fieldset class="" style="position: relative;">
                                <legend class="w-auto ">Trending:</legend>
                                <div style="position: absolute; top:-24px; right: 0;">
                                    <button type="button"
                                        class="btnSaveMenu btn btn-sm btn-success">Save</button>
                                </div>

                                <div class="dd nestable" id="nestableDrag">
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

        .action-item {
            position: absolute;
            right: 8px;
            top: 6px;
        }
    </style>

    <script>
        let url_ajax_load = "/admin/ajax/drag";
        let url_load_select_product = window.APP_URL + "/admin/ajax/product";
        let url_load_select_post = window.APP_URL + "/admin/ajax/post";
        let url_load_select_page = window.APP_URL + "/admin/ajax/page";
        let url_load_select_category = window.APP_URL + "/admin/ajax/category";
        document.addEventListener("DOMContentLoaded", function() {
            $(".select2").select2({
                allowClear: true,
                placeholder: "Select an item",
            });
            $(".btnShowDrag").click(function() {
                let this_ = $(this);
                let _key = $("select[name='key']").val();
                let _module = $("select[name='key']").find(':selected').attr('data-module');

                var attributes = {};
                var selectedOption = $("select[name='key']").find(':selected').get(
                    0); // Get the native DOM element


                // Check if selectedOption exists to avoid errors if no option is selected
                if (selectedOption) {
                    // Iterate over all attributes of the selected option
                    $.each(selectedOption.attributes, function() {
                        // this is now a plain attribute node with name and value
                        if (this.specified) {
                            // Check if attribute name starts with 'data-query'
                            if (this.name.startsWith('data-query')) {
                                // Store attribute name and value in the attributes object
                                let _key = this.name.replaceAll('data-query-', '');
                                attributes[_key] = this.value;
                            }
                        }
                    });
                }

                this_.find(".fa-spinner").show();

                $(".content-drag").removeClass('hide');

                $("input[name='type']").val(_module);
                loadDataSelected(_module, $("select.selecter_data"), [], attributes);
                showmenus(_key, _module);

                this_.find(".fa-spinner").hide();
                return false;
            });

            $(document).on("click", ".addtonavmenu", function() {
                let select = $("select.selecter_data option:selected");
                let dragType = $("input[name='type']").val();

                let id = select.val();
                let title = select.html();
                if (!id || id == "undefined") {
                    Notification_Static.errors("Vui lòng chọn chuyện");
                    return;
                }
                let length = $('#nestableDrag').find('[data-id=' + id + ']').length;
                if (length == 0) {
                    $("#nestableDrag > ol.dd-list").append(
                        '<li class="dd-item dd3-item" data-id="' +
                        id +
                        '" data-type="' +
                        dragType +
                        '"><div class="dd-handle dd3-handle"></div><div class="dd3-content">' +
                        title +
                        '</div><div class="action-item"><span class="nestledeletedd fa fa-trash"></span></div></li>'
                    );
                    $("#nestableDrag").nestable({
                        maxDepth: 1,
                    });
                }
            });

            $(document).on("click", ".nestledeletedd", function() {
                let element = $(this).parent().parent();
                element.remove();
                element.find("ol.dd-list").remove();
            });

            $(document).on("click", ".btnSaveMenu", function() {
                let select = $("#nestableDrag");

                let type = $("input[name='type']").val();
                let key = $("select[name='key']").val();
                let structure = select.nestable("serialize");
               
                let check = [];
                let save = 1;
                structure.forEach(function(item, key) {
                    if (check.includes(item.id)) {
                        Notification_Static.errors("Không thể trùng lặp phim!");
                        save = 0;
                        return false;
                    } else {
                        check.push(item.id);
                    }
                });
                if (save == 1) {
                    saveData(structure, key, type);
                }
            });
        });

        function saveData(structure, key, type) {
            $.ajax({
                type: "POST",
                url: "/admin/drag",
                data: {
                    drag_id: structure,
                    key,
                    type,
                },
                dataType: "json",
                cache: "false",
                success: function(result) {
                    if (result.status == 'success') {
                        Notification_Static.success("Lưu thành công !");
                    } else {
                        Notification_Static.error("Lưu không thành công !");
                    }
                },
            });
        }

        function showmenus(key, type) {
            $.ajax({
                type: "GET",
                url: url_ajax_load,
                data: {
                    key,
                    type
                },
                dataType: "json",
                cache: "false",
                success: function(result) {
                    var content = html_drag(result);
                    $("#nestableDrag .dd-list").html(content);
                    $("#nestableDrag").nestable();
                },
            });
        }

        function html_drag(dataDrag) {
            var _html = "";

            if (dataDrag)
                $.each(dataDrag, function(i, v) {
                    _html += `<li class="dd-item dd3-item" data-id="${v.id}" data-type="${v.type}">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">${v.text}</div>
                    <div class="action-item"><span class="nestledeletedd fa fa-trash"></span></div>
                    </li>`;
                });
            return _html;
        }


        function loadDataSelected(_module, selector, dataSelected, query = {}) {
            let url_load_select = '';
            switch (_module) {
                case 'product':
                    $(".title_active").text('Sản phẩm');
                    url_load_select = url_load_select_product;
                    break;
                case 'post':
                    $(".title_active").text('Bài viết');
                    url_load_select = url_load_select_post;
                    break;
                case 'category':
                    $(".title_active").text('Danh mục');
                    url_load_select = url_load_select_category;
                    break;
                case 'page':
                    $(".title_active").text('Page');
                    url_load_select = url_load_select_page;
                    break;

            }

            if (selector.length > 0) {
                selector.select2({
                    placeholder: "Chọn dữ liệu",
                    data: dataSelected,
                    ajax: {
                        url: url_load_select,
                        dataType: "json",
                        delay: 250,
                        headers: {
                            'Content-Type': 'application/json',
                            'Referrer-Policy': 'strict-origin-when-cross-origin'
                        },
                        data: function(e) {
                            query.title = e.term;
                            query.is_status = 1;
                            console.log(query);
                            return {
                                length: 100,
                                params: query,
                                selector: ['id', 'title'],
                                page: e.page
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.data.map(item => ({
                                    id: item.id,
                                    text: item.title // Sử dụng 'title' cho thuộc tính 'text'
                                })),
                                pagination: {
                                    more: (params.page * 30) < data.iTotalRecords
                                }
                            };
                        },
                        cache: !0,
                    },
                });
                if (typeof dataSelected !== "undefined")
                    selector.find("> option").prop("selected", "selected").trigger("change");
            }
        }

        function loadStory(selector, dataSelected) {
            if (selector.length > 0) {
                selector.select2({
                    placeholder: "Chọn dữ liệu",
                    data: dataSelected,
                    ajax: {
                        url: url_load_select,
                        dataType: "json",
                        delay: 250,
                        data: function(e) {
                            return {
                                length: 100,
                                title: e.term,
                                page: e.page,
                                is_status: 1
                            };
                        },
                        processResults: function(e, t) {
                            console.log(e, t);
                            return (
                                (t.page = t.page || 1), {
                                    results: e,
                                    pagination: {
                                        more: 30 * t.page < e.total_count,
                                    },
                                }
                            );
                        },
                        cache: !0,
                    },
                });
                if (typeof dataSelected !== "undefined")
                    selector.find("> option").prop("selected", "selected").trigger("change");
            }
        }
    </script>
@endpush
