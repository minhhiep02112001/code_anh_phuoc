@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="table-data__tool mb-0">
                        <div class="table-data__tool-left">
                            <h3 class="card-title">Keyword</h3>
                        </div>
                        <div class="table-data__tool-right">

                            <button type="button" class="btn btn-secondary btn-sm"
                                data-action="{{ route('admin.crawler.index') }}" id="btnFilterDbData"><i
                                    class="fa fa-filter"></i>
                                Lọc data Crawler
                            </button>

                            <button type="button" data-action="{{ route('admin.keyword.import') }}" data-method="POST"
                                class="btn btn-primary btn-sm btnImport"><i class="fa fa-plus"></i> Import
                            </button>

                            <button type="button" data-action="{{ route('admin.keyword.store') }}" data-method="POST"
                                class="btn btn-success btn-sm btnAddForm"><i class="fa fa-plus"></i> Thêm
                                mới
                            </button>

                            <button type="button" data-toggle="collapse" data-target="#formSearch" aria-expanded="false"
                                aria-controls="formSearch" class="btn btn-warning btn-sm"><i class="fa fa-filter"></i>
                                Tìm kiếm
                            </button>

                            <button type="button" class="btn btn-danger btn-sm btnDeleteAll"
                                data-action="{{ route('admin.removeAll.keyword') }}" data-method="DELETE"><i
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
                                        <label for="filterTitle">Tiêu đề:</label>
                                        <input type="text" name="params[title]" class="form-control" id="filterTitle"
                                            placeholder="Nhập tiêu đề...">
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
                                    <!-- Email Input -->
                                    <div class="form-group col-md-4">
                                        <label>Trạng thái:</label>
                                        <select name="params[is_status]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            @foreach (config('data.status_keyword') as $k => $item)
                                                <option value="{{ $k }}">{{ $item['title'] }}</option>
                                            @endforeach
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
    @include('admin.keyword.form')
    <script>
        //setting url
        var url_ajax_list = window.APP_URL + "/admin/ajax/keyword";
        var url_ajax_edit = window.APP_URL + "/admin/keyword";
        // Dom Ready
        const _status_crawler = @json(config('data.status_keyword'));
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
                    data: "key_word",
                    title: "Tiêu đề",
                    width: 250,
                    orderable: false,
                },
                {
                    data: "created_at",
                    title: "Ngày Tạo",
                    width: 250,
                    orderable: false,
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
                            ' btnUpdateField">' + _status_crawler[status].title + "</span>";
                        return html;
                    }
                },
                {
                    data: null,
                    width: 20,
                    title: "Actions",
                    render: function(t, e, item) {
                        let url = url_ajax_edit + "/" + item.id;
                        let content = '';
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

            $(document).on('click', '#btnFilterDbData', function() {
                let arrs = [];
                $("#datatable").find('input.row-check:checked').each(function() {
                    arrs.push($(this).val())
                })

                let url = $(this).attr('data-action');
                if (arrs.length == 0) {
                    Swal.fire({
                        title: "Warning!",
                        text: "Vui lòng tích vào chọn bản ghi lọc!",
                        icon: "warning"
                    });
                    return;
                }
                const query = $.param({
                    'params[crawler_id][]': arrs
                });
                // -> "params%5Bcrawler_id%5D%5B%5D=1160&params%5Bcrawler_id%5D%5B%5D=1161"
                const newUrl = url + (url.includes('?') ? '&' : '?') + query; 
                window.open(newUrl, '_blank');
            });
        });
        // $(document).ready(function (e) {
        //     AutoloadDataService.init($(document));
        // });
    </script>
@endpush
