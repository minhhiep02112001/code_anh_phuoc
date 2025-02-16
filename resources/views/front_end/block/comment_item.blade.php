@if (!empty($comment))
    <li class="{{ $comment->parent_id == 0 ? 'box_result' : 'box_reply' }}  row">
        <div class="avatar_comment col-2 col-md-1">
            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
        </div>
        <div class="result_comment col-10 col-md-11"> 
            <h4>{{ !empty($users[$comment->user_id]) ? $users[$comment->user_id]['name'] : '' }}</h4>
            <p>{{ $comment->content }}</p>
            <div class="tools_comment">
                @if ($comment->parent_id == 0)
                    <a class="replay_comment" href="Javascript:void(0)" data-id="{{ $comment->data_id }}"
                        data-type="{{ $comment->type }}" data-limit="{{ $comment->total_reply ?? 0 }}"
                        data-parent-id="{{ $comment->id }}">Reply({{ $comment->total_reply ?? 0 }})</a>
                    <span aria-hidden="true">·</span>
                    <span class="like-comment" data-id="{{ $comment->id }}"><i class="fa fa-thumbs-o-up"></i><span
                            class="count"> {{ $comment->like ?? 0 }}</span></span>
                @endif
                <span aria-hidden="true">·</span>
                <span> {{ timeAgo($comment->created_at) }}</span>
            </div>
            @if ($comment->parent_id == 0)
                <ul class="child_replay">
                </ul>
                <div class="row form-comment-reply d-none ml-0 mr-0">
                    <div class="box_comment col-md-12 p-1">
                        <form action="{{ route('ajax.comment.store') }}" class="form-submit-comment" method="POST">
                            <input type="hidden" name="data_id" value="{{ $comment->data_id }}"></input>
                            <input type="hidden" name="type" value="{{ $comment->type }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <textarea class="content" name="content" placeholder="Add a comment..."></textarea>
                            <div class="box_post">
                                <div class="pull-right">
                                    <button type="submit">Bình luận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </li>
@endif
