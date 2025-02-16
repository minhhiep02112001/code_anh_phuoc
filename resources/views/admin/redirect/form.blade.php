@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">
        <div class="tab-content row">
            <div class="col-12">
                <div class="form-group">
                    <label>Url</label>
                    <input name="url_old" placeholder="Tiêu đề" class="form-control" type="text" />
                </div>

                <div class="form-group">
                    <label>301 </label>
                    <input name="url_new" placeholder="Tiêu đề" class="form-control" type="text" />
                </div> 
            </div> 
        </div>
        <!-- /.tab-content -->
    </div>
@endsection
