<!DOCTYPE html>
@if (\Request::input('view') == 'popup' || \Request::header('view') == 'popup')
    @yield('content')
    @stack('scripts')
@elseif (\Request::header('view') == 'ajax')
    @hasSection('left-slidebar')
        @yield('left-slidebar')
    @endif
    <!-- Main content -->
    <div class="content-wrapper">
        <div class="content-inner">
            @yield('content')
        </div>
        <div class="btn-to-top btn-to-top-visible">
            <button type="button" class="btn btn-dark btn-icon rounded-pill"><i class="icon-arrow-up8"></i></button>
        </div>
        @stack('scripts')
    </div>
    <!-- Secondary sidebar -->
@else
    <html lang="vn">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">
        <meta name="csrf_token" content="{{ csrf_token() }}">

        <!-- Title Page-->
        <title>Admin</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="{{ asset('admins/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
            media="all">
        <link href="{{ asset('admins/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
            media="all">
        <link href="{{ asset('admins/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
            media="all">
        <link href="{{ asset('admins/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
        <script>
            window.APP_URL = "{{ url('/') }}";
            window.MEDIA_URL = "{{ url('/') }}/";
            window.SERVICE_UPLOAD_FILE = "{{ route('upload.file') }}";
            window.SERVICE_FILEMANAGER = "{{ route('unisharp.lfm.show') }}";
        </script>

        <!-- Bootstrap CSS-->
        <link href="{{ asset('admins/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <!-- Vendor CSS-->
        <link href="{{ asset('admins/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
            rel="stylesheet" media="all">
        <link href="{{ asset('admins/vendor/wow/animate.css" rel="stylesheet') }}" media="all">
        <link href="{{ asset('admins/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
            media="all">

        <!-- Main CSS-->
        <link href="{{ asset('admins/css/theme.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('admins/css/customer.css') }}" rel="stylesheet" media="all">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.0/filepond.min.css" integrity="sha512-Wc3aWsMJwzrX33j4EwoRF7iEJ40FKYNj9pnh24IzN3hmkZ2LIjjHAJ3t1UsJu1iurA6NjzirbnUI7AsPDLa1VA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <style>
            table th {
                white-space: pre !important;
            }

            .modal-open .modal {
                overflow-y: hidden;
                max-height: 100vh;
            }

            .modal-open .modal-dialog {
                overflow: auto;
                max-height: calc(100% - 1.75rem * 2);
            }

            /* Chỉ áp dụng cho thanh cuộn bên trong .modal */
            .modal-open .modal-dialog::-webkit-scrollbar {
                width: 3px;
            }

            .modal-open .modal-dialog::-webkit-scrollbar-track {
                background: #eee;
                border-radius: 10px;
            }

            .modal-open .modal-dialog::-webkit-scrollbar-thumb {
                background: #666;
                border-radius: 10px;
            }


            body,
            .table-data3 tbody td {
                color: black !important;
            }

            .btn-group-sm>.btn,
            .btn-sm {
                padding: 0.20rem 0.25rem;
                font-size: .875rem;
                line-height: 1.5;
                border-radius: .2rem;
            }

            .badge {

                padding: .4em;

            }

            .show {
                display: block;
            }

            .hide {
                display: none;
            }

            .header-button-left {
                display: none;
            }

            .header-button {
                margin-top: 0px;

            }

            @media(max-width:760px) {
                .header-desktop {
                    height: 60px;
                }
            }

            @media(min-width:760px) {
                .header-button-left {
                    display: flex;
                }

                .hide_sidebar_desktop .menu-sidebar {
                    width: 100px;
                }

                .hide_sidebar_desktop .page-container {
                    padding-left: 100px;
                }

                .hide_sidebar_desktop .header-desktop {
                    left: 100px;
                }

                .hide_sidebar_desktop .navbar-sidebar {
                    padding: 20px
                }

                .hide_sidebar_desktop .menu-sidebar .logo {
                    padding: 5px;
                }

                .hide_sidebar_desktop .menu-sidebar .logo h1 {
                    font-size: 25px;
                }


                .hide_sidebar_desktop .navbar-sidebar .navbar__list li a {
                    text-align: center;
                }

                .hide_sidebar_desktop .navbar-sidebar .navbar__list li a span {
                    display: none;
                }

                .hide_sidebar_desktop .navbar-sidebar .navbar__list li a i {

                    margin: 0 auto;
                }
            }
        </style>
    </head>

    <body class="animsition ">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            @include('admin._layout.header')
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            @include('admin._layout.sidebar')

            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container" id="page-content">
                <!-- HEADER DESKTOP-->
                @include('admin._layout.header_desktop')
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    @yield('content')
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="{{ asset('admins/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JS-->
        <script src="{{ asset('admins/vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <script src="{{ asset('admins/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
        <!-- Vendor JS       -->
        <script src="{{ asset('admins/vendor/select2/select2.min.js') }}"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/2.0.0/pnotify.all.min.css"
            integrity="sha512-XaU57gdkRGp8M37fFqDka+LgOjllhmlwkAVkaBKqEI4XmXnLt1zypwtsIUSWeRAlOuiMhTn8Vtjw0WWb7kRTJA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/2.0.0/pnotify.all.min.js"
            integrity="sha512-V8Mt3hqOryGi+q6n4FlUHGCS7aqQ7TklOQHRHPG422bczzuOjtdRQGJ7RUy2zMxczSShhO2d13XCPEm+wLFjAA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.0/tinymce.min.js" integrity="sha512-yNGv3BH/e9YlJDiGWZL7jEpr64vNvwRBr0JYSWugabgB5FxZPUQD0N3eT+ALsf1m6n4Qzz5ijH1tvCJXwR1qxg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


        <script src="{{ asset('admins/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"> --}}
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
        <script src="{{ asset('admins/vendor/animsition/animsition.min.js') }}"></script>
        <script src="{{ asset('admins/js/filepond.js') }}"></script>
        <script src="{{ asset('admins/vendor/tinymce_1/tinymce.min.js') }}"></script>
        {{-- <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}

        <!-- Thêm DataTables -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <!-- Thêm Responsive extension -->
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


        <script src="{{ asset('admins/js/data_table.js') }}"></script>
        <script src="{{ asset('admins/js/index.js') }}?v=13211133"></script>
        <script src="{{ asset('admins/js/main.js') }}"></script>
        <script>
            const _status = @json(config('data.status'));
            const _google_index = {
                0: {
                    title: "No index",
                    class: "badge badge-danger"
                },
                1: {
                    title: "Index",
                    class: "badge badge-success"
                },
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });
            // $(document).ajaxStart(function() {
            //     $("#page-content").LoadingOverlay("show");
            // });
            // $(document).ajaxStop(function() {
            //     $("#page-content").LoadingOverlay("hide");
            // });

            $(document).ready(function() {
                $(document).on('click', '.btn-show-sidebar, .btn-hide-sidebar', function() {
                    let _type = $(this).attr('data-type');

                    if (_type == 'show') {
                        $('.btn-hide-sidebar').removeClass('hide').addClass('show');
                        $('.btn-show-sidebar').removeClass('show').addClass('hide');
                        $("body").removeClass('hide_sidebar_desktop');
                    } else {
                        $("body").addClass('hide_sidebar_desktop');
                        $('.btn-show-sidebar').removeClass('hide').addClass('show');
                        $('.btn-hide-sidebar').removeClass('show').addClass('hide');
                    }
                })
            });
        </script>
        {{-- <script src="{{ asset('admins/js/customer.js') }}?v=1.1"></script> --}}
        @stack('scripts')
    </body>

    </html>
    <!-- end document-->
@endif
