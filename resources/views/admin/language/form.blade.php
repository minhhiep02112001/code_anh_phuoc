@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">
 
        <div class="tab-content pt-3">
            <!-- Font Awesome Icons -->
            <div class="tab-pane active" id="tab_language">

                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input name="title" placeholder="Tiêu đề" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input name="code" placeholder="Code" class="form-control" type="text" />

                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <input name="lang" placeholder="Lang ..." class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="content" placeholder="Nội dung" class="form-control tinymce" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                         <div class="form-group">
                            <label for="thumbnail">Ảnh icon</label>
                            <!-- Single File Upload -->
                            <div class="upload-container" data-field-name="icon" is_multiple="false">
                                <div class="upload-box">
                                    <span>+</span>
                                    <img class="preview-image" alt="Preview">
                                </div>
                            </div>
                        </div>

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
                        @include('admin._layout.section.seo')
                        <div class="form-group">
                            <label>Hiện thị nội dung:</label>
                            <select class="form-control m-input m-input--square" name="show_content">
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select class="form-control m-input m-input--square" name="is_status">
                                @foreach (config('data.status') as $key => $item)
                                    <option value="{{ $key }}">{{ $item['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- /#fa-icons --> 

        </div>
        <!-- /.tab-content -->
    </div>
@endsection
