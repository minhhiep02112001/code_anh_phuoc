@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="table-data__tool mb-0">
                        <div class="table-data__tool-left">
                            <h3 class="card-title">Category</h3>
                        </div>
                        <div class="table-data__tool-right">
                            <button type="button" data-action="{{ route('admin.crawler.store') }}" data-method="POST"
                                class="btn btn-success btn-sm btnAddForm"><i class="fa fa-plus"></i> Thêm
                                mới
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal_form_inport">
                                Import
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
                <div class="card-body p-1 pt-2">
                    <div class="collapse" id="formSearch">
                        <form action="" id="form-filter-data" class="p-1 border rounded bg-light">
                            <fieldset>
                                <legend class="w-auto ">Tìm kiếm:</legend>
                                <div class="form-row">
                                    <!-- Title Input -->
                                    <div class="form-group col-md-4">
                                        <label for="filterTitle">Keyword:</label>
                                        <input type="text" name="params[key_word]" class="form-control" id="filterTitle"
                                            placeholder="Nhập tiêu đề...">
                                    </div>
                                    <!-- Email Input -->
                                    <div class="form-group col-md-4">
                                        <label>Trạng thái:</label>
                                        <select name="params[is_status]" class="form-control select2-option input-sm">
                                            <option value=""></option>
                                            @foreach (config('data.status_crawler') as $k => $item)
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


    <div class="modal fade" id="modal_form_inport" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div
                    style="width: 100%; padding: 15px; border-bottom: 1px solid #e5e5e5; position:relative;display: flex;justify-content:space-between; align-items: center;">
                    <h3 class="modal-title" id="formModalLabel">Import</h3>
                    <div style="display: inline-block;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSaveImport">Submit</button>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_upload_import" action="{{ route('admin.crawler.import') }}"
                        enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
                    className: "text-center",
                    selector: {
                        class: "m-checkbox--solid m-checkbox--brand"
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
                    title: "Keyword",
                    width: 250,
                    orderable: false,
                },
                {
                    data: null,
                    width: 250,
                    className: "text-left",
                    title: "Thông tin",
                    render: function(t, e, item) {
                        let content = "<ul>";
                        content += `<li>Address: ${item.address  || ''}</li>`;
                        content += `<li>Review google: ${item.google_review || 0}</li>`;
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
            Notification_Static.errors(data.responseJSON?.message || 'Có lỗi xảy ra');
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
