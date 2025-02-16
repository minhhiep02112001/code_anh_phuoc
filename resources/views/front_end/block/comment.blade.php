{{-- <div class="header_comment">
    <div class="row">
        <div class="col-md-6 text-left">
            <span class="count_comment">{{ $count }} Comments</span>
        </div>
    </div>
</div> --}}

<div class="body_comment">
    <div class="row">
        <h3 class="title">Đánh giá ({{ $count }})</h3>
        <div class="box_comment col-md-12 p-3 pb-0 pt-0">
            <form action="{{ route('ajax.comment.store') }}" class="form-submit-comment" method="POST">
                <input type="hidden" name="data_id" value="{{ $data_id }}"></input>
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="parent_id" value="0">
                <textarea class="content" name="content" placeholder="Add a comment..."></textarea>
                <div class="box_post">
                    <div class="pull-right">
                        <button type="submit">Bình luận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <ul id="list_comment" class="col-md-12">
            <!-- Start List Comment 1 -->
            @foreach ($rows as $item)
                @include('front_end.block.comment_item', ['comment' => $item, 'users' => $users])
            @endforeach
        </ul>
        @if ($count > $rows->count())
            <button class="show_more" id="load_paginate" data-page="2" data-limit="{{ $limit }}" type="button">
                <span>Xem thêm</span>
            </button>
        @endif
      
    </div>
</div>
