@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="table-data__tool mb-0">
                        <div class="table-data__tool-left">
                            <h3 class="card-title">Bài viết</h3>
                        </div>
                        <div class="table-data__tool-right">
                            <button type="button" data-action="{{ route('admin.product.store') }}" data-method="product"
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
@endsection

@push('scripts')
    @include('admin.product.form')
    <script>
        //setting url
        var url_ajax_list = window.APP_URL + "/admin/ajax/product";
        var url_ajax_edit = window.APP_URL + "/admin/product";
        // Dom Ready

        $(document).ready(function() {
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
                    render: function(t, e, item) {
                        let content = "<ul class='ml-0 pl-0'>";
                        content += `<li>Số lượng: ${item.quantity || 0}</li>`;
                        content += `<li>Lượt xem: ${item.viewed || 0}</li>`;
                        content += `<li>Lượt mua: ${item.buy || 0}</li>`;
                        content += `<li>Đánh giá: ${item.total_vote || 0}</li>`;
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
                    render: function(t, item, item) {

                        let url_edit = url_ajax_edit + "/" + item.id + '/edit';
                        let url = url_ajax_edit + "/" + item.id;
                        let content = '';

                        content += "<ul>";
                        content += `<li style="white-space:nowrap">Ngày publish: ${item.publish_at}</li>`;
                        content += `<li style="white-space:nowrap">Ngày tạo: ${item.created_at}</li>`;
                        content += `<li style="white-space:nowrap">Ngày sửa: ${item.updated_at}</li>`;
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
                            let content = modal_form.find('[name="content"]');
                            let content_menu = modal_form.find('[name="content_menu"]');
                            let content_photo = modal_form.find(
                                '[name="content_photo"]');
                            let content_footer = modal_form.find(
                                '[name="content_footer"]');
                            let time_open = modal_form.find(
                                '[name="time_open"]');
                            let content_about = modal_form.find(
                                '[name="content_about"]');

                            if (content.hasClass('tinymce') && response.data_info
                                .content) {
                                tinymce.get(content.attr('id')).setContent(response
                                    .data_info.content);
                                content.val(response.data_info.content);
                            }


                            if (content_menu.hasClass('tinymce') && response.data_info
                                .content_menu) {
                                tinymce.get(content_menu.attr('id')).setContent(response
                                    .data_info.content_menu);
                                content_menu.val(response.data_info.content_photo);
                            }

                            if (content_photo.hasClass('tinymce') && response.data_info
                                .content_photo) {
                                tinymce.get(content_photo.attr('id')).setContent(
                                    response
                                    .data_info.content_photo);
                                content_photo.val(response.data_info.content_photo);
                            }

                            if (content_footer.hasClass('tinymce') && response.data_info
                                .content_footer) {
                                tinymce.get(content_footer.attr('id')).setContent(
                                    response
                                    .data_info.content_footer);
                                content_footer.val(response.data_info.content_footer);
                            }

                            if (time_open.hasClass('tinymce') && response.data_info
                                .time_open) {
                                tinymce.get(time_open.attr('id')).setContent(
                                    response
                                    .data_info.time_open);
                                time_open.val(response.data_info.time_open);
                            }

                            if (content_about.hasClass('tinymce') && response.data_info
                                .content_about) {
                                tinymce.get(content_about.attr('id')).setContent(
                                    response
                                    .data_info.content_about);
                                content_about.val(response.data_info.content_about);
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
                            if (response.data_info.favicon) {
                                let parent_thumb = modal_form.find(
                                    'div[data-field-name="favicon"] .upload-box');
                                parent_thumb.find('img').addClass('show').attr('src',
                                    FUNC.getImageThumb(response.data_info.favicon)
                                );
                                parent_thumb.append(
                                    `<input type="hidden" name="favicon" value="${response.data_info.favicon}">`
                                );
                            }
                            if (response.data_info.logo_share) {
                                let parent_thumb = modal_form.find(
                                    'div[data-field-name="logo_share"] .upload-box');
                                parent_thumb.find('img').addClass('show').attr('src',
                                    FUNC.getImageThumb(response.data_info
                                        .logo_share)
                                );
                                parent_thumb.append(
                                    `<input type="hidden" name="logo_share" value="${response.data_info.logo_share}">`
                                );
                            }

                            if (response.data_info.config_social) {
                                for (let element in response.data_info.config_social) {
                                    let _val = response.data_info.config_social[
                                        element] ?? '';
                                    if ($(`[name="config_social[${element}]"]`).length >
                                        0 && _val) {
                                        $(`[name="config_social[${element}]"]`).val(
                                            _val)
                                    }
                                }
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
        });
    </script>
@endpush
