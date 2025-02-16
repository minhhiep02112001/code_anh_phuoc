{{-- @extends('admin.layout.block.model_form')
@section('input_content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_language" data-toggle="tab" aria-expanded="true">Nội dung SEO</a></li>
            <li class=""><a href="#tab_info" data-toggle="tab" aria-expanded="false">Thông tin</a></li>
            <li class=""><a href="#tab_detail" data-toggle="tab" aria-expanded="false">Thông tin chi tiết </a></li>
        </ul>
        <div class="tab-content">
            <!-- Font Awesome Icons -->
            <div class="tab-pane active" id="tab_language">
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
                            <select class="form-control select2_suggest em-category" id="category" name="category[]"
                                multiple="multiple" data-module="category" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuơng hiệu</label>
                            <input name="brand" placeholder="Thương hiệu" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Xuất xứ</label>
                            <input name="origin" placeholder="Xuất xứ" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label>Nhà sản xuất</label>
                            <input name="producer" placeholder="Nhà sản xuất" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label>Giá gốc</label>
                            <input name="price" placeholder="Giá gốc" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input name="price_out" placeholder="Giá bán" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label> Đơn vị tính </label>
                            <input name="unti" placeholder="Đơn vị tính" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label>Số lượng</label>
                            <input name="quantity" placeholder="Số lượng" class="form-control" type="text" />
                        </div>

                        <div class="form-group row" style="display: block;padding: 0px 15px;">
                            <label for="is_status" class="col-sm-2 control-label" style="padding: 0; text-align: left;">Hiển
                                thị:</label>
                            <div class="col-sm-10">
                                <input data-switch="true" type="checkbox" value="1" id="is_status" name="is_status"
                                    class="switchBootstrap">
                            </div>
                        </div>
                        <div class="form-group row" style="display: block;padding: 0px 15px;">
                            <label for="is_robot" class="col-sm-2 control-label"
                                style="padding: 0; text-align: left;">Google
                                Index:</label>
                            <div class="col-sm-10">
                                <input data-switch="true" type="checkbox" value="1" id="is_robot" name="is_robot"
                                    class="switchBootstrap">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label for="thumbnail">Ảnh đại diện</label>
                            <div class="parent-upload" data-field="thumbnail">
                                <input type="file" class="form-control-file document_upload" id="image_filepond"
                                    data-type="image" name="files" data-value="" data-field="thumbnail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Ảnh đính kèm</label>
                            <div class="parent-upload" data-field="images[]">
                                <input type="file" class="form-control-file document_upload" id="image_filepond"
                                    data-type="image" name="files" data-value="" multiple="multiple"
                                    data-field="images[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#ion-icons -->
            <!-- glyphicons-->
            <div class="tab-pane" id="tab_detail">
                <div class="row">
                    <div class="col-12" id="tab_detail" data-field="variants">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="30%">Thuộc tính</th>
                                    <th>Giá trị</th>
                                    <th width="10px;"></th>
                                </tr>
                            </thead>
                            <tbody id="content_attribute">
                                <tr data-index="0">
                                    <td>
                                        <input type="text" data-key="name" placeholder="Key" name="params[][key]"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" data-key="value" placeholder="Value"
                                            name="params[][value]" class="form-control">
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-remove-row btn-sm btn-danger">X</button>
                                    </td>

                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <button class="btn btn-sm btn-info" type="button" id="btn-add_infor"
                                            class="btn btn-sm btn-success">+</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /#ion-icons -->

        </div>
        <!-- /.tab-content -->
    </div>
@endsection

 --}}

@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link  active show" id="nav-home-tab" data-toggle="tab" href="#tab_language" role="tab"
                aria-controls="nav-home" aria-selected="false">Nội dung SEO</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab_information" role="tab"
                aria-controls="nav-profile" aria-selected="true">Thông tin thêm</a>
            <a class="nav-item nav-link" id="nav-social-tab" data-toggle="tab" href="#tab_social" role="tab"
                aria-controls="nav-social" aria-selected="true">Cấu hình Social</a>
        </div>
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
                            <label>Tóm tắt</label>
                            <textarea name="description" id="description" placeholder="Tóm tắt" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="content" placeholder="Nội dung" class="form-control tinymce" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
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
                    </div>
                </div>
            </div>
            <!-- /#fa-icons -->
            <!-- glyphicons-->
            <div class="tab-pane" id="tab_information">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label>Danh mục cha:</label>
                            <select class="form-control select2_suggest em-category" id="category" name="category[]"
                                multiple="multiple" data-module="category" style="width: 100%;">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuơng hiệu</label>
                            <input name="brand" placeholder="Thương hiệu" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Xuất xứ</label>
                            <input name="origin" placeholder="Xuất xứ" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label>Nhà sản xuất</label>
                            <input name="producer" placeholder="Nhà sản xuất" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label>Giá gốc</label>
                            <input name="price" placeholder="Giá gốc" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input name="price_out" placeholder="Giá bán" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label> Đơn vị tính </label>
                            <input name="unti" placeholder="Đơn vị tính" class="form-control" type="text" />
                        </div>

                        <div class="form-group">
                            <label>Số lượng</label>
                            <input name="quantity" placeholder="Số lượng" class="form-control" type="text" />
                        </div>
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
                            <label>Ảnh chi tiết</label>
                            <div class="gallery-upload">
                                <div class="upload-container" data-field-name="thumbnails" is_multiple="true">
                                    <div class="upload-box w-100">
                                        <span>+</span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- glyphicons-->
            <!-- glyphicons-->
            <div class="tab-pane" id="tab_setting">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Config header:</legend>
                            <div class="form-group">
                                <textarea name="content_header" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </fieldset>

                    </div>
                    <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Content footer:</legend>
                            <div class="form-group">
                                <textarea name="content_footer" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Content timeopen:</legend>
                            <div class="form-group">
                                <textarea name="time_open" rows="10" class="form-control tinymce" placeholder=""></textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <!-- glyphicons-->
            <div class="tab-pane" id="tab_social">
                <div class="row">
                    <div class="  col-12">
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Facebook:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[facebook]"
                                    value="{{ $config_social->facebook ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Yelp:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[yelp]"
                                    value="{{ $config_social->yelp ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Tripadvisor:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[tripadvisor]"
                                    value="{{ $config_social->tripadvisor ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Youtobe:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[youtobe]"
                                    value="{{ $config_social->youtobe ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Twitter:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[twitter]"
                                    value="{{ $config_social->twitter ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Telegram:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[telegram]"
                                    value="{{ $config_social->telegram ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Instagram:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[instagram]"
                                    value="{{ $config_social->instagram ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Tiktok:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[tiktok]"
                                    value="{{ $config_social->tiktok ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Reddit:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[reddit]"
                                    value="{{ $config_social->reddit ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Messenger:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[messenger]"
                                    value="{{ $config_social->messenger ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Whatsapp:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[whatsapp]"
                                    value="{{ $config_social->whatsapp ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Pinterest:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[pinterest]"
                                    value="{{ $config_social->pinterest ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Zalo:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[zalo]"
                                    value="{{ $config_social->zalo ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group mb-1 form-group-sm row">
                            <label class="col-sm-3 col-form-label-sm">Sharethis:</label>
                            <div class="col-sm-9">
                                <input type="text" class=" form-control input-sm" name="config_social[sharethis]"
                                    value="{{ $config_social->sharethis ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#ion-icons -->
            <div class="tab-pane" id="tab_page">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Content menu:</legend>
                            <div class="form-group">
                                <textarea name="content_menu" rows="10" class="form-control tinymce" placeholder="Meta description"></textarea>
                            </div>
                        </fieldset>
                    </div>

                    <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Config about:</legend>
                            <div class="form-group">
                                <textarea name="content_about" rows="10" class="form-control tinymce" placeholder="Meta description"></textarea>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
@endsection
