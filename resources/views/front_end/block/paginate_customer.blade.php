<div class="pagination">
    @if ($datas->onFirstPage())
        <span class="disabled">  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>  </span>
    @else
        <span class="prev">
            <a href="{{ $datas->appends(request()->all())->previousPageUrl() }}" rel="prev">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            </a>
        </span>
    @endif

    @foreach ($datas->getUrlRange(1, $datas->lastPage()) as $page => $url)
        @if ($page == $datas->currentPage())
            <span class="active"><span>{{ $page }}</span></span>
        @else
            <span class="page"><a href="{{ $datas->appends(request()->all())->url($page) }}">{{ $page }}</a></span>
        @endif
    @endforeach

    @if ($datas->hasMorePages())
        <span class="next"><a href="{{ $datas->appends(request()->all())->nextPageUrl() }}" rel="next">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a></span>
    @else
        <span class="disabled"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </span>
    @endif
</div>
<style>
    .pagination{
        padding: 0px;
        margin: 20px 0px;
    }
    .pagination > span{
        background: #dfdfdf;
        border-radius: 2px;
        display: inline-block;
    }
    .pagination span.active, .pagination .disabled {
        display: inline-block;
        padding: 8px;
    }
    .pagination span.active{
        background: #8f8f8f;
    }
</style>
 