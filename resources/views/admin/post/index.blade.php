@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="table-data__tool mb-0">
                        <div class="table-data__tool-left">
                            <h3 class="card-title">Brand</h3>
                        </div>
                        <div class="table-data__tool-right">
                            <button type="button" data-action="{{ route('admin.post.store') }}" data-method="POST"
                                class="btn btn-success btn-sm btnAddForm"><i class="fa fa-plus"></i> Thêm
                                mới
                            </button>

                            <button type="button" data-toggle="collapse" data-target="#formSearch" aria-expanded="false"
                                aria-controls="formSearch" class="btn btn-warning btn-sm"><i class="fa fa-filter"></i>
                                Tìm kiếm
                            </button>
                            {{-- <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-gears"></i> Quản
                                lý
                            </button> --}}
                            <button type="button" class="btn btn-info btn-sm btnReload"><i class="fa fa-refresh"></i>
                                Reload
                                Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1 pt-2" id="data-body">
                    <div class="collapse" id="formSearch">
                        <form action="" id="form-filter-data" class="p-1 border rounded bg-light">
                            <fieldset>
                                <legend class="w-auto ">Tìm kiếm:</legend>
                                <div class="form-row">
                                    <!-- Title Input -->
                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Tiêu đề:</label>
                                        <input type="text" name="params[title]" class="form-control" id="filterTitle"
                                            placeholder="Nhập tiêu đề...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Địa chỉ:</label>
                                        <input type="text" name="params[address]" class="form-control" id="filterTitle"
                                            placeholder="Nhập địa chỉ...">
                                    </div>
                                    <!-- Email Input -->
                                    <div class="form-group col-md-4">
                                        <label>Trạng thái:</label>
                                        <select name="params[is_status]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            @foreach (config('data.status') as $k => $item)
                                                <option value="{{ $k }}">{{ $item['title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Google:</label>
                                        <select name="params[is_robot]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            <option value="0">No Index</option>
                                            <option value="1">Index</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Thumbnail:</label>
                                        <select name="params[is_thumbnail]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            <option value="0">Not Exists</option>
                                            <option value="1">Exists</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>OrderBy:</label>
                                        <select name="params[order_by]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            <option value="created_at__asc"> Ngày tăng dần </option>
                                            <option value="created_at__desc"> Ngày giảm giần </option>

                                            <option value="review_google__asc"> Review google tăng dần </option>
                                            <option value="review_google__desc"> Review google giảm giần </option>

                                            <option value="publish_at__asc">Ngày publish tăng dần </option>
                                            <option value="publish_at__desc">Ngày publish giảm giần </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-sm">Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- DATA TABLE -->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3" id="datatable">

                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>

    @if ($type == 'top_list')
        @include('admin.page.form')
    @else
        @include('admin.post.form')
    @endif
@endsection

@push('scripts')
    <script>
        //setting url
        var url_ajax_list = window.APP_URL + "/admin/ajax/post?type={{ $type }}";
        var url_ajax_edit = window.APP_URL + "/admin/post";
        // Dom Ready

        $(document).ready(function () {
            datatables_columns = [{
                data: "checkID",
                width: 20,
                orderable: false,
                visible: false,
                className: 'text-center'
            },
            {
                data: "id",
                title: "ID",
                className: "text-center",
                orderable: false,
                width: 50,
            },
            {
                data: "thumbnail",
                title: "Hình ảnh",
                className: "text-center",
                width: 50,
                orderable: false,
            },
            {
                data: "title_link",
                title: "Tiêu đề",
                width: 250,
                orderable: false,
            },
            {
                data: null,
                width: 250,
                className: "text-left",
                title: "Thông tin",
                render: function (t, e, item) {
                    let content = "<ul>";
                    // content += `<li>Sub: ${item.sub ||''}</li>`;
                    content += `<li>Address: ${item.address || ''}</li>`;
                    content += `<li>Review google: ${item.review_google || 0}</li>`;
                    if (item.is_thumbnail) content += `<li class="badge-warning">Thiếu thumbnail</li>`;
                    if (item.is_thumb_block_1) content +=
                        `<li class="badge-warning">Thiếu thumbnail block</li>`;
                    content += "</ul>";
                    return content;
                }
            },
            {
                data: "is_status",
                title: "Status",
                className: "text-center",
                orderable: false,
                width: 50,
                render: function (t, item, data) {
                    let url = url_ajax_edit + "/" + data.id;
                    let status = data.is_status;
                    let _index = data.is_robot;
                    let html = '<span data-field="is_status" data-url="' + url + '" data-id="' + data
                        .id +
                        '" data-value="' + (status == 1 ? 0 : 1) + '" class="' + _status[status].class +
                        ' btnUpdateField">' + _status[status].title + "</span>";

                    html += '<span data-field="is_robot" data-url="' + url + '" data-id="' + data.id +
                        '" data-value="' + (_index == 1 ? 0 : 1) + '" class="' + _google_index[_index]
                            .class +
                        ' btnUpdateField">' + _google_index[_index].title + "</span>";
                    return html;
                }
            },
            {
                data: null,
                width: 150,
                className: "text-left",
                title: "Actions",
                render: function (t, item, item) {

                    let url_edit = url_ajax_edit + "/" + item.id + '/edit';
                    let url = url_ajax_edit + "/" + item.id;
                    let content = '';

                    content += "<ul>";
                    content += `<li>Ngày tạo: ${item.created_at}</li>`;
                    content += `<li>Ngày sửa: ${item.updated_at}</li>`;
                    content += "</ul>";

                    content +=
                        `<button style="margin-right: 5px;" data-action="${url}" data-method="PUT"  class="btn btn-sm btn-warning  btnEdit" data-id="${item.id}">Sửa</button>`;
                    content +=
                        `<button data-action="${url}" data-method="DELETE" data-id="${item.id}" class="btn btn-sm btn-danger  btnDelete">Xóa</button>`;

                    return content;
                }
            }
            ];
            // On document ready

            DatatablesServerSide.init();
            AJAX_CRUD_MODAL.init();
            AJAX_CRUD_MODAL.tinymce();
            SEO.init_slug();
            $(document).on('click', '.btnEdit', function () {
                let modal_form = $('#modal_form');
                let id = $(this).attr('data-id');
                let action = $(this).data('action');
                let method = $(this).data('method');
                $(modal_form).find('form').attr('data-method', method).attr('data-action', action);
                AJAX_CRUD_MODAL.edit(function () {
                    $.ajax({
                        url: url_ajax_edit + "/" + id,
                        type: "GET",
                        dataType: "JSON",
                        success: function (response) {

                            AJAX_CRUD_MODAL.fillFormByData(modal_form, response
                                ?.data_info || {},
                                function (key, value, element) {

                                    // 🔥 đặt xử lý custom ở đây
                                    // ví dụ: nếu key === 'status' muốn toggle switch
                                    // if (key === 'status') {
                                    //     element.prop("checked", value == 1);
                                    //     return false; // override → không chạy xử lý mặc định
                                    // }
                                    if (key == 'thumbnails') {
                                        var file_paths = value.map(
                                            (item) => item.thumbnail
                                        );
                                        // Update input value and preview 
                                        let _parent_dom = $('div[data-field-name="thumbnails"]')
                                            .closest(
                                                ".gallery-upload");
                                        if (_parent_dom.find(".gallery-list").length == 0) {
                                            $(_parent_dom).append(
                                                '<div class="gallery-list p-1"></div>'
                                            );
                                        }
                                        FUNC.showGallery(
                                            _parent_dom.find(".gallery-list"),
                                            'thumbnails',
                                            file_paths
                                        );
                                    }

                                    if (key == 'menus') {
                                        var file_paths = value.map(
                                            (item) => item.thumbnail
                                        );
                                        // Update input value and preview 
                                        let _parent_dom = $('div[data-field-name="menus"]')
                                            .closest(
                                                ".gallery-upload");
                                        if (_parent_dom.find(".gallery-list").length == 0) {
                                            $(_parent_dom).append(
                                                '<div class="gallery-list p-1"></div>'
                                            );
                                        }
                                        FUNC.showGallery(
                                            _parent_dom.find(".gallery-list"),
                                            'menus',
                                            file_paths
                                        );
                                    }

                                });


                            modal_form.modal('show');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
                            console.log(textStatus);
                            console.log(jqXHR);
                        }
                    });
                    return false;
                });
            });
        });
    </script>
@endpush