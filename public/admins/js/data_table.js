// Class definition
var DatatablesServerSide = (function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

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
            // toggleToolbars();
            // handleDeleteRows();
            // KTMenu.createInstances();
        });

        function generateTableManagement(d, settings) {
            var api = new $.fn.dataTable.Api(settings);
            var values = {};
            values.first_row = getFristRowTable("ma_base_tab");
            values.last_row = getLastRowTable("ma_base_tab");
            values.direction = "prev";
            if (d.start < api.page.info.start) {
                //not working they are ===
                values.direction = "next";
            }
            return values;
        }
    };

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        $("#form-filter-data").on("submit", function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            let extraSearchData = {};

            // Chuyển đổi dữ liệu form thành đối tượng key-value
            formData.forEach(function (item) {
                extraSearchData[item.name] = item.value;
            });

            // Thiết lập dữ liệu tìm kiếm cho DataTable và vẽ lại
            dt.on("preXhr.dt", function (e, settings, data) {
                // Bổ sung dữ liệu tìm kiếm vào dữ liệu yêu cầu
                formData.forEach(function (item) {
                    data[item.name] = item.value;
                });
            });
            dt.ajax.reload(); // Tải lại dữ liệu
        });
        // var filterSearch = document.querySelector('input[name="table_search"]');
        // if (filterSearch) {
        //     filterSearch.addEventListener("keyup", function (e) {
        //         dt.search(e.target.value).draw();
        //     });
        // }
    };

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterPayment = document.querySelectorAll(
            '[data-kt-docs-table-filter="payment_type"] [name="payment_type"]'
        );
        const filterButton = document.querySelector(
            '[data-kt-docs-table-filter="filter"]'
        );

        // Filter datatable on submit
        filterButton.addEventListener("click", function () {
            // Get filter values
            let paymentValue = "";

            // Get payment value
            filterPayment.forEach((r) => {
                if (r.checked) {
                    paymentValue = r.value;
                }

                // Reset payment value if "All" is selected
                if (paymentValue === "all") {
                    paymentValue = "";
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            dt.search(paymentValue).draw();
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

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector(
            '[data-kt-docs-table-filter="reset"]'
        );

        // Reset datatable
        resetButton.addEventListener("click", function () {
            // Reset payment type
            filterPayment[0].checked = true;

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            dt.search("").draw();
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

        $(document).on("click", ".btnDelete", function (ev) {
            ev.preventDefault();
            let id = $(this).closest("tr").find('input[type="checkbox"]').val();

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

        $(document).on("click", ".btnUpdateField", function (ev) {
            ev.preventDefault();
            let id = $(this).closest("tr").find('input[type="checkbox"]').val();
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
    };

    // Toggle toolbars
    var toggleToolbars = function () {
        // Define variables
        const container = document.querySelector("#kt_datatable_example_1");
        const toolbarBase = document.querySelector(
            '[data-kt-docs-table-toolbar="base"]'
        );
        const toolbarSelected = document.querySelector(
            '[data-kt-docs-table-toolbar="selected"]'
        );
        const selectedCount = document.querySelector(
            '[data-kt-docs-table-select="selected_count"]'
        );

        // Select refreshed checkbox DOM elements
        const allCheckboxes = container.querySelectorAll(
            'tbody [type="checkbox"]'
        );

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach((c) => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add("d-none");
            toolbarSelected.classList.remove("d-none");
        } else {
            toolbarBase.classList.remove("d-none");
            toolbarSelected.classList.add("d-none");
        }
    };

    var initReloadDataTable = function () { 
        $("#form-filter-data").closest(".box-body").hide();
        $("#form-filter-data").closest(".box").addClass('collapsed-box');
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
        $("#form-filter-data").closest(".box").addClass('collapsed-box');
        // Reload the DataTables with the modified settings
        dt.ajax.reload(null, false);
    };
    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();

            $(document).on("click", ".btnReload", function () {
                DatatablesServerSide.initReloadSearch();
            });
            // initToggleToolbar();
            // handleFilterDatatable();
            // handleDeleteRows();
            // handleResetForm();
        },
        initReload: function () {
            initReloadDataTable();
        },
         initReloadSearch: function () {
            initReloadDataTableDeleteSearch();
        },
    };
})();
