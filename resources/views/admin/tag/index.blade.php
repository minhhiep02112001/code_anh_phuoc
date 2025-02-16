@extends('admin._index')
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="table-data__tool mb-0">
                        <div class="table-data__tool-left">
                            <h3 class="card-title">Danh Sách</h3>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small btn-call-modal" id="btnAddData"
                                data-url-form="{{ route('admin.tag.create') }}">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Tìm kiếm</button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Reload</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1 pt-2">
                    <div class="col-md-12">
                        <form id="form_search_data_table">
                            <div class="row" id="search_data_table">
                                <div class="form-group col-4">
                                    <input type="text" class="form-control" name="title" placeholder="Search text">
                                </div>
                                <div class="form-group col-2">
                                    <select name="is_status" class="form-control" aria-placeholder="Trạng thái">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="0">Không hiển thị</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <select name="is_robot" class="form-control" aria-placeholder="Trạng thái">
                                        <option value="">Google Index</option>
                                        <option value="0">No index</option>
                                        <option value="1">Index</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12">

                        <!-- DATA TABLE -->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="data_table">

                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admins/js/tinymce.js') }}"></script>

    <script>
        //setting url
        var url_ajax_list = window.APP_URL + "/admin/ajax/tag";
        var url_ajax_edit = window.APP_URL + "/admin/tag";
        console.log(url_ajax_list);
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
                    className: 'text-center',
                    orderable: false,
                    width: 50,
                },
                {
                    data: "title",
                    title: "Thể loại",
                    className: 'text-center',
                    width: 250,
                    orderable: false,
                },
                {
                    data: "is_status",
                    title: "Status",
                    orderable: false,
                    className: 'text-center',
                    width: 50,
                    render: function(t, item, data) {
                        let url = url_ajax_edit + "/" + data.id;
                        let status = data.is_status;
                        let index = data.is_robot;
                        let home = data.is_home;
                        var e = {
                            0: {
                                title: "Chờ duyệt",
                                class: "badge-danger"
                            },
                            1: {
                                title: "Hiển thị",
                                class: "badge-success"
                            },
                            2: {title: "Mới crawler", class: "badge badge-primary"},
                            3: {title: "Đang 301", class: "badge badge-secondary"},
                            4: {title: "Hủy", class: "badge badge-danger"},
                        };
                        var r = {
                            0: {
                                title: "No index",
                                class: "badge-danger"
                            },
                            1: {
                                title: "Index",
                                class: "badge-success"
                            },
                        };
                        var h = {
                            0: {
                                title: "Hide home",
                                class: "badge-danger"
                            },
                            1: {
                                title: "Show home",
                                class: "badge-success"
                            },
                        };
                        let html =
                            '<div style="white-space:nowrap;"><span data-field="is_status" data-url="' +
                            url + '" data-id="' + data
                            .id + '" data-value="' + (status == 1 ? 0 : 1) + '" class="' + e[status].class +
                            ' btnUpdateField p-1">' + e[status].title + "</span>";
                        html += '<span data-field="is_robot" data-url="' + url +
                            '" style="margin-left: 5px;"  data-id="' + data.id + '"  data-value="' + (
                                index == 1 ? 0 : 1) + '" class="' + r[index].class +
                            ' btnUpdateField  p-1">' +
                            r[index].title + "</span>";
                        html += '<span data-field="is_home" data-url="' + url +
                            '" style="margin-left: 5px;"  data-id="' + data.id + '"  data-value="' + (
                                home == 1 ? 0 : 1) + '" class="' + h[home].class +
                            ' btnUpdateField  p-1">' +
                            h[home].title + "</span></div>";
                        return html;
                    }
                },
                {
                    data: null,
                    width: 30,
                    title: "Actions",
                    className: 'pr-0',
                    render: function(t, e, item) {
                        let url_edit = url_ajax_edit + "/" + item.id + '/edit';
                        let url = url_ajax_edit + "/" + item.id;
                        let content = '<div style="white-space:nowrap;">';
                        content +=
                            `<button style="margin-right: 5px;" data-url-form="${url_edit}" data-method="PUT"  class="btn btn-sm btn-warning  btn-call-modal" data-id="${item.id}">Sửa</button>`;
                        content +=
                            `<button data-action="${url}" data-method="DELETE" data-id="${item.id}" class="btn btn-sm btn-danger  btnDelete">Xóa</button>`;
                        content += "</div>"
                        return content;
                    }
                }
            ];
            // On document ready
            DatatablesServerSide.init();
        });
        $(document).ready(function(e) {
            AutoloadDataService.init($(document));
        });
    </script>
@endpush
