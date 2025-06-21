@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link  active show" id="nav-home-tab" data-toggle="tab" href="#tab_language" role="tab"
                aria-controls="nav-home" aria-selected="false">Nội dung SEO</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tab_information" role="tab"
                aria-controls="nav-profile" aria-selected="true">Thông tin thêm</a>
            <a class="nav-item nav-link" id="nav-tab_setting-tab" data-toggle="tab" href="#tab_setting" role="tab"
                aria-controls="nav-tab_setting" aria-selected="true">Cấu hình header/footer</a>
            <a class="nav-item nav-link" id="nav-social-tab" data-toggle="tab" href="#tab_social" role="tab"
                aria-controls="nav-social" aria-selected="true">Cấu hình Social</a>

            {{-- <a class="nav-item nav-link" id="nav-page-tab" data-toggle="tab" href="#tab_page" role="tab"
                aria-controls="nav-page" aria-selected="true">Cấu hình Page</a> --}}
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
                        <fieldset>
                            <legend class="w-auto ">Content block 1:</legend>
                            <div class="form-group">
                                <label for="image_block_1">Ảnh </label>
                                <!-- Single File Upload -->
                                <div class="upload-container" data-field-name="image_block_1" is_multiple="false">
                                    <div class="upload-box">
                                        <span>+</span>
                                        <img class="preview-image" alt="Preview">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="form-group">
                                    <label>Tiêu đề H2</label>
                                    <input name="title_block_1" class="form-control" type="text" />
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="content_block_1" id="content_block_1" rows="10" class="form-control tinymce"
                                    placeholder="Meta description"></textarea>
                            </div>
                        </fieldset>
                        {{-- <div class="form-group">
                            <label>Nội dung Banner</label>
                            <textarea name="content_banner" id="description" class="form-control" rows="5"></textarea>
                        </div> --}}
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="content" placeholder="Nội dung" class="form-control tinymce" rows="5"></textarea>
                        </div>





                        <fieldset>
                            <legend class="w-auto ">Content footer:</legend>
                            <div class="form-group">
                                <textarea name="content_footer" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </fieldset>
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
                        <div class="form-group">
                            <label for="thumbnail">Favicon </label>
                            <!-- Single File Upload -->
                            <div class="upload-container" data-field-name="favicon" is_multiple="false">
                                <div class="upload-box">
                                    <span>+</span>
                                    <img class="preview-image" alt="Preview">
                                </div>
                            </div>
                        </div>
                        @include('admin._layout.section.seo')

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
                </div>
            </div>
            <!-- /#fa-icons -->
            <!-- glyphicons-->
            <div class="tab-pane" id="tab_information">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label>Danh mục cha:</label>
                            <select class="form-control select2_suggest em-category" data-query-type="home"
                                id="category_id" name="category_id" data-module="category" style="width: 100%;">
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" placeholder="Địa chỉ" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Link map</label>
                            <input name="link_map" placeholder="Link map" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Link iframe map</label>
                            <input name="iframe_map" placeholder="Iframe" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" placeholder="Email" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phone" placeholder="Phone" class="form-control" type="text" />
                        </div>

                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-group">
                            <label>Review google</label>
                            <input name="review_google" placeholder="Review google" class="form-control"
                                type="text" />
                        </div>
                        <div class="form-group">
                            <label>Review Yelp</label>
                            <input name="review_yelp" placeholder="Review Yelp" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Ảnh gallerys</label>
                            <div class="gallery-upload">
                                <div class="upload-container" data-field-name="thumbnails" is_multiple="true">
                                    <div class="upload-box w-100">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ảnh banners</label>
                            <div class="gallery-upload">
                                <div class="upload-container" data-field-name="banners" is_multiple="true">
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
                    {{-- <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Content footer:</legend>
                            <div class="form-group">
                                <textarea name="content_footer" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </fieldset>
                    </div> --}}
                    {{-- <div class="col-lg-6 col-12">
                        <fieldset>
                            <legend class="w-auto ">Content timeopen:</legend>
                            <div class="form-group">
                                <textarea name="time_open" rows="10" class="form-control tinymce" placeholder=""></textarea>
                            </div>
                        </fieldset>
                    </div> --}}
                </div>
            </div>
            <!-- glyphicons-->
            <div class="tab-pane" id="tab_social">
                <div class="row">
                    <div class=" col-12">
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
            {{-- <div class="tab-pane" id="tab_page">
                <div class="row">
                    <div class=" col-12">
                        <fieldset>
                            <legend class="w-auto ">Content block 1:</legend>
                            <div class="form-group">
                                <label for="image_block_1">Ảnh </label>
                                <!-- Single File Upload -->
                                <div class="upload-container" data-field-name="image_block_1" is_multiple="false">
                                    <div class="upload-box">
                                        <span>+</span>
                                        <img class="preview-image" alt="Preview">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Tiêu đề H2</label>
                                    <input name="title_block_1" class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="content_block_1" id="content_block_1" rows="10" class="form-control tinymce"
                                    placeholder="Meta description"></textarea>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- /.tab-content -->
    </div>
@endsection
