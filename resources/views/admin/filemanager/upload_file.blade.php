@php
    $input_name = !empty($input_name) ? $input_name : (!empty($is_multiple) ? 'files[]' : 'file');
    $class = 'class_' . time();
@endphp

<!-- Upload 1 ảnh -->
@if (empty($is_multiple))

    <div class="box-single-upload w-100">
        <div class="card m-0  ">
            <div class="card-header d-flex p-0">
                <input type="text" class="form-control" readonly name="{{ $input_name }}" value="{{ $file ?? '' }}"
                    placeholder="Select an image">
                <button class="btn btn-light btn-upload-image" data-type="image" type="button">
                    <i class="icon-file-upload2"></i>
                </button>
            </div>
            <div class="card-body view-file  position-relative btn-upload-image">
                <div class="image-upload view-image"
                    {{ !empty($file) ? 'style="background-image: url("' . $file . '");\"' : '' }}>
                </div>
            </div>
        </div>
    </div> 
@else
    <!-- Upload nhiều ảnh -->
    <div class="box-multiple-upload" data-field-name="{{ $input_name }}">
        <div class="input_upload_file multiple-upload">
            <div class="drop-area btn-upload-images">
                <div class="drop-icon">
                    <i class="fa-light fa-file-upload"></i>
                </div>
                <div class="drop-text">Drag and drop files here</div>
            </div>
            <div class="uploaded-images-list d-flex flex-wrap gap-2 {{ $class }}">
                @if (!empty($files))
                    @foreach ($files as $file)
                        <div class="uploaded-image-item position-relative">
                            <div class="image-preview"
                                style="background-image: url('{{ $file }}'); margin:5px; width: 150px; height: 150px; background-size: cover; background-position: center;">
                            </div>
                            <input type="hidden" name="{{ $input_name }}" value="{{ $file }}">
                            <button type="button" class="btn btn-danger btn-sm btn-remove-image position-absolute"
                                style="top: 0; right: 0;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
<style>
    .box-single-upload .view-file:hover {
        background-color: #e9ecef;
        cursor: grab;
        /* Thay đổi màu nền khi hover */
    }

    .box-single-upload .view-file .upload-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Màu overlay với độ trong suốt */
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        font-weight: bold;
        opacity: 0;
        /* Ẩn overlay mặc định */
        z-index: 2;
        /* Overlay nằm trên cùng */
        transition: opacity 0.3s ease;
        /* Hiệu ứng mờ khi hover */
    }

    .box-single-upload .view-file:hover .upload-overlay {
        opacity: 1;
        /* Hiển thị overlay khi hover */
    }

    .box-single-upload .view-file .image-upload {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        /* Hình ảnh phủ kín khối nhưng không bị méo */
        background-position: center;
        /* Hình ảnh căn giữa khối */
        background-repeat: no-repeat;
        /* Không lặp lại hình ảnh */
        border-radius: 4px;
        /* Bo góc khớp với khối cha */
    }

    .box-single-upload .view-file {
        width: 100%;
        aspect-ratio: 3 / 2.5;
        /* Tỉ lệ 3:2 */
        background-color: #f8f9fa;
        /* Màu nền để phân biệt khu vực, có thể tùy chỉnh */
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border: 1px solid #ddd;
        /* Viền mỏng để tách biệt */
        border-radius: 4px;
        /* Bo góc nhẹ */
    }

    .single-upload {
        display: flex;
    }

    .box-multiple-upload {
        width: 100%;
    }

    .drop-area {
        border: 2px dashed #aaa;
        padding: 20px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ededed;
        border-radius: 8px;
        margin-bottom: 10px;
        min-height: 2in;
        flex-direction: column;
        gap: 10px;
        cursor: pointer;
    }

    .drop-text {
        font-size: 18px;
        color: #888;
    }

    .drop-icon i {
        color: #888;
        font-size: 4.5rem;
    }

    .uploaded-image-item.position-relative {
        margin: 5px;
        border: 1px solid;
        border-radius: 5px;
        box-sizing: border-box;
    }
</style>

@push('scripts')
    <script>
        var _class = ".{{ $class }}";
        $(document).ready(function() {
            if ($(_class).length > 0) {
                let containerWidth = $(_class).width();
                let width = 50;
                if (300 < containerWidth && containerWidth < 600) width = 100;
                if (600 < containerWidth && containerWidth < 900) width = 150;
                if (containerWidth > 800) width = 200;
                $(_class).find('.image-preview').css({
                    'width': `${width}px!important`,
                    'height': `${width}px!important`,
                })
            }
        });
    </script>
@endpush
