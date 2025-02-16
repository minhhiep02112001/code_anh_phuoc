@foreach ($games as $key => $item)
    <a href="{{ route('detail', ['slug' => $item->slug, 'id' => $item->id]) }}" title="{{ $item->title }}"
        style="width: 100%;" class="item position-relative center ">

        <div id="{{$item->id}}"  class="item-sub position-absolute">
            {!! getThumb($item->thumbnail, $item->title) !!} 
            {{-- <img id="img-{{$item->id}}" loading="lazyload" alt="{{ $item->title }}" data-src="{{convertPathImage($item->thumbnail)}}"
                class="w-full rounded-md shadow-lg h-full lazyload blur-up" style="display: block;"> --}}
        </div>
        <div class="item-progress-display position-absolute">
            <h3>{!! $item->title !!}</h3>
        </div>
    </a>
@endforeach
