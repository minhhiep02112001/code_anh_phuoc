<div class="form-group">
    <label>Tiêu đề SEO (Meta Title)</label>
    <label for="title"><span class="count-title">0</span> / {{config('data.SEO.SEO_title_maxlength')}}</label>
    <input name="meta_title" value="{{ $row['meta_title'] ?? ''}}"  placeholder="Meta Title" class="form-control" type="text" />
</div>
<div class="form-group">
    <label>Đường dẫn (Url)</label>
    <input name="slug" placeholder="Link"  value="{{ $row['slug'] ?? ''}}"  class="form-control" type="text" />
</div>
<div class="form-group">
    <label>Mô tả SEO (Meta Description)</label>
    <label for="desc"><span class="count-desc">0</span> / {{config('data.SEO.SEO_description_maxlength')}}</label>
    <textarea name="meta_description" placeholder="Meta Description" class="form-control" rows="5" >{!! $row['meta_description'] ?? ''!!}</textarea>
</div>
<div class="form-group">
    <label>Meta Keyword</label>
    <input name="meta_keyword" placeholder="Meta Keyword"  value="{{ $row['meta_keyword'] ?? ''}}" class="form-control" type="text" />
</div> 
{{-- <div class="form-group">
    <label>Schema</label>
    <textarea name="schema"  placeholder="Schema" class="form-control" rows="12" >{!! $row['schema'] ?? ''!!}</textarea>
</div> --}} 
<div class="google">
    <h2 class="cgg"><span class="gg_1">Google!</span></h2>
    <input type="text" class="gg-result" readOnly/>
    <div class="box">
        <h3 class="gg-title"></h3>
        <cite class="gg-url"></cite>
        <span class="gg-desc"></span>
    </div>
</div>