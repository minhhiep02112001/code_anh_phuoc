@extends('front_end._index')
@section('content')
    <div id="shopify-section-search-template" class="shopify-section">
        <div class="wrapper" style="padding-top:px; padding-bottom:px;">
            <div class="grid">
                <div class="grid__item">
                    <header class=" text-center" style="margin-top: 20px;">
                        <h1 class="text-center">Danh sách sản phẩm yêu thích :</h1>
                        <hr class="hr--small">
                    </header>
                    <div class="grid-uniform" style="margin-top: 20px;">
                        @if(!empty($rows) &&!empty($products) && $products->count()>0)
                            @foreach($rows as $id)
                                @php $product = collect($products)->where('id', $id)->first(); @endphp
                                @if(empty($product))
                                    @continue
                                @endif
                                @include('front_end.block.item_product_list', ['product' => $product])
                            @endforeach
                        @else
                            <div style="margin-bottom: 20px; text-align: center;">
                                <h4>Không có kết quả phù hợp với từ khóa "{{$value}}"</h4>
                            </div>
                        @endif

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
