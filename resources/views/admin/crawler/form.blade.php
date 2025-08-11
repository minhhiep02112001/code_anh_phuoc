@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom">

        <div class="tab-content row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input name="key_word" placeholder="Nhập key word" class="form-control" type="text" />
                </div>
                <div class="form-group">
                    <label>Trạng thái:</label>
                    <select class="form-control m-input m-input--square" name="is_status">
                        @foreach (config('data.status_crawler') as $key => $item)
                            <option value="{{ $key }}">{{ $item['title'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
        </div>
        <!-- /.tab-content -->
    </div>
@endsection
