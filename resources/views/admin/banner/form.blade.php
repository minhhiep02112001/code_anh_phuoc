@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">

        <div class="tab-content row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input name="title" placeholder="Tiêu đề" class="form-control" type="text" />
                </div>

                <div class="form-group">
                    <label>Thuộc </label>
                    <select name="type" id="" class="form-control">
                        @foreach (config('data.banner_type') ?? [] as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Vị trí </label>
                    <input name="position" placeholder="position" class="form-control" type="number" value="0" />
                </div>

                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea name="description" id="description" placeholder="Tóm tắt" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-12">

                <div class="form-group">
                    <label for="thumbnail">Ảnh đại diện desktop (800x400)</label>
                    <!-- Single File Upload -->
                    <div class="upload-container" data-field-name="thumbnail" is_multiple="false">
                        <div class="upload-box">
                            <span>+</span>
                            <img class="preview-image" alt="Preview">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="thumbnail_mobile">Ảnh đại diện mobile (600x300)</label>
                    <!-- Single File Upload -->
                    <div class="upload-container" data-field-name="thumbnail_mobile" is_multiple="false">
                        <div class="upload-box">
                            <span>+</span>
                            <img class="preview-image" alt="Preview">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Link redirect</label>
                    <input name="link_redirect" placeholder="Link" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Link Youtobe</label>
                    <input name="youtobe" placeholder="youtobe" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label for="thumbnail">Target</label>
                    <input name="target" placeholder="Target" class="form-control" type="text" />
                </div>
            </div>

        </div>
        <!-- /.tab-content -->
    </div>
@endsection
