@extends('frontend/partials/master')
@section('title', $setting->name)
@section('title_seo', $setting->title_seo)
@section('meta_key', $setting->meta_key)
@section('meta_des', $setting->meta_des)
@section('content')
@php
$setting = DB::table('settings')->where('id',1)->first();
$banner = DB::table('slides')->where('status',1)->where('dislay',3)->get();
$danhmucslide = DB::table('cate_products')->where('status',1)->where('parent_id',8)->get();
$sphot = DB::table('products')->where('status',1)->where('is_hot',1)->get();
$tintuc = DB::table('posts')->where('status',1)->where('cate_post_id',1)->get();
$sp = DB::table('products')->where('status',1)->where('is_home',1)->get();
$doitac = DB::table('posts')->where('status',1)->where('cate_post_id',2)->get();
$blog = DB::table('posts')->where('status',1)->where('cate_post_id',3)->get();
$product = DB::table('products')->where('status',1)->orderBy('id','DESC')->get();
$dmkhac = DB::table('cate_products')->where('status',1)->where('parent_id','<>',8)->orderBy('id','DESC')->get();
$slsp = count($product);
$sodivto = ceil($slsp /8);
$module = ($slsp % 8);
@endphp
<section>
    <div class="banner box-all">
        <div id="slider1111">
            @foreach($banner as $bn)
            <div>
                <img src="{{asset($bn->image)}}" />
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="box-all bg-hoixanh">
    <div class="container">
        <div class="slider333">
            @foreach ($danhmucslide as $dmsl)
                    <div class="product-col-wrap fadeInUp wow">
                        <div class="product-col border">
                            <div class="product danhmuc">
                                <a href="{{route('productByCate',$dmsl->slug)}}">
                                    <img src="{{asset($dmsl->image)}}" alt="{{$dmsl->name}}">
                                </a>
                            </div>
                        </div>
                    </div>
                 @endforeach
        </div>
    </div>

</section>

<section class="box-all bg-white sectionre">
    <section class="sphot">
        <div class="container">
            <div class="row">
                <ul class="grid-products hothot">
                    @foreach ($sphot as $sph)
                    <li class="col-md-3 col-sm-4 col-sx-6">
                        <div class="productg">
                            <div class="box-img">
                                <div class="pro_hot">Big Deal</div>
                                <a href="{{route('detail_product',$sph->slug)}}">
                                    <img src="{{asset($sph->image)}}" alt=""></a>
                            </div>
                            <div class="pro_descript">
                                <span class="title-product">{{$sph->name}}</span>
                                @if($sph->price > 0)
                                <span class="title-price">{{number_format($sph->price,0,',','.')}} VND</span>
                                @else
                                <span class="title-price">Giá liên hệ</span>
                                @endif
                            </div>
                            <div class="muasp">
                                <div class="soluong">
                                    <label for="quantity">SL:</label>
                                    <input id="quantity" type="number" name="quantity" step="1" min="1" max="10"
                                        class="sp{{$sph->id}}" value="1" required>
                                </div>
                                <a class="giohang" data-id="{{$sph->id}}">
                                    <img src="{{asset('frontend/img/giohangsp.png')}}" />
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

    </section>
    <section class="sp">
        <div class="container">
            <div class="thung">
                <div class="box-header">
                    <a href="">Sản phẩm</a>
                    <div class="gachchan"></div>
                </div>
            </div>

            <?php
            function isMobile6()
            {
                return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
            }
            if (isMobile6()) { ?>

            <div class="grid-products">
                <div class="dsspne_mb">
                    @foreach ($product as $p )

                    <li class=" col-xs-12 fadeInUp wow">
                        <div class="productg">
                            <div class="box-img">
                                <a href="{{route('detail_product',$p->slug)}}">
                                    <img src="{{$p->image}}" alt="{{$p->image}}"></a>
                            </div>
                            <div class="pro_descript">
                                <span class="title-product">{{$p->name}}</span>
                                @if($p->price > 0)
                                    <span class="title-price">{{number_format($p->price, 0, ',', '.')}} VND</span>
                                 @else
                                    <span class="title-price">Giá liên hệ</span>
                                 @endif
                            </div>
                            <div class="muasp">
                                <div class="soluong">
                                    <label for="quantity">SL:</label>
                                    <input id="quantity" type="number" name="quantity" step="1" min="1" max="10"
                                        class="spp{{$p->id}}" value="1" required>
                                </div>
                                <a class="giohan" data-id="{{$p->id}}" id="giohang2">
                                    <img src="{{asset('frontend/img/giohangsp.png')}}" />
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </div>


                <?php } else { ?>
                <div class="row">
                    <div class="dsspne">
                        @for($i=0; $i < $sodivto;$i++) <div>
                            <ul class="grid-products">
                                @if($i != $sodivto-1)
                                @for($x=0; $x < 8; $x++) @php $slug=$product[8*$i+$x]->slug;
                                    $price = $product[8*$i+$x]->price;
                                    $id = $product[8*$i+$x]->id;
                                    @endphp
                                    <li class="col-md-3 col-sm-4 col-xs-12 fadeInUp wow">
                                        <div class="productg">
                                            <div class="box-img">
                                                <a href="{{route('detail_product',$slug)}}">
                                                    <img src="<?php echo $product[8 * $i + $x]->image; ?>" alt=""></a>
                                            </div>
                                            <div class="pro_descript">
                                                <span
                                                    class="title-product"><?php echo $product[8 * $i + $x]->name; ?></span>
                                                    @if($price > 0)
                                                    <span class="title-price">{{number_format($price, 0, ',', '.')}}
                                                        VND</span>                                                   
                                                    @else
                                                    <span class="title-price">Giá liên hệ</span>
                                                    @endif
                                            </div>
                                            <div class="muasp">
                                                <div class="soluong">
                                                    <label for="quantity">SL:</label>
                                                    <input id="quantity" type="number" name="quantity" step="1" min="1"
                                                        max="10" class="spp<?php echo $id; ?>" value="1" required>
                                                </div>
                                                <a class="giohan" data-id="<?php echo $id; ?>" id="giohang2">
                                                    <img src="{{asset('frontend/img/giohangsp.png')}}" />
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @endfor
                                    @elseif($i == $sodivto-1)
                                    @for($x=1; $x < $module; $x++) @php $slug=$product[8*$i+$x]->slug;
                                        $price = $product[8*$i+$x]->price;
                                        $id = $product[8*$i+$x]->id;
                                        @endphp
                                        <li class="col-md-3 col-sm-4 col-xs-12 fadeInUp wow">
                                            <div class="productg">
                                                <div class="box-img">
                                                    <a href="{{route('detail_product',$slug)}}">
                                                        <img src="<?php echo $product[8 * $i + $x]->image; ?>"
                                                            alt=""></a>
                                                </div>
                                                <div class="pro_descript">
                                                    <span
                                                        class="title-product"><?php echo $product[8 * $i + $x]->name; ?></span>
                                                        @if($price > 0)
                                                        <span class="title-price">{{number_format($price, 0, ',', '.')}}
                                                            VND</span>                                                   
                                                        @else
                                                        <span class="title-price">Giá liên hệ</span>
                                                        @endif
                                                </div>
                                                <div class="muasp">
                                                    <div class="soluong">
                                                        <label for="quantity">SL:</label>
                                                        <input id="quantity" type="number" name="quantity" step="1"
                                                            min="1" max="10" class="spp<?php echo $id; ?>" value="1"
                                                            required>
                                                    </div>
                                                    <a class="giohan" data-id="<?php echo $id; ?>" id="giohang2">
                                                        <img src="{{asset('frontend/img/giohangsp.png')}}" />
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        @endfor
                                        @endif

                            </ul>
                    </div>
                    @endfor
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <section class="canhtphai">
        <div>
            <a href="mailto:{{$setting->email}}"><img src="{{asset('frontend/img/maitrang.png')}}"></a>
        </div>
        <div>
            <a href="{{$setting->facebook}}"><img src="{{asset('frontend/img/fbtrang.png')}}"></a>
        </div>
        <div>
            <a href="{{$setting->zalo}}"><img src="{{asset('frontend/img/zalonentrang.jpg')}}"></a>
        </div>
        <div>
            <a href="{{$setting->phone}}"><img src="{{asset('frontend/img/phonenentrang.jpg')}}"></a>
        </div>
    </section>
</section>

<section class="box-all bg-hoixanh">
    <div class="container">
        <div class="thung thungcencter thungtintuc">
            <div class="box-header2">
                <a href="">Khuyến mãi</a>
                <div class="gachchan"></div>
            </div>
        </div>
        <div class="slidetintuc">
            @foreach ($tintuc as $tt)
                    <div class="product-col-wrap">
                        <div class="product-col border">
                            <div class="product tintuc">
                                <a href="{{route('detail',$tt->slug)}}">
                                    <img src="{{asset($tt->image)}}" alt=""></a>
                                <div class="box_des">
                                    <div class="new_name">{{$tt->name}} </div>
                                    <div class="new_desc">{!!$tt->title!!}</div>
                                    <a href="{{route('detail',$tt->slug)}}" class="xemthem">xem thêm</a>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
        </div>
    </div>


    
</section>

<section class="box-all bg-white">
    <div class="container">
        <div class="thung thungcencter thungdoitac2">
            <div class="box-header2">
                <a href="">Sản phẩm khác</a>
                <div class="gachchan"></div>
            </div>
        </div>
    </div>
    <div class="thungdoitac">
        <div class="container">
            <div class="slidedoitac">
                @foreach ($dmkhac as $dt)
                <div class="khoidanhmuckhac">
                    <a href="{{route('productByCate',$dt->slug)}}"><img src="{{asset($dt->image)}}" alt="{{$dt->name}}"/></a>
                    <h4 class="tieudedanhmuckhac">{{$dt->name}}</h4>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="box-all bg-white khoiblogto">
    <div class="container">
        <div class="thung thungcencter thungblog">
            <div class="box-header2">
                <a href="">Blog</a>
                <div class="gachchan"></div>
            </div>
        </div>
        <div class="slideblog">
            @foreach ($blog as $bl)
                    <div class="product-col-wrap">
                        <div class="product-col border">
                            <div class="product blog2">
                                <a href="{{route('detail',$bl->slug)}}">
                                    <img src="{{asset($bl->image)}}" alt=""></a>
                                <div class="box_des">
                                    <div class="new_name">{{$bl->name}}</div>
                                    <div class="new_desc">{!!$bl->title !!}</div>
                                    <a href="{{route('detail',$bl->slug)}}" class="xemthem">xem thêm</a>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
        </div>
    </div>
    </div>

</section>
@endsection