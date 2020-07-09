@extends('frontend.partials.master')
@section('title', 'Tìm kiếm')
@section('content')
<section class="box-all bg-white page-single">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-main fadeInUp wow">Sản phẩm liên quan đến: {{$input}}</h3>                
				<ul class="grid-products">
                    @foreach($search as $sph)
                	<li class="col-md-3 col-sm-4">
                        <div class="productg">
                            <div class="box-img">
                                <div class="pro_hot">Hot</div>
                            <a href="{{route('detail_product',$sph->slug)}}">
                                    <img src="{{asset($sph->image)}}" alt=""></a>
                            </div>
                            <div class="pro_descript">
                                <span class="title-product">{{$sph->name}}</span>
                                <span class="title-price">{{number_format($sph->price,0,',','.')}} VND</span>
                            </div>
                            <div class="muasp">
                                <div class="soluong">
                                    <label for="quantity">SL:</label>
                                <input id="quantity" type="number" name="quantity" step="1" min="1" max="10" class="sp{{$sph->id}}"
                                        value="1" required>
                                </div>
                                <a class="giohang" data-id="{{$sph->id}}">
                                    <img src="{{asset('frontend/img/giohangsp.png')}}" />
                                </a>
                            </div>
                        </div>
                    </li> 
                    @endforeach				
				</ul>
			<div style="clear:both;"></div>
            </div>
		</div>
	</div>
</section>
@endsection