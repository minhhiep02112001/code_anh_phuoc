@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">

        <div class="tab-content row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input name="fullname" placeholder="fullname" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Like</label>
                    <input name="like" placeholder="Like" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" id="Nội dung" placeholder="Tóm tắt" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="thumbnail">Ảnh fullname</label>
                    <!-- Single File Upload -->
                    <div class="upload-container" data-field-name="thumbnail" is_multiple="false">
                        <div class="upload-box">
                            <span>+</span>
                            <img class="preview-image" alt="Preview">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control select2-option input-sm">
                        <option value=""></option>
                        <option value="post">Bài viết</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="thumbnail">ID liên quan</label>
                    <input name="data_id" placeholder="Id ..." class="form-control" type="text" />
                </div>
            </div>

        </div>
        <!-- /.tab-content -->
    </div>
@endsection
