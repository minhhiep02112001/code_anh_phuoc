@extends('front_end._index')
@section('content')

    <style>
        
    </style>

    <!-- Show post -->
    <div id="content-product">
        <div class="body-contents">
            <div class="block-filter-title">
                <div class="container-title">
                   History
                </div> 
            </div>
        </div> 
        <div id="alltobe" class="fade-box" data-page="1" data-order_by="updated_at" data-type="category">
            @if (!empty($rows))
                @foreach ($rows as $item)
                    <a href="{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}" title="{{ $item->title }}"
                        title="{{ $item->title }}" style="width: 100%;  "
                        class="item position-relative center ">

                        <div id="item-{{$item->id}}" nhan="Shell Shockers" class="item-sub position-absolute">
                            {{-- <img id="img-{{$item->id}}" alt="{{ $item->title }}"
                            data-src="{{ convertPathImage($item->thumbnail) }}" class="w-full rounded-md shadow-lg h-full lazyload blur-up"
                                style="display: block;"> --}}
                                {!! getThumb($item->thumbnail, $item->title) !!} 
                        </div>
                        <div class="item-progress-display position-absolute">
                            {!! $item->title !!}
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
          
    </div>
@endsection
@section('scripts')
    <script>
        const url_load_more = '{{ route('ajax.ajax_load_data') }}'; 
    </script>
@endsection
