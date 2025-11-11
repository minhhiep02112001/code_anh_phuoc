@php
    $ver = 126;
    $config_website = getValueSetting('config_website');
    $medias = $post->media->all();
@endphp
@extends('theme._index')

@section('content')
    <div class="container clearfix">
        <div class="travel-info-wrap  travel-info-l mt-top" style="margin-bottom:15px;">
            @if (!empty($post->thumbnail))
                <img src="{{ getImageThumb($post->thumbnail) }}" alt="{{ $post->title }}" width="100%">
            @endif
            <h1>{{ $post->title }} {{ __('config_data.pages.menus.menu') }}</h1>

            <ol class="breadcrumb">
                <ul class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('post', [$post->slug]) }}"
                            title=" {{ __('config_data.pages.menus._home') }}">
                            {{ __('config_data.pages.menus._home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('menu', [$post->slug]) }}"
                            title=" {{ __('config_data.pages.menus.menu') }}">
                            {{ __('config_data.pages.menus.menu') }}
                        </a> </li>
                </ul>
                <script
                type="application/ld+json">{"@context":"http://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"{{ route('post', [$post->slug]) }}","name":"{{ __('config_data.pages.menus.home') }}"}},{"@type":"ListItem","position":2,"item":{"@id":"{{ route('post', [$post->slug]) }}","name":"{{ __('config_data.pages.menus.menu') }}"}}]}</script>
            </ol>
            <div class="travel-info-content fs-16">
                {!! $post->content_menu !!}
            </div>
 

            <div id="gallery" class="info-widget preview-gallery info-widget--full">
                <div class="image-gallery">
                    @foreach ($medias as $k => $item)
                        <div class="image-link">
                            <span class="image-gallery__item" src="{{ convertPathImage($item->thumbnail) }}">
                                <div class="thumb" style="background-image:url({{ getImageThumb($item->thumbnail) }});">
                                </div>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Custom Modal -->
    @if (!empty($medias))
        <div id="customModal" class="customer-modal">
            <div class="customer-modal-content">
                <span class="custom-close">&times;</span>
                <div class="customer-modal-body">
                    <div id="view-image" class="view-image"></div>
                </div>
                <div class="customer-modal-footer">
                    <div class="thumbnail-slider">
                        @foreach ($medias as $item)
                            <div>
                                {!! getThumbnail($item, 450, 300, "thumbnail-img") !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <style>
        .view-image {
            width: 100%;
            /* Chiếm toàn bộ chiều rộng modal */
            height: 500px;
            max-width: 500px;
            margin: 0 auto;
            /* Chiều cao của khối */
            background-size: cover;
            /* Đảm bảo ảnh bao phủ toàn bộ khối */
            background-position: center;
            /* Căn giữa ảnh */
            border-radius: 8px;
            /* Bo tròn góc */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            /* Đổ bóng */
        }

        /* Modal background */
        .customer-modal {
            /* display: block; */
            display: none;
            /* Ẩn mặc định */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            /* Nền tối */
            z-index: 9999;
        }

        /* Modal content */
        .customer-modal-content {
            position: relative;
            margin: 5% auto;
            width: 60%;
            max-width: 1000px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        @media(max-width:500px) {
            .view-image {
                height: 300px;
                width: 300px;
            }

            .thumbnail-slider {
                width: 400px;
                /* Đảm bảo slider chiếm hết chiều rộng container */
                max-width: 400px;
                /* Không vượt quá chiều rộng màn hình */
                margin: 0 auto;
                /* Căn giữa slider nếu container rộng hơn nội dung */
            }
        }

        @media(max-width:760px) {
            .customer-modal-content {
                width: 90%;
                margin-top: 125px;
                max-width: 100%;
            }

            .thumbnail-slider {
                width: 500px;
                /* Đảm bảo slider chiếm hết chiều rộng container */
                max-width: 500px;
                /* Không vượt quá chiều rộng màn hình */
                margin: 0 auto;
                /* Căn giữa slider nếu container rộng hơn nội dung */
            }

        }

        /* Close button */
        .custom-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        /* Modal body (ảnh lớn) */
        .customer-modal-body img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

        /* Modal footer (slider ảnh nhỏ) */
        .customer-modal-footer {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .thumbnail-slider {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 0;
        }

        .thumbnail-img {
            width: 100px;
            height: 60px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .thumbnail-slider {
            overflow: hidden;
            width: 800px;
            /* Đảm bảo slider chiếm hết chiều rộng container */
            max-width: 800px;
            /* Không vượt quá chiều rộng màn hình */
            margin: 0 auto;
            /* Căn giữa slider nếu container rộng hơn nội dung */
        }

        .thumbnail-img:hover {
            border-color: #007bff;
        }
    </style>
    <script>
        $(document).ready(function() {
            const modal = document.getElementById('customModal');
            const openModalButton = document.getElementById('openModal');
            const closeModalButton = document.querySelector('.custom-close');
            const mainImage = document.getElementById('mainImage');

            // Mở modal
            $('#openModal').on('click', () => {
                $("#customModal").toggle('show')
            });

            // Đóng modal
            closeModalButton.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            // Đóng modal khi click bên ngoài nội dung
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });

            $(document).ready(function() {
                // Khởi tạo Slick Slider
                $('.thumbnail-slider').slick({
                    slidesToShow: 8,
                    slidesToScroll: 1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 2000, // Chuyển ảnh sau mỗi 2 giây
                    arrows: true,
                    infinite: true,
                    responsive: [{
                            breakpoint: 800, // Khi màn hình nhỏ hơn hoặc bằng 1000px
                            settings: {
                                slidesToShow: 6, // Hiển thị 5 ảnh
                            },
                        },
                        {
                            breakpoint: 600, // Khi màn hình nhỏ hơn hoặc bằng 600px
                            settings: {
                                slidesToShow: 5, // Hiển thị 4 ảnh
                            },
                        },
                        {
                            breakpoint: 400, // Khi màn hình nhỏ hơn hoặc bằng 400px
                            settings: {
                                slidesToShow: 3, // Hiển thị 3 ảnh
                            },
                        },
                    ],
                });

                // Hiển thị modal khi click vào danh sách ảnh
                $('.image-gallery__item').on('click', function() {
                    const imageUrl = $(this).attr('src'); // Lấy URL ảnh từ danh sách
                    const currentIndex = $('.image-gallery__item').index(this);

                    // Cập nhật background cho view-image
                    $('#view-image').css('background-image', `url(${imageUrl})`);

                    // Chuyển slider đến đúng ảnh được chọn
                    $('.thumbnail-slider').slick('slickGoTo', currentIndex);

                    // Hiển thị modal
                    $('#customModal').fadeIn();
                });

                // Đóng modal khi nhấn nút "×"
                $('.custom-close').on('click', function() {
                    $('#customModal').fadeOut();
                });

                // Đổi ảnh trong view-image khi slider thay đổi
                $('.thumbnail-slider').on('afterChange', function(event, slick, currentSlide) {
                    const currentImgUrl = $(slick.$slides[currentSlide]).find('.thumbnail-img')
                        .attr('src');
                    $('#view-image').css('background-image', `url(${currentImgUrl})`);
                });

                // Cập nhật background khi click vào thumbnail trong slider
                $('.thumbnail-img').on('click', function() {
                    const imageUrl = $(this).attr('src'); // Lấy URL ảnh từ thumbnail
                    $('#view-image').css('background-image',
                        `url(${imageUrl})`); // Cập nhật background
                });
            });
        });
    </script>
@endsection
