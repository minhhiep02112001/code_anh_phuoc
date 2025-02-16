@extends('front_end._index')
@section('content')
    <!-- Show post -->
    <div id="content-product">
        <div class="body-contents">
            <div class="block-filter-title">
                <div class="container-title">
                    Games Latest Updates
                </div>
            </div>
        </div>
         
        <div id="alltobe" class="customer-list-flex fade-box" data-order_by="updated_at">
            <img class="img-loading" src="{{ asset('assets/images/loading-dom.gif') }}" alt="">
        </div>
        <div id="paginate">
            <div class="panagition">
                <div class="panagition-item-next loadmore" style="width:150px; height:50px; display:none;" data-page="1"
                    data-limit="36">
                    <div
                        style="display: flex;height: 50px; align-content: center; justify-content: center; line-height: 50px;">
                        <b>Loadmore</b>
                        <span class="loading-icon hidden">
                            <img style="width:25px; height:25px;margin-top:13px; margin-left:5px;"
                                src="./assets/images/overload.gif" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @if (!empty($category->show_content))
            <div class="box-comment">
                <div class="box-comment-title center">
                    {{ $category->meta_title }}
                </div>
                <div id="comment" class="box-comment-content box-comment-content-less">
                    <div>
                        {!! $category->content !!}
                    </div>
                </div>

                <div class="box-comment-show">
                    <div class="box-comment-show-text center">
                        <span id="comment-show">Show more</span> <span id="comment-show-span">
                            <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-bfyn04" focusable="false"
                                viewBox="0 0 24 24" aria-hidden="true" data-testid="KeyboardArrowUpIcon">
                                <path d="M7.41 15.41 12 10.83l4.59 4.58L18 14l-6-6-6 6z"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="box-comment-show-layout">

                    </div>


                </div>
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
        const url_load_more = '{{ route('ajax.ajax_load_data') }}';
    </script>
@endsection
