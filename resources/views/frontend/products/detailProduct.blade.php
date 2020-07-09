@extends('frontend.partials.master')
@section('title', 'Sản phẩm chi tiết')
@section('content')
<section class="box-all bg-white page-single">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="title-main fadeInUp wow">{{$detail_product->name}}</h3>
                <div class="desc-box fadeInUp wow" style="display:none;">
                    <ul class="breadcrumbs">
                    <li><a href="{{route('index')}}">Home</a></li>
                        <li>/</li>
                    <li><a href="{{route('allProduct')}}">Sản phẩm</a></li>
                        <li>/</li>
                    <li><a href="{{route('detail_product',$detail_product->id)}}">{{$detail_product->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                    <div class="productg">
                        <div class="box-img">
                            <div class="pro_hot">Hot</div>
                        <a href="{{route('detail_product',$detail_product->slug)}}">
                                <img src="{{asset($detail_product->image)}}" alt=""></a>
                        </div>
                        <div class="pro_descript">
                            <span class="title-product">{{$detail_product->name}}</span>
                            @if($detail_product->price > 0)
                            <span class="title-price">{{number_format($detail_product->price,0,',','.')}} VND</span>
                            @else
                            <span class="title-price">Giá liên hệ</span>
                            @endif
                        </div>
                        <div class="muasp">
                        </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="desc-product">
                    {!!$detail_product->title!!}
                </div>
                <div class="muasanpham">
                    <form method="post" action="{{ route('buynow')}}">
                        @csrf
                    <div class="soluongsp">
                        <input id="qty" name="quantity" type="text" class="soluong" value="1">
                        <div class="upqty">+</div>
                        <div class="downqty">–</div>
                    </div>
                    <input id="qty" name="id" type="hidden" value="{{$detail_product->id}}">
                    <div>
                    <input type="submit" class="buynow" value="Mua ngay">
                    </div>
                </form>
                </div>
                               {{--  --}}
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="vachngancach"></div>
            <div class="desc-product-bottom">
                {!!$detail_product->description !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3 class="other-products">Sản phẩm khác</h3>
            </div>
            <ul class="grid-products">
                @php
                    $productother = DB::table('products')->where('status', 1)->where('id','<>',$detail_product->id)->orderby('position','ASC')->limit(8)->get();
                @endphp
                @foreach ($productother as $other)
                <li class="col-md-3 col-sm-4 fadeInUp wow">
                    <div class="productg">
                        <div class="box-img">
                            <a href="{{route('detail_product',$other->slug)}}">
                            <img src="{{asset($other->image)}}" alt=""></a>
                        </div>
                        <div class="pro_descript">
                        <span class="title-product">{{$other->name}}</span>
                        @if($other->price > 0)
                        <span class="title-price">{{number_format($other->price, 0, ',', '.')}} VND</span>
                        @else
                        <span class="title-price">Giá liên hệ</span>
                        @endif
                        </div>
                        <div class="muasp">
                            <div class="soluong">
                                <label for="quantity">SL:</label>
                                <input id="quantity" type="number" name="quantity" step="1" min="1" max="10" class="sp{{$other->id}}"
                                    value="1" required>
                            </div>
                            <a class="giohang" data-id="{{$other->id}}">
                                <img src="{{asset('frontend/img/giohangsp.png')}}" />
                            </a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
</section>
@endsection
{{-- <script>
    (function () {
        $('.upqty').click(function(){
            var qty = $('.soluong').val();
        console.log(qty);
        })
        
    })
    function updownqty(str){
    var qty = $('.soluong').val();
    console.log(qty);
    
	if(str=='up') { qty++; }
	if(str=='down') { if(qty>1) { qty--; } }
	$('#qty').val(qty);
	
}
</script> --}}
