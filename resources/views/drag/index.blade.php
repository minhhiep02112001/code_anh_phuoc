@extends('admin._index')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý Trending
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="content-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <select name="key" id="" class="form-control select2" >
                            @if (!empty($key))
                                @foreach ($key as $k => $item)
                                    <option value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            @endif
                        </select>

                        <button class=" btn btn-success btnShowDrag"  style="margin-top:10px;">Loading <i class="fa fa-spinner fa-spin"
                            style="display: none"></i> </button>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.box-header -->

        <div class="row content-drag hide">
            <div class="col-md-3">
                <div class="box">
                    <div class="box-content">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Story</a>
                                </li> 
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">
                                    <select class="form-control story" name="data_id" style="width: 100%"></select>
                                    <button class="btn btn-warning addtonavmenu" style="margin-top: 5px;">Thêm vào Trending <i class="fa fa-spinner fa-spin"
                                        style="display: none"></i> </button>
                                </div>
                            </div> 
                        </div>
                    </div>
                     
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="">
                    <div class="box">
                        <div class="box-header" style="margin-bottom:0px; display:flex; justify-content: flex-end;">
                            <menu id="nestable-menu" class="float-right">
                                <button class="btn btn-primary btnSaveMenu" type="button">Save</button>
                            </menu>
                        </div>
                        <div class="box-content">
                            <label id="output-menu" class="label label-info"></label>
                            <div class="dd" id="nestableDrag" style="width:100%;">
                                <ol class="dd-list"></ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.box-body -->
        <!-- /.row -->
    </section>
@endsection
@section('scripts')
    <style>
        .dd-list .action-item {
            position: absolute;
            margin: 0;
            right: 0;
            top: 0;
            cursor: pointer;
            width: 30px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background: linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            height: 100%;
            line-height: 30px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admins/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admins/js/jquery.nestable.js') }}"></script>

    <script>
        let url_ajax_load = "/admin/ajax/list-drag";
        let url_load_select = "/admin/select/list-story";
        document.addEventListener("DOMContentLoaded", function() {
            $(".select2").select2({
                allowClear: true,
                placeholder: "Select an item",
            });
            loadStory($("select.story"));

            $(".btnShowDrag").click(function() {
                let this_ = $(this);
                this_.find(".fa-spinner").show();
                $(".content-drag").removeClass('hide');
                loadStory($("select.story"));
                let key = $("select[name='key']").val(); 
                showmenus(key, 'story'); 
                this_.find(".fa-spinner").hide(); 
                return false;
            });

            $(document).on("click", ".addtonavmenu", function() {
                let select = $("select.story option:selected");
                let dragType = 'story';

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

                let dragType = $("#menu_drag").val();
                let domain = $("#menu_domains").val();

                let type = $("input[name='type']").val();
                let key = $("select[name='key']").val();


                let structure = select.nestable("serialize");
                console.log(structure);
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
                url:  "/admin/drag",
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
                                is_status:1
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
@endsection
