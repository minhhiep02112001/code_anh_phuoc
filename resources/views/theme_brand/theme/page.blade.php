@php

@endphp

@extends('front_end._index')
@section('content')
    <div class="container clearfix">
        <div class="travel-info-l make-left mt-top">
            @if (!empty($image_banner))
                <img src="{{ getImageThumb($image_banner) }}" alt="{{ $page->title }}" width="100%">
            @endif
            <h1 class="page-title fwb fs-28 fc-black">{{ $page->title }}</h1>
            @include('front_end.block.breadcrumb')

            <div class="travel-info-content fs-16" id="news_content">

                {!! $page->sapo ?? '' !!}
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
