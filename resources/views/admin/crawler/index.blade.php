@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="table-data__tool mb-0">
                        <div class="table-data__tool-left">
                            <h3 class="card-title">Data crawler</h3>
                        </div>
                        <div class="table-data__tool-right">
                            <button type="button" data-action="{{ route('admin.crawler.store') }}" data-method="POST"
                                class="btn btn-success btn-sm btnAddForm"><i class="fa fa-plus"></i> Thêm
                                mới
                            </button>

                            <button type="button" data-toggle="collapse" data-target="#formSearch" aria-expanded="false"
                                aria-controls="formSearch" class="btn btn-warning btn-sm"><i class="fa fa-filter"></i>
                                Tìm kiếm
                            </button>

                            <button type="button" data-action="{{ route('admin.crawler.import') }}" data-method="POST"
                                class="btn btn-sm btn-outline-primary btnImport"><i class="fas fa fa-mail-reply-all"></i>
                                Import
                            </button>

                            <button type="button" class="btn  btn-sm btn btn-outline-primary btnExport"
                                data-action="{{ route('admin.crawler.export') }}" data-method="POST">
                                <i class="fas fa-arrow-down"></i>
                                Export
                            </button>

                            <button type="button" class="btn btn-danger btn-sm btnDeleteAll"
                                data-action="{{ route('admin.removeAll.crawler') }}" data-method="DELETE"><i
                                    class="fa fa-gears"></i>
                                Xóa</button>

                            <button type="button" class="btn btn-info btn-sm btnReload"><i class="fa fa-refresh"></i>
                                Reload
                                Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1 pt-2">
                    <div class="collapse" id="formSearch">
                        <form action="" id="form-filter-data" class="p-1 border rounded bg-light">
                            <fieldset>
                                <legend class="w-auto ">Tìm kiếm:</legend>
                                <div class="form-row">
                                    <!-- Title Input -->
                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Keyword:</label>
                                        <select class="form-control select2_suggest em-keyword" data-query-is_status="1"
                                            id="keyword_filter" name="params[crawler_id][]" data-module="keyword" multiple
                                            style="width: 100%;">
                                        </select>
                                    </div>

                                    <!-- Email Input -->

                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Tiêu đề:</label>
                                        <input type="text" name="params[key_word]" class="form-control" id="filterTitle"
                                            placeholder="Nhập tiêu đề...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Trạng thái:</label>
                                        <select name="params[is_status]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            @foreach (config('data.status_crawler') as $k => $item)
                                                <option value="{{ $k }}">{{ $item['title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Thêm mới từ ngày:</label>
                                        <input type="text" name="params[created_at][gte]"
                                            class="form-control pick_datetime" id="params[created_at][gte]"
                                            placeholder="Từ ngày...">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Thêm mới đến ngày:</label>
                                        <input type="text" name="params[created_at][lte]"
                                            data-default-time="{{ \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('H:i') }}"
                                            class="form-control pick_datetime" id="params[created_at][lte]"
                                            placeholder="Đến ngày...">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>OrderBy:</label>
                                        <select name="params[order_by]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            <option value="created_at__asc"> Ngày tạo tăng dần </option>
                                            <option value="created_at__desc"> Ngày tạo giảm giần </option>

                                            <option value="review_google__asc"> Review google tăng dần </option>
                                            <option value="review_google__desc"> Review google giảm giần </option>

                                            <option value="updated_at__asc">Ngày cập nhật tăng dần </option>
                                            <option value="updated_at__desc">Ngày cập nhật giảm giần </option>
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
@endsection

@push('scripts')
    @include('admin.keyword.import')
    @include('admin.crawler.form')
    <script>
        //setting url
        var url_ajax_list = window.APP_URL + "/admin/ajax/crawler";
        var url_ajax_edit = window.APP_URL + "/admin/crawler";
        // Dom Ready

        const _status_crawler = @json(config('data.status_crawler'));
        $(document).ready(function() {

            datatables_columns = [{
                    data: null,
                    width: 24,
                    orderable: false,
                    className: "text-left",
                    title: `<input type="checkbox" id="checkAll">`, // checkbox ở header
                    render: function(data, type, row) {
                        return `<input type="checkbox" class="row-check" value="${row.id}">`;
                    }
                },
                {
                    data: "id",
                    title: "ID",
                    orderable: false,
                    width: 50,
                },
                {
                    data: null,
                    title: "Tiêu đề",
                    width: 250,
                    orderable: false,
                    render: function(t, e, item) {
                        let html = `<h5>${item.key_word}</h5>`;
                        if (item.crawler_id) {
                            let content = "<ul style='margin-left:20px;margin-top:10px;'>";
                            content +=
                                `<li>Keyword:  <span class='em-keyword' data-id="${item.crawler_id}">${item.crawler_id}</span></li>`;
                            content += "</ul>";
                            html += content
                        }

                        return html;
                    }
                },

                {
                    data: null,
                    width: 250,
                    className: "text-left",
                    title: "Thông tin",
                    render: function(t, e, item) {
                        let content = "<ul>";
                        content += `<li>Address: ${item.address || ''}</li>`; 
                        content += `<li>Review google: ${item.google_review || 0}</li>`;

                        if (item.relate_id) content += `<li>Brand: ${item.relate_id}</li>`;
                        if (item.website) content += `<li>Website: ${item.website}</li>`;
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
                    render: function(t, item, data) {
                        let url = url_ajax_edit + "/" + data.id;
                        let status = data.is_status;
                        let html = '<span data-field="is_status" data-url="' + url + '" data-id="' + data
                            .id +
                            '" data-value="' + (status == 1 ? 0 : 1) + '" class="' + _status_crawler[status]
                            .class +
                            ' ">' + _status_crawler[status].title + "</span>";
                        return html;
                    }
                },
                {
                    data: null,
                    width: 50,
                    title: "Actions",
                    render: function(t, e, item) {
                        let url = url_ajax_edit + "/" + item.id;
                        let content = '';
                        content += "<ul>";
                        content += `<li class="nowrap"><b>Ngày tạo</b>: ${item.created_at}</li>`;
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
            $(document).on('click', '.btnEdit', function() {
                let modal_form = $('#modal_form');
                let id = $(this).attr('data-id');
                let action = $(this).data('action');
                let method = $(this).data('method');
                $(modal_form).find('form').attr('data-method', method).attr('data-action', action);
                AJAX_CRUD_MODAL.edit(function() {
                    $.ajax({
                        url: url_ajax_edit + "/" + id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(response) {
                            $.each(response.data_info, function(key, value) {
                                let element = modal_form.find('[name="' + key +
                                    '"]');
                                $(element).val(value);
                                if (element.hasClass('switchBootstrap')) {
                                    element.prop('checked', value);
                                    // element.bootstrapSwitch('state', (value == 1 ? true : false));
                                }
                            });
                            let element = modal_form.find('[name="content"]');

                            if (element.hasClass('tinymce') && response.data_info
                                .content) {
                                tinymce.get(element.attr('id')).setContent(response
                                    .data_info.content);
                            }
                            element.val(response.data_info.content);

                            if (response.data_info.parent_id) {
                                var newOption = new Option(response.data_info.parent_id,
                                    response.data_info.parent_id, true, true);
                                // Append it to the select
                                $('#category').append(newOption).trigger('change');
                            }

                            if (response.data_info.thumbnail) {
                                let parent_thumb = modal_form.find(
                                    'div[data-field-name="thumbnail"] .upload-box');
                                parent_thumb.find('img').addClass('show').attr('src',
                                    FUNC.getImageThumb(response.data_info.thumbnail)
                                );
                                parent_thumb.append(
                                    `<input type="hidden" name="thumbnail" value="${response.data_info.thumbnail}">`
                                );
                            }
                            modal_form.modal('show');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
                            console.log(textStatus);
                            console.log(jqXHR);
                        }
                    });
                    return false;
                });
            });


            $(document).on('click', '.btnSaveImport', function(e) {
                console.log("click");

                $("#form_upload_import").submit()
            })
            $(document).on('submit', '#form_upload_import', function(e) {
                e.preventDefault();

                let form = $(this);
                let formData = new FormData(this); // Sử dụng FormData để xử lý dữ liệu upload file

                $.ajax({
                    type: form.attr('method'), // Lấy phương thức từ form
                    url: form.attr('action'), // Lấy URL từ form
                    data: formData, // Gửi dữ liệu qua AJAX
                    processData: false, // Không xử lý dữ liệu (vì là FormData)
                    contentType: false, // Không đặt contentType (vì là FormData)
                    success: function(data) {
                        console.log('true');
                        Notification_Static.success(data.message);
                    },
                    error: function(data) {
                        Notification_Static.errors(data.responseJSON?.message ||
                            'Có lỗi xảy ra');
                        console.log('false');
                    }
                });
            });
        });
        // $(document).ready(function (e) {
        //     AutoloadDataService.init($(document));
        // });
    </script>
@endpush
