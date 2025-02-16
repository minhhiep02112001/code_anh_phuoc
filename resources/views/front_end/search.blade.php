@extends('front_end._index')
@section('content')
    <section class="max-width-container content-area">
        <div class="base-block">
            
            <div class="popular-restaurants">
                <h2 class="popular-restaurants__title">Search results "{{ $value }}"</h2>
                <p class="popular-restaurants__counter">{{ ( $rows->currentPage() -1 ) * $limit + 1 }} - {{ $rows->currentPage() * $limit }} of ({{ $rows->total() }})</p>
 

                <ul class="restaurants">
                    @foreach ($rows as $item)
                        <li class="restaurants__item">
                            <div class="restaurant__container restaurant__container--is-open">
                                <div class="restaurant__image">
                                    {!! getThumbnailImg($item, 120, 60, 'img-fluid') !!}
                                </div>
                                <div class="restaurant__desc">
                                    <h3 class="restaurant__title">
                                        <a href="{{route('post', ['slug' => $item->slug])}}">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="restaurant__category"></p>
                                    <ul class="restaurant__contacts">
                                        <li class="restaurant__contacts-item"><span
                                                class="icon-Location-icon restaurant__contacts-ico"></span>
                                            <address>13440 SW 120th St Ste 608, Miami FL 33186</address>
                                        </li>
                                        <li class="restaurant__contacts-item"><span
                                                class="icon-Phone-icon restaurant__contacts-ico"></span><a
                                                href="tel:+13059719690" class="restaurant__phone">(305) 971-9690</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="restaurant__actions">
                                    <div class="restaurant__open-status"><!----><!----></div>
                                    <button at-view-menu-button=""
                                            class="btn btn-outline-primary">
                                        Start an order
                                        <!----><!----></button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <nav> 
                    {!! $rows->appends(request()->all())->links() !!} 
                </nav>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
