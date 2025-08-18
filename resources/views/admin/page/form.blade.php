@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link  active show" id="nav-home-tab" data-toggle="tab" href="#tab_language" role="tab"
                aria-controls="nav-home" aria-selected="false">Nội dung SEO</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab_info" role="tab"
                aria-controls="nav-profile" aria-selected="true">Thông tin thêm</a>


        </div>
        <div class="tab-content pt-3">
            <!-- Font Awesome Icons -->
            <div class="tab-pane active" id="tab_language">
                <input name="type" value="{{ $type ?? '' }}" class="not_reload" data-value="{{ $type ?? '' }}"
                    type="hidden" />
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input name="title" placeholder="Tiêu đề" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea name="description" id="description" placeholder="Tóm tắt" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="content" placeholder="Nội dung" class="form-control tinymce" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        @include('admin._layout.section.seo')

                        <div class="form-group">
                            <label>Schema</label>
                            <textarea name="schema" placeholder="Schema" class="form-control" rows="12"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#fa-icons -->

            <!-- glyphicons-->
            <div class="tab-pane" id="tab_info">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select class="form-control m-input m-input--square" name="is_status">
                                @foreach (config('data.status') as $key => $item)
                                    <option value="{{ $key }}">{{ $item['title'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Google index:</label>
                            <select class="form-control m-input m-input--square" name="is_robot">
                                <option value="1">Index</option>
                                <option value="0">Không Index</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="thumbnail">Ảnh đại diện </label>
                            <!-- Single File Upload -->
                            <div class="upload-container" data-field-name="thumbnail" is_multiple="false">
                                <div class="upload-box">
                                    <span>+</span>
                                    <img class="preview-image" alt="Preview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /#ion-icons -->

        </div>
        <!-- /.tab-content -->
    </div>
@endsection
