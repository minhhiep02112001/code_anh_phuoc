@php
    $v = 136;
@endphp

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
        <script>
            window.APP_URL = "{{ url('/') }}";
            window.MEDIA_URL = "{{ url('/') }}/";
            window.SERVICE_UPLOAD_FILE = "{{ route('upload.file') }}";
            window.SERVICE_FILEMANAGER = "{{ route('unisharp.lfm.show') }}";
        </script>
        <!-- Title Page-->
        <title>Admin</title>

        <link href="{{ asset('admins/css/css_minified.css') }}?v={{ $v }}" rel="stylesheet" media="all">

        <style>
            .gallery-list{
                display: flex;
                flex-wrap: wrap;
            }
             .gallery-list .upload-box{
                margin-bottom: 10px;
            }
            .upload_box_item{
                width:120px;
                margin:5px 10px;
                padding:10px;
                background:beige;
                position:relative;
            }

            .upload_box_item input[type="number"]{
                border: 1px solid;
                border-radius:5px;
                padding-left: 5px;
            }

            .upload_box_item .removeInputImages{
                position:absolute;
                top:0;
                right:0;
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

        <script src="{{ asset('admins/js/script_minified.js') }}?v={{ $v }}"></script>
        <script src="{{ asset('admins/vendor/tinymce_1/tinymce.min.js') }}?v={{ $v }}"></script>
        <script src="{{ asset('admins/js/data_table.js') }}?v={{ $v }}"></script>
        <script src="{{ asset('admins/js/index.js') }}?v={{ $v }}"></script>
        <script src="{{ asset('admins/js/main.js') }}?v={{ $v }}"></script>
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
        {{--
        <script src="{{ asset('admins/js/customer.js') }}?v=1.1"></script> --}}
        @stack('scripts')
    </body>

    </html>
    <!-- end document-->
@endif
