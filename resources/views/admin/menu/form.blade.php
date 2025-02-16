@extends('admin._layout.section.config_form')

@section('content-block')
    <form id="form-ajax-modal" action="{{ $action ?? '' }}" method="{{ $method }}" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <div class="table-data__tool mb-0">
                    <div class="table-data__tool-left">
                        <h3 class="card-title mb-0">Thông tin dữ liệu</h3>
                    </div>
                    <div class="table-data__tool-right">
                        <button type="submit" class="btn btn-success btnSave">
                            <i class="fa fa-dot-circle-o"></i> Lưu dữ liệu
                        </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-ban"></i> Hủy
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Tiêu đề:</label>
                            <input name="title" placeholder="Tiêu đề" value="{{ $row['title'] ?? '' }}"
                                class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input name="link" placeholder="Link ..." value="{{ $row['link'] ?? '' }}"
                                class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Class name</label>
                            <input name="class" placeholder="Class css" value="{{ $row['class'] ?? '' }}"
                                class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>SVG</label>
                            <textarea name="svg" id="svg" class="form-control" cols="30" rows="3">{{$row['svg'] ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input name="order" value="{{ $row['order'] ?? '' }}" placeholder="Vị trí"
                                class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <label>Thuộc menu</label>
                            <select name="parent_id" id="parent_id" class="form-control em-menu">
                                @if (!empty($row['parent_id']))
                                    <option value="{{ $row['parent_id'] }}" selected> {{ $row['parent_id'] }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thuộc loại</label>
                            <select name="location_id" id="location_id" class="form-control">
                                @foreach (config('data.config_menu') as $key => $item)
                                    <option value="{{ $key }}"
                                        {{ !empty($row['location_id']) && $row['location_id'] == $key ? 'selected' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select class="form-control m-input m-input--square" name="is_status">
                                <option value="1" selected>Hiển thị</option>
                                <option value="0"
                                    {{ isset($row['is_status']) && $row['is_status'] == 0 ? 'selected' : '' }}>
                                    Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('javascript')
@endsection
