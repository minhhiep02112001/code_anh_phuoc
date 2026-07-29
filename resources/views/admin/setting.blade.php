 @php
     $config_seo = !empty($setting['config_seo']) ? json_decode($setting['config_seo']) : [];
     $config_website = !empty($setting['config_website']) ? json_decode($setting['config_website']) : [];
     $config_social = !empty($setting['config_social']) ? json_decode($setting['config_social']) : [];
     $config_home = !empty($setting['config_home']) ? json_decode($setting['config_home']) : [];
     $config_banner = !empty($setting['config_banner']) ? json_decode($setting['config_banner']) : (object) [];
     if (!is_object($config_banner)) {
         $config_banner = (object) [];
     }
     $config_time_open = !empty($setting['config_time_open']) ? $setting['config_time_open'] : '';
     $config_gemini = !empty($setting['config_gemini']) ? json_decode($setting['config_gemini']) : [];
 @endphp
 @extends('admin._index')
 @section('content')
     <!-- Main content -->
     <div class="section__content section__content--p30 p-3">
         <div class="card">
             <div class="card-header pb-0">
                 <h3 class="card-title">Cấu hình website</h3>
             </div>
             <div class="card-body p-1">
                 <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link  active show" id="nav-setting-tab" data-toggle="tab" href="#setting"
                         role="tab" aria-controls="nav-setting" aria-selected="false">Setting</a>

                     <a class="nav-item nav-link " id="nav-google-tab" data-toggle="tab" href="#google" role="tab"
                         aria-controls="nav-google" aria-selected="true">Config google</a>

                     <a class="nav-item nav-link " id="nav-config_home-tab" data-toggle="tab" href="#config_home"
                         role="tab" aria-controls="nav-config_home" aria-selected="true">Config page</a>

                     <a class="nav-item nav-link " id="nav-config_banner-tab" data-toggle="tab" href="#config_banner"
                         role="tab" aria-controls="nav-config_banner" aria-selected="false">Config Banner Home</a>

                 </div>
                 <div class="tab-content">
                     <div class="tab-pane active" id="setting">
                         <form id="key_setting">
                             <div class="card-content">
                                 <div class="card card-default color-palette-card">
                                     <div class="card-header d-flex justify-content-between p-1">
                                         <h3 class="card-title mb-0"><i class="fa fa-tag"></i>Setting</h3>
                                         <button type="submit" class="btn btn-sm btn-success"> Save data</button>
                                     </div>
                                     <div class="card-body p-1">
                                         <div class="row">
                                             <div class="col-md-6">

                                                 <div class="form-group mb-1 form-group-sm row">
                                                     <label class="col-sm-3 col-form-label-sm">Thương
                                                         hiệu:</label>
                                                     <div class="col-sm-9">
                                                         <input type="text" class=" form-control input-sm"
                                                             name="config_website[website]"
                                                             value="{{ $config_website->website ?? '' }}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm">Địa
                                                         chỉ:</label>
                                                     <div class="col-sm-9">
                                                         <input type="text" class=" form-control input-sm"
                                                             name="config_website[address]"
                                                             value="{{ $config_website->address ?? '' }}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm">Link_map:</label>
                                                     <div class="col-sm-9">
                                                         <input type="text" class=" form-control input-sm"
                                                             name="config_website[link_map]"
                                                             value="{{ $config_website->link_map ?? '' }}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm">Iframe Google Map:</label>
                                                     <div class="col-sm-9">
                                                         <input type="text" class=" form-control input-sm"
                                                             name="config_website[iframe]"
                                                             value="{{ $config_website->iframe ?? '' }}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm">Số điện thoại:</label>
                                                     <div class="col-sm-9">
                                                         <input type="text" class=" form-control input-sm"
                                                             name="config_website[phone]"
                                                             value="{{ $config_website->phone ?? '' }}">
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm">Email:</label>
                                                     <div class="col-sm-9">
                                                         <input type="text" class="form-control input-sm"
                                                             name="config_website[email]"
                                                             value="{{ $config_website->email ?? '' }}">
                                                     </div>
                                                 </div>

                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm"
                                                         for="config_website[favicon]">Favicon</label>
                                                     <!-- Single File Upload -->
                                                     <div class="col-sm-9">
                                                         <div class="upload-container"
                                                             data-field-name="config_website[favicon]" is_multiple="false">
                                                             <div class="upload-box">
                                                                 <span>+</span>
                                                                 <img class="preview-image {{ !empty($config_website->favicon)  ? 'show' : '' }}"
                                                                     src="{{ !empty($config_website->favicon) ? convertPathImage($config_website->favicon) : '' }}"
                                                                     alt="Preview">
                                                                 <input type="hidden" name="config_website[favicon]"
                                                                     value="{{ $config_website->favicon ?? '' }}">
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm"
                                                         for="config_website[logo]">Logo Header</label>
                                                     <!-- Single File Upload -->
                                                     <div class="col-sm-9">
                                                         <div class="upload-container"
                                                             data-field-name="config_website[logo_header]" is_multiple="false">
                                                             <div class="upload-box">
                                                                 <span>+</span>
                                                                 <img class="preview-image  {{ !empty($config_website->logo_header)  ? 'show' : '' }}" alt="Preview"
                                                                     src="{{ !empty($config_website->logo_header) ? convertPathImage($config_website->logo_header) : '' }}">
                                                                 <input type="hidden" name="config_website[logo_header]"
                                                                     value="{{ $config_website->logo_header ?? '' }}">
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm"
                                                         for="config_website[logo_footer]">Logo Footer</label>
                                                     <!-- Single File Upload -->
                                                     <div class="col-sm-9">
                                                         <div class="upload-container"
                                                             data-field-name="config_website[logo_footer]" is_multiple="false">
                                                             <div class="upload-box">
                                                                 <span>+</span>
                                                                 <img class="preview-image  {{ !empty($config_website->logo_footer)  ? 'show' : '' }}" alt="Preview"
                                                                     src="{{ !empty($config_website->logo_footer) ? convertPathImage($config_website->logo_footer) : '' }}">
                                                                 <input type="hidden" name="config_website[logo_footer]"
                                                                     value="{{ $config_website->logo_footer ?? '' }}">
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>


                                                 <div class="form-group mb-1 row">
                                                    <label class="col-sm-3 col-form-label-sm"
                                                        for="config_website[icon_redirect]">Icon fix redirect</label>
                                                    <!-- Single File Upload -->
                                                    <div class="col-sm-9">
                                                        <div class="upload-container"
                                                            data-field-name="config_website[icon_redirect]" is_multiple="false">
                                                            <div class="upload-box">
                                                                <span>+</span>
                                                                <img class="preview-image  {{ !empty($config_website->icon_redirect)  ? 'show' : '' }}" alt="Preview"
                                                                    src="{{ !empty($config_website->icon_redirect) ? convertPathImage($config_website->icon_redirect) : '' }}">
                                                                <input type="hidden" name="config_website[icon_redirect]"
                                                                    value="{{ $config_website->icon_redirect ?? '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm" for="meta_title">Meta
                                                         title:</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_seo[meta_title]" rows="2" class="form-control" placeholder="Meta meta_title">{{ $config_seo->meta_title ?? '' }}</textarea>
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm" for="meta_keyword">Meta
                                                         keywords:</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_seo[meta_keyword]" rows="2" class="form-control" placeholder="Meta Keyword">{{ $config_seo->meta_keyword ?? '' }}</textarea>
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm" for="summary_footer">Meta
                                                         description:</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_seo[meta_description]" rows="2" class="form-control" placeholder="Meta description">{{ $config_seo->meta_description ?? '' }}</textarea>
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3 col-form-label-sm">Index:</label>
                                                     <div class="col-sm-9">
                                                         <select name="config_seo[index]" id="index"
                                                             class="form-control input-sm">
                                                             <option value="1">Index</option>
                                                             <option value="0"
                                                                 {{ empty($config_seo->index) ? 'selected' : '' }}>
                                                                 No Index
                                                             </option>
                                                         </select>
                                                     </div>
                                                 </div>

                                             </div>
                                             <div class="col-md-6">
                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3">Schema</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_website[schema]" rows="5" class="form-control " placeholder="Schema ... ">{!! $config_website->schema ?? '' !!}</textarea>
                                                     </div>
                                                 </div>
                                                 <div class="form-group mb-1  row">
                                                     <label class="col-sm-3">Config header</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_website[config_header]" rows="5" class="form-control " placeholder="Schema ... ">{!! $config_website->config_header ?? '' !!}</textarea>

                                                     </div>
                                                 </div>

                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3">Content Footer</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_website[content_footer]" rows="5" class="form-control "
                                                             placeholder="Config footer ... ">{!! $config_website->content_footer ?? '' !!}</textarea>
                                                     </div>
                                                 </div>

                                                 <div class="form-group mb-1 row">
                                                     <label class="col-sm-3">Config Keys Gemini:</label>
                                                     <div class="col-sm-9">
                                                         <textarea name="config_gemini[keys]" rows="5" class="form-control "
                                                             placeholder="Keys Gemini ... ">{!! $config_gemini->keys ?? '' !!}</textarea>
                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <!-- /.col -->

                     <div class="tab-pane" id="google">
                         <form id="key_setting_google">
                             <div class="card color-palette-card">
                                 <div class="card-header d-flex justify-content-between p-1">
                                     <h3 class="card-title mb-0"><i class="fa fa-tag"></i>Setting google</h3>
                                     <button type="submit" class="btn btn-sm btn-success"> Save data</button>
                                 </div>

                                 <div class="card-body p-1">
                                     <div class="row">
                                         <div class="col-md-12">

                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Facebook:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[facebook]"
                                                         value="{{ $config_social->facebook ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Yelp:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[yelp]"
                                                         value="{{ $config_social->yelp ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Tripadvisor:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[tripadvisor]"
                                                         value="{{ $config_social->tripadvisor ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Youtobe:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[youtobe]"
                                                         value="{{ $config_social->youtobe ?? '' }}">
                                                 </div>
                                             </div>

                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Twitter:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[twitter]"
                                                         value="{{ $config_social->twitter ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Telegram:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[telegram]"
                                                         value="{{ $config_social->telegram ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Instagram:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[instagram]"
                                                         value="{{ $config_social->instagram ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Tiktok:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[tiktok]"
                                                         value="{{ $config_social->tiktok ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Reddit:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[reddit]"
                                                         value="{{ $config_social->reddit ?? '' }}">
                                                 </div>
                                             </div>

                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Messenger:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[messenger]"
                                                         value="{{ $config_social->messenger ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Whatsapp:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[whatsapp]"
                                                         value="{{ $config_social->whatsapp ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Pinterest:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[pinterest]"
                                                         value="{{ $config_social->pinterest ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Zalo:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[zalo]"
                                                         value="{{ $config_social->zalo ?? '' }}">
                                                 </div>
                                             </div>
                                             <div class="form-group mb-1 form-group-sm row">
                                                 <label class="col-sm-3 col-form-label-sm">Sharethis:</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class=" form-control input-sm"
                                                         name="config_social[sharethis]"
                                                         value="{{ $config_social->sharethis ?? '' }}">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </form>
                     </div>


                     <div class="tab-pane" id="config_home">
                         <form id="key_setting_config_home">
                             <div class="card-content">
                                 <div class="card card-default color-palette-card">
                                     <div class="card-header d-flex justify-content-between p-1">
                                         <h3 class="card-title mb-0"><i class="fa fa-tag"></i>Config page</h3>
                                         <button type="submit" class="btn btn-sm btn-success"> Save data</button>
                                     </div>

                                     <div class="card-body p-1">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <fieldset>
                                                     <legend class="w-auto ">Config home:</legend>
                                                     <div class="form-group">
                                                         <label for="config_home">Tiêu đề trang chủ (h1):</label>
                                                         <input name="config_home[title_home]" class="form-control"
                                                             value="{{ $config_home->title_home ?? '' }}" type="text">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="title-website">Content sau tiêu đề</label>
                                                         <textarea name="config_home[content_title]" rows="10" class="form-control tinymce"
                                                             placeholder="Meta description">{!! $config_home->content_title ?? '' !!}</textarea>
                                                     </div>

                                                     <div class="form-group">
                                                         <label for="title-website">Content trang chủ</label>
                                                         <textarea name="config_home[content_home]" rows="10" class="form-control tinymce"
                                                             placeholder="Meta description">{!! $config_home->content_home ?? '' !!}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>

                     <div class="tab-pane" id="config_banner">
                         <form id="key_setting_config_banner">
                             <div class="card-content">
                                 <div class="card card-default color-palette-card">
                                     <div class="card-header d-flex justify-content-between p-1">
                                         <h3 class="card-title mb-0"><i class="fa fa-image"></i> Config Banner Home (từng section = 1 key)</h3>
                                         <button type="submit" class="btn btn-sm btn-success">Save data</button>
                                     </div>
                                     <div class="card-body p-2">
                                         <p class="text-muted mb-3">
                                             Text khối dưới = text section trong <code>config_banner</code>.
                                             Card/list lấy từ module <strong>Banner</strong> theo <code>type</code>
                                             trùng tên với tiêu đề (vd: <code>banner_mood</code>).
                                         </p>
                                         <div class="row">
                                             {{-- HERO --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_hero_chip') }}
                                                         <small class="text-muted">/ {{ config('data.banner_type.banner_hero_board') }}</small>
                                                         <code class="d-block mt-1">banner_hero_chip · banner_hero_board</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[hero][eyebrow]" value="{{ data_get($config_banner, 'hero.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[hero][title_html]">{{ data_get($config_banner, 'hero.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Lede</label>
                                                         <textarea class="form-control" rows="3" name="config_banner[hero][lede]">{{ data_get($config_banner, 'hero.lede', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Button text</label>
                                                         <input class="form-control" name="config_banner[hero][btn_text]" value="{{ data_get($config_banner, 'hero.btn_text', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Link text / URL</label>
                                                         <input class="form-control mb-1" name="config_banner[hero][link_text]" value="{{ data_get($config_banner, 'hero.link_text', '') }}" placeholder="Add Your Menu">
                                                         <input class="form-control" name="config_banner[hero][link_url]" value="{{ data_get($config_banner, 'hero.link_url', '') }}" placeholder="/add-your-menu">
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- MOODS --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_mood') }}
                                                         <code class="d-block mt-1">banner_mood</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[moods][eyebrow]" value="{{ data_get($config_banner, 'moods.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[moods][title_html]">{{ data_get($config_banner, 'moods.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="3" name="config_banner[moods][text]">{{ data_get($config_banner, 'moods.text', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- COUNTRIES --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_country') }}
                                                         <code class="d-block mt-1">banner_country</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[countries][eyebrow]" value="{{ data_get($config_banner, 'countries.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[countries][title_html]">{{ data_get($config_banner, 'countries.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[countries][text]">{{ data_get($config_banner, 'countries.text', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Extras (mỗi dòng / dấu phẩy)</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[countries][extras]">{{ data_get($config_banner, 'countries.extras', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Button text / URL</label>
                                                         <input class="form-control mb-1" name="config_banner[countries][btn_text]" value="{{ data_get($config_banner, 'countries.btn_text', '') }}">
                                                         <input class="form-control" name="config_banner[countries][btn_url]" value="{{ data_get($config_banner, 'countries.btn_url', '') }}">
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- CITIES --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_city') }}
                                                         <code class="d-block mt-1">banner_city</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[cities][eyebrow]" value="{{ data_get($config_banner, 'cities.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[cities][title_html]">{{ data_get($config_banner, 'cities.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[cities][text]">{{ data_get($config_banner, 'cities.text', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- FEATURED --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         Home · Featured Menus
                                                         <code class="d-block mt-1">posts (brand)</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[featured][eyebrow]" value="{{ data_get($config_banner, 'featured.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[featured][title_html]">{{ data_get($config_banner, 'featured.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[featured][text]">{{ data_get($config_banner, 'featured.text', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- PASSPORT --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_passport') }}
                                                         <code class="d-block mt-1">config_banner.passport · banner_passport (ảnh)</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[passport][eyebrow]" value="{{ data_get($config_banner, 'passport.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[passport][title_html]">{{ data_get($config_banner, 'passport.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[passport][text]">{{ data_get($config_banner, 'passport.text', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Items (mỗi dòng 1 ý)</label>
                                                         <textarea class="form-control" rows="3" name="config_banner[passport][items]">{{ data_get($config_banner, 'passport.items', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- CUISINES --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_cuisine') }}
                                                         <code class="d-block mt-1">banner_cuisine</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[cuisines][eyebrow]" value="{{ data_get($config_banner, 'cuisines.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[cuisines][title_html]">{{ data_get($config_banner, 'cuisines.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[cuisines][text]">{{ data_get($config_banner, 'cuisines.text', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- OWNERS --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         Home · For Restaurants
                                                         <code class="d-block mt-1">config_banner.owners (text only)</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow / Title</label>
                                                         <input class="form-control mb-1" name="config_banner[owners][eyebrow]" value="{{ data_get($config_banner, 'owners.eyebrow', '') }}">
                                                         <input class="form-control" name="config_banner[owners][title]" value="{{ data_get($config_banner, 'owners.title', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[owners][text]">{{ data_get($config_banner, 'owners.text', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Items (mỗi dòng 1 ý)</label>
                                                         <textarea class="form-control" rows="3" name="config_banner[owners][items]">{{ data_get($config_banner, 'owners.items', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Buttons</label>
                                                         <input class="form-control mb-1" name="config_banner[owners][btn1_text]" value="{{ data_get($config_banner, 'owners.btn1_text', '') }}" placeholder="Add Your Menu">
                                                         <input class="form-control mb-1" name="config_banner[owners][btn1_url]" value="{{ data_get($config_banner, 'owners.btn1_url', '') }}">
                                                         <input class="form-control mb-1" name="config_banner[owners][btn2_text]" value="{{ data_get($config_banner, 'owners.btn2_text', '') }}" placeholder="Claim Listing">
                                                         <input class="form-control" name="config_banner[owners][btn2_url]" value="{{ data_get($config_banner, 'owners.btn2_url', '') }}">
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- TRUST --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_trust') }}
                                                         <code class="d-block mt-1">banner_trust</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[trust][eyebrow]" value="{{ data_get($config_banner, 'trust.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[trust][title_html]">{{ data_get($config_banner, 'trust.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[trust][text]">{{ data_get($config_banner, 'trust.text', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- GUIDES --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         {{ config('data.banner_type.banner_guide') }}
                                                         <code class="d-block mt-1">banner_guide</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Eyebrow</label>
                                                         <input class="form-control" name="config_banner[guides][eyebrow]" value="{{ data_get($config_banner, 'guides.eyebrow', '') }}">
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[guides][title_html]">{{ data_get($config_banner, 'guides.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[guides][text]">{{ data_get($config_banner, 'guides.text', '') }}</textarea>
                                                     </div>
                                                 </fieldset>
                                             </div>

                                             {{-- FINAL --}}
                                             <div class="col-md-6 mb-3">
                                                 <fieldset>
                                                     <legend class="w-auto ">
                                                         Home · Final CTA
                                                         <code class="d-block mt-1">config_banner.final (text only)</code>
                                                     </legend>
                                                     <div class="form-group">
                                                         <label>Title HTML</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[final][title_html]">{{ data_get($config_banner, 'final.title_html', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Text</label>
                                                         <textarea class="form-control" rows="2" name="config_banner[final][text]">{{ data_get($config_banner, 'final.text', '') }}</textarea>
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Buttons</label>
                                                         <input class="form-control mb-1" name="config_banner[final][btn1_text]" value="{{ data_get($config_banner, 'final.btn1_text', '') }}">
                                                         <input class="form-control mb-1" name="config_banner[final][btn1_url]" value="{{ data_get($config_banner, 'final.btn1_url', '') }}">
                                                         <input class="form-control mb-1" name="config_banner[final][btn2_text]" value="{{ data_get($config_banner, 'final.btn2_text', '') }}">
                                                         <input class="form-control" name="config_banner[final][btn2_url]" value="{{ data_get($config_banner, 'final.btn2_url', '') }}">
                                                     </div>
                                                 </fieldset>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 </section>
             </div>
         </div>
     </div>
 @endsection

 @push('scripts')
     <script>
         var route_setting = '{{ route('admin.setting') }}'
         $(document).ready(function() {
             option_TinyMCE.height = "100px";
             tinymce.init(option_TinyMCE);
         });
         if ($('#form_setting').find('input[type="file"]').length > 0) {
             FileUpload.init($('#form_setting'));
         }

         $(document).on("submit", 'form', function(e) {
             e.preventDefault();
             let data = $(this).serialize();
             let key = $(this).find('input[name="key"]').val();

             $.ajax({
                 type: "POST",
                 url: route_setting,
                 data: data,
                 success: function(data) {
                     console.log('true');
                     Notification_Static.success(data.message);
                 },
                 error: function(data) {
                     Notification_Static.errors(data.message)
                     console.log('false')
                 }
             });
         })
     </script>
 @endpush
