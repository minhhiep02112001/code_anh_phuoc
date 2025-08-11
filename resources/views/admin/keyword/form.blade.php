@extends('admin._layout.section.config_form')
@section('input_content')
    <div class="nav-tabs-custom"> 
        <div class="tab-content pt-3">
            <!-- Font Awesome Icons -->
            <div class="tab-pane active" id="tab_language">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Keyword</label>
                            <input name="key_word" placeholder="Keyword" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select class="form-control m-input m-input--square" name="is_status">
                                @foreach (config('data.status_keyword') as $key => $item)
                                    <option value="{{ $key }}">{{ $item['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                </div>
            </div> 
        </div>
        <!-- /.tab-content -->
    </div>
@endsection
