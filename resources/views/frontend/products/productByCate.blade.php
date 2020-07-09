@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
<section class="box-all bg-white page-single">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h3 class="title-main fadeInUp wow">{{$cate_product->name}}</h3>
                <div class="desc-box fadeInUp wow" style="display:none;">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>/</li>
                        <li><a href="#">Sản phẩm</a></li>
                    </ul>
                </div>
                <ul class="grid-products">
                    @foreach ($product as $sph)
                    <li class="col-md-3 col-sm-4">
                        <div class="productg">
                            <div class="box-img">
                                <div class="pro_hot">Hot</div>
                            <a href="{{route('detail_product',$sph->slug)}}">
                                    <img src="{{asset($sph->image)}}" alt=""></a>
                            </div>
                            <div class="pro_descript">
                                <span class="title-product">{{$sph->name}}</span>
                                @if($sph->price->price)
                                <span class="title-price">{{number_format($sph->price,0,',','.')}} VND</span>
                                @else
                                <span class="title-price">Giá liên hệ</span>
                                @endif
                            </div>
                            <div class="muasp">
                                <div class="soluong">
                                    <label for="quantity">SL:</label>
                                    <input id="quantity" type="number" name="quantity" step="1" min="1" max="10"
                                        value="1" required>
                                </div>
                                <a class="giohang">
                                    <img src="{{asset('frontend/img/giohangsp.png')}}" />
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    

                </ul>
                <div style="clear:both;">
                    {{$product->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection