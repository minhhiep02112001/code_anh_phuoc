@extends('front_end._index')
@section('content')
    <section class="max-width-container content-area">
        <div class="base-block">

            <div class="popular-restaurants">
                <h2 class="popular-restaurants__title">{{ $category->title }}</h2>
                @if ($rows->count() > 0)
                    <p class="popular-restaurants__counter">{{ ($rows->currentPage() - 1) * $limit + 1 }} -
                        {{ $rows->currentPage() * $limit }} of ({{ $rows->total() }})</p>

                    <ul class="restaurants">
                        @foreach ($rows as $item)
                       
                            <li class="restaurants__item">
                                <div class="restaurant__container restaurant__container--is-open">
                                    <div class="restaurant__image">
                                        {!! getThumbnail($item, 240, 240, 'img-fluid') !!}
                                    </div>
                                    <div class="restaurant__desc">
                                        <h3 class="restaurant__title">

                                            <a href="{{ route('post', ['slug' => $item->slug]) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        <p class="restaurant__category"></p>
                                        <ul class="restaurant__contacts">
                                            <li class="restaurant__contacts-item"><span
                                                    class="icon-Location-icon restaurant__contacts-ico"></span>
                                                <address>{{ $item->location }}</address>
                                            </li>
                                            @if (!empty($item->phone))
                                                <li class="restaurant__contacts-item"><span
                                                        class="icon-Phone-icon restaurant__contacts-ico"></span>
                                                    <a href="tel:+{{ $item->phone ?? '' }}" class="restaurant__phone">
                                                        {{ $item->phone ?? '' }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="restaurant__actions">
                                        <div class="restaurant__open-status"></div>
                                        <a href="{{ route('post', [ 'slug' => $item->slug]) }}"
                                            class="btn btn-outline-primary">
                                            Start an order
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <nav>
                        {!! $rows->appends(request()->all())->links() !!}
                    </nav>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
