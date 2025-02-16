@if (!empty($rows))
    @foreach ($rows as $item)
        @include('front_end.block.comment_item', ['comment' => $item, 'users'=> $users])
    @endforeach
@endif
