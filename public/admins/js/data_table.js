// Class definition
var DatatablesServerSide = (function () {
    // Shared variables
    var dt;
    // Private functions
    var initDatatable = function () {
        dt = $("#datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            pagingType: "simple",
            paging: true,
            pageLength: 10,
            stateSave: true,

            ajax: {
                url: url_ajax_list,

                type: "GET",
                // dataSrc: "data",
                dataSrc: "data",
                data: function (d) {
                    // Lấy toàn bộ query hiện tại từ URL
                    const params = new URLSearchParams(window.location.search);
                    const grouped = {};

                    params.forEach((value, key) => {
                        // Nếu key đã tồn tại trong d => convert thành mảng
                        if (d[key] !== undefined) {
                            if (!Array.isArray(d[key])) {
                                d[key] = [d[key]];
                            }
                            d[key].push(value);
                        } else {
                            d[key] = value;
                        }
                    });

                    // Gom các value của cùng 1 key vào mảng
                    params.forEach((value, key) => {
                        const decodedKey = decodeURIComponent(key);
                        // Chỉ xử lý nếu key chứa "params"
                        if (decodedKey.includes("params")) {
                            if (!grouped[decodedKey]) {
                                grouped[decodedKey] = [];
                            }
                            grouped[decodedKey].push(value);
                        }
                    });
                     
                    if (grouped) {
                        Object.keys(grouped).forEach((name) => {
                            const values = grouped[name];
                            const $field = $(`[name="${name}"]`);

                            if ($field.length) {
                                if ($field.is("select")) {
                                    if ($field.is("[multiple]")) {
                                    
                                        // Lấy giá trị hiện tại của select (nếu có)
                                        let existingValues = $field.val() || [];

                                        // Gộp giá trị hiện tại + giá trị mới, loại bỏ trùng
                                        let mergedValues = Array.from(
                                            new Set([
                                                ...existingValues,
                                                ...values,
                                            ])
                                        );

                                        // Nếu option chưa tồn tại trong select thì thêm mới
                                        mergedValues.forEach(function (
                                            element
                                        ) {
                                            if (
                                                $field.find(
                                                    'option[value="' +
                                                        element +
                                                        '"]'
                                                ).length === 0
                                            ) {
                                                $field.append(
                                                    new Option(
                                                        element,
                                                        element,
                                                        true,
                                                        true
                                                    )
                                                );
                                            }
                                        });

                                        // Set lại giá trị cho select và trigger change
                                        $field
                                            .val(mergedValues)
                                            .trigger("change");
                                    } else {
                                        $field
                                            .append(
                                                new Option(
                                                    values,
                                                    values,
                                                    true,
                                                    true
                                                )
                                            )
                                            .val(values)
                                            .trigger("change");
                                    }
                                } else if (
                                    $field.is(":checkbox") ||
                                    $field.is(":radio")
                                ) {
                                    // Checkbox hoặc radio
                                    values.forEach((v) => {
                                        $field
                                            .filter(`[value="${v}"]`)
                                            .prop("checked", true);
                                    });
                                } else {
                                    // Input thường (lấy giá trị đầu tiên)
                                    $field.val(values).trigger("change");
                                }
                            }
                        });
                        $("#form-filter-data").trigger("change_search");
                    }
                },
            },
            columns: datatables_columns,
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (i, item, data) {
                        return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data.id}" />
                            </div>`;
                    },
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                },
            ],

            bInfo: true,
            initComplete: function (oSettings) {
                //changed line
            },
            responsive: true,
            // scrollX: true,
            dom: '<"top"i>rt<"bottom"lp><"clear">', // Remove the filter element

            drawCallback: function (settings) {},
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on("draw", function () {
            initToggleToolbar();
            AutoloadDataService.init($("#datatable"));
        });
    };

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()

    var handleSearchDatatable = function () {
        $("#form-filter-data").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            let extraSearchData = {};

            // Chuyển đổi dữ liệu form thành đối tượng key-value
            formData.forEach(function (item) {
                if (item.name.includes("[]")) {
                    // Nếu name có [] (multiple), đảm bảo dữ liệu được đẩy vào mảng
                    if (extraSearchData[item.name]) {
                        extraSearchData[item.name].push(item.value);
                    } else {
                        extraSearchData[item.name] = [item.value];
                    }
                } else {
                    extraSearchData[item.name] = item.value;
                }
            });

            // Thiết lập dữ liệu tìm kiếm cho DataTable và vẽ lại
            dt.on("preXhr.dt", function (e, settings, data) {
                // Bổ sung dữ liệu tìm kiếm vào dữ liệu yêu cầu
                Object.keys(extraSearchData).forEach(function (key) {
                    data[key] = extraSearchData[key];
                });
            });

            dt.ajax.reload(); // Tải lại dữ liệu
        });
    };

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll(
            '[data-kt-docs-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const customerName = parent.querySelectorAll("td")[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text:
                        "Are you sure you want to delete " + customerName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "Deleting " + customerName,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000,
                        }).then(function () {
                            Swal.fire({
                                text: "You have deleted " + customerName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                },
                            }).then(function () {
                                // delete row data from server and re-draw datatable
                                dt.draw();
                            });
                        });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            },
                        });
                    }
                });
            });
        });
    };

    // Init toggle toolbar
    var initToggleToolbar = function () {
        // Toggle selected action toolbar
        // Select all checkboxes
        var container = $("#datatable");
        // container.find('[type="checkbox"]').each(c => {
        //
        //     // Checkbox on click event
        //     $(c).onclick(function () {
        //         setTimeout(function () {
        //             toggleToolbars();
        //         }, 50);
        //     });
        // });

        // Click vào checkbox header (chọn/bỏ chọn tất cả dòng đang hiển thị)
        $("#datatable")
            .off("change", "#checkAll")
            .on("change", "#checkAll", function () {
                const isChecked = this.checked;
                // chỉ checkbox ở trang hiện tại
                $(this)
                    .closest("table")
                    .find("tbody .row-check")
                    .each(function () {
                        $(this).prop("checked", isChecked).trigger("change");
                    });
            });

        $(document)
            .off("click", ".btnDeleteAll")
            .on("click", ".btnDeleteAll", function (ev) {
                ev.preventDefault();

                let ids = [];
                $("#datatable tbody .row-check:checked").each(function () {
                    ids.push($(this).val());
                });

                if (ids.length === 0) {
                    Notification_Static.errors(
                        "Vui lòng chọn ít nhất 1 bản ghi để xóa!"
                    );
                    return;
                }

                let method = $(this).data("method");
                let action = $(this).data("action");

                Swal.fire({
                    title: `Bạn có chắc chắn xóa ${ids.length} bản ghi này?`,
                    text: "Bạn không thể khôi phục những bản ghi này sau khi xóa!",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: action,
                            type: method,
                            data: { ids: ids },
                            dataType: "JSON",
                            success: function (data) {
                                if (data.status === "success") {
                                    Notification_Static.success(
                                        "Xóa thành công!",
                                        "Bản ghi đã được xóa."
                                    );
                                } else if (data.status === "warning") {
                                    Notification_Static.success(data.message);
                                }
                                initReloadDataTable();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                Notification_Static.errors(
                                    "Lỗi!!! Liên hệ Hiệp để xử lý...",
                                    jqXHR.status
                                );
                            },
                        });
                    } else if (result.dismiss === "cancel") {
                        Notification_Static.errors(
                            "Hủy bỏ thành công!",
                            "Bản ghi của bạn đã được an toàn :)"
                        );
                    }
                });
            });

        $(document)
            .off("click", ".btnDelete")
            .on("click", ".btnDelete", function (ev) {
                ev.preventDefault();
                let id = $(this)
                    .closest("tr")
                    .find('input[type="checkbox"]')
                    .val();

                let method = $(this).data("method");
                let action = $(this).data("action");
                Swal.fire({
                    title: "Bạn có chắc chắn xóa những bản ghi này ?",
                    text: "Bạn không thể khôi phục những bản ghi này sau khi xóa!",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        $.ajax({
                            url: action,
                            type: method,
                            data: { id: id },
                            dataType: "JSON",
                            success: function (data) {
                                if (data.status === "success") {
                                    Notification_Static.success(
                                        "Xóa thành công!",
                                        "Bản ghi đã được xóa."
                                    );
                                }
                                if (data.status === "warning") {
                                    Notification_Static.success(data.message);
                                }
                                initReloadDataTable();
                                return true;
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(errorThrown);
                                console.log(textStatus);
                                console.log(jqXHR);
                                Notification_Static.errors(
                                    "Lỗi!!! Liên hệ Hiệp để xử lý...",
                                    jqXHR.status
                                );
                                return true;
                            },
                        });
                    } else if (result.dismiss === "cancel") {
                        Notification_Static.errors(
                            "Hủy bỏ thành công !",
                            "Bản ghi của bạn đã được an toàn :)"
                        );
                    }
                });
            });

        $(document)
            .off("click", ".btnUpdateField")
            .on("click", ".btnUpdateField", function (ev) {
                ev.preventDefault();
                let id = $(this)
                    .closest("tr")
                    .find('input[type="checkbox"]')
                    .val();
                let field = $(this).data("field");
                let value = $(this).data("value");
                let url = $(this).data("url");
                let obj = {};
                obj[field] = value;
                $.ajax({
                    url: url,
                    type: "PUT",
                    data: obj,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status === "success") {
                            Notification_Static.success(
                                "Thành công!",
                                "Bản ghi đã sửa xóa."
                            );
                        }
                        if (data.status === "warning") {
                            Notification_Static.success(data.message);
                        }
                        initReloadDataTable();
                        return true;
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                        console.log(textStatus);
                        console.log(jqXHR);
                        Notification_Static.errors(
                            "Lỗi!!! Liên hệ Hiệp để xử lý...",
                            jqXHR.status
                        );
                        return true;
                    },
                });
            });

        $(document)
            .off("click", ".btnExport")
            .on("click", ".btnExport", function (e) {
                e.preventDefault();
                const action = $(this).data("action"); // ví dụ /export
                const query = $("#form-filter-data").serialize(); // biến form thành query string
                Swal.fire({
                    title: "Bạn có chắc export những bản ghi này ?",
                    text: "Export những bản ghi theo bộ lọc hiện tại!",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, export!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value)
                        window.open(action + "?" + query, "_blank");
                });
            });
    };

    var initReloadDataTable = function () {
        $("#form-filter-data").closest(".box-body").hide();
        $("#form-filter-data").closest(".box").addClass("collapsed-box");
        // Reload the DataTables with the modified settings
        dt.ajax.reload(null, false);
    };

    var initReloadDataTableDeleteSearch = function () {
        $("#form-filter-data").find("input, select, textarea").val("");
        document.getElementById("form-filter-data").reset();
        // Attach event handler to modify request data before it is sent
        dt.on("preXhr.dt", function (e, settings, data) {
            // Log the data object before modification
            console.log("Before modification:", data);

            // Reset custom search data
            if (data.search) {
                data.search.value = ""; // Reset the global search value
            }
            Object.keys(data).forEach((key) => {
                if (key.includes("params")) {
                    delete data[key];
                }
            });
            // Log the data object after modification
        });
        $("#form-filter-data").closest(".box-body").hide();
        $("#form-filter-data").closest(".box").addClass("collapsed-box");
        // Reload the DataTables with the modified settings
        dt.ajax.reload(null, false);
        window.history.replaceState(
            {},
            document.title,
            window.location.pathname
        );
    };
    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();

            $(document).on("click", ".btnReload", function () {
                DatatablesServerSide.initReloadSearch();
            });
        },
        initReload: function () {
            initReloadDataTable();
        },
        initReloadSearch: function () {
            initReloadDataTableDeleteSearch();
        },
    };
})();
