@extends('admin._index')
@section('content')

    <form class="ajax-submit-form" action="{{ $action ?? '' }}" method="{{ $method ?? '' }}">
        @csrf
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_language" data-toggle="tab" aria-expanded="true">Nội dung SEO</a></li>
                <li class=""><a href="#tab_info" data-toggle="tab" aria-expanded="false">Thông tin</a></li>
            </ul>
            <div class="tab-content">
                <!-- Font Awesome Icons -->
                <div class="tab-pane active" id="tab_language">
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input name="title" placeholder="Tiêu đề" class="form-control" type="text"
                                       value="{{$row['title'] ?? ''}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea name="description" id="description" placeholder="Tóm tắt" class="form-control"
                                          rows="5">{!! $row['description'] ?? '' !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="content" id="content" placeholder="Nội dung"
                                          class="form-control tinymce" rows="5">{!! $row['content'] ?? '' !!}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            @include('admin.layout.block.seo_meta')
                        </div>
                    </div>
                </div>
                <!-- /#fa-icons -->

                <!-- glyphicons-->
                <div class="tab-pane" id="tab_info">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label>Danh mục cha:</label>
                                <select class="form-control select2_suggest em-category" data-module="category"
                                        style="width: 100%;">
                                    @if(!empty($row['parent_id']))
                                        <option value="{{$row['parent_id']}}" selected>{{$row['parent_id']}}</option>
                                    @endif
                                </select>
                            </div>

                            <?php if (!empty($data) && $data == 'story'): ?>
                            <div class="form-group">
                                <label>Danh mục liên quan sidebar:</label>
                                <div class="input-group">
                                    <select name="related_category[]" class="form-control m-select2 related_category"
                                            style="width: 100%;"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Loại 2 danh mục kết hợp <br>(Ví dụ : Ngôn tình + sắc, Ngôn tình + hài)</label>
                                <div class="input-group">
                                    <select name="two_category[]" class="form-control m-select2 two_category"
                                            style="width: 100%;"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Type category <br>(Loại danh mục vd : Hay , Mới, Full)</label>
                                <input name="type_category" placeholder="Vd : Hay , Mới, Full" class="form-control"
                                       type="text"/>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label>Hiện thị nội dung:</label>
                                <select class="form-control m-input m-input--square" name="show_content">
                                    <option value="1">Hiển thị</option>
                                    <option
                                        value="0" {{isset($row->show_content ) &&$row->show_content == 0 ? 'selected' : ''}}>
                                        Không hiển thị
                                    </option>
                                </select>
                            </div>


                            <div class="form-group row" style="display: block;padding: 0px 15px;">
                                <label for="is_status" class="col-sm-2 control-label"
                                       style="padding: 0; text-align: left;">Trạng
                                    thái:</label>
                                <div class="col-sm-10">
                                    <input data-switch="true" type="checkbox" value="1"
                                           {{!empty($row->is_status) ? 'checked' : ''}} id="is_status"
                                           name="is_status" class="switchBootstrap">
                                </div>
                            </div>
                            <div class="form-group row" style="display: block;padding: 0px 15px;">
                                <label for="is_robot" class="col-sm-2 control-label"
                                       style="padding: 0; text-align: left;">Google
                                    Index:</label>
                                <div class="col-sm-10">
                                    <input data-switch="true" type="checkbox" value="1" id="is_robot"
                                           name="is_robot"
                                           class="switchBootstrap" {{!empty($row->is_robot) ? 'checked' : ''}} >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Text Speech:</label>
                                <select class="form-control m-input m-input--square" name="is_text_speech">
                                    <option value="0">Không</option>
                                    <option value="1" {{!empty($row->is_text_speech) ? 'selected' : ''}}>Có</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="thumbnail">Ảnh đại diện</label>
                                <div class="parent-upload" data-field="thumbnail">
                                    <input type="file" class="filepond-input filepond upload-file" name="files">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#ion-icons -->
            </div>
            <!-- /.tab-content -->
        </div>
    </form>
@endsection
