@php
    $cate_pro = DB::table('cate_products')->where('status',1)->get();
    $setting = DB::table('settings')->where('id',1)->first();
 @endphp

<div class="header2">
    <script type="text/javascript">
        $(document).ready(function () {
            $('#menu_mobile').click(function () {
                if ($('#menu_main_ul').css('display') == "block") {
                    $('#menu_main_ul').slideUp();
                }
                else {
                    $('#menu_main_ul').slideDown();
                }
            });
        });
    </script>
    <div class="header-mobile">
        <div class="container posre">
            <div class="row">
                <div class="col-md-2 col-xs-3 text-center">
                <a href="{{route('index')}}"><img src="{{asset($setting->logo)}}" alt="" class="image-logo"></a>
                </div>
                <div class="col-md-5 col-xs-9 pd0">
                    <form name="formSearch" method="GET"
                    action="/san-pham/tim-kiem" class="box_search">
                    <div class="form-search">
                        <input type="hiden" value="-1" name="type" style="display:none;">
                        <input type="text" name="keyword" id="text-searchsearch" class="form-control txtSearch"
                            value="" placeholder="Tìm kiếm" />
                        <button type="submit" id="btn-search-mobile" class="btn-search" />
                    </div>
                </form>
                    <div class="box-social fright">
                        <div class="box-social-inner">
                            <div class=khoiheader>
                                <a href="tel:{{$setting->phone}}"><img src="{{asset('frontend/img/headercall.png')}}" class="img-s" /></a>
                            </div>
                            <div class=khoiheader>
                                <a href="{{$setting->zalo}}"><img src="{{asset('frontend/img/zalo11.jpg')}}" class="img-s zalo" /></a>
                            </div>
                            <div class=khoiheader>
                                 <a href="{{$setting->facebook}}"><img src="{{asset('frontend/img/fb.png')}}" class="img-s zalo" /></a>
                             </div>
                            <div class=khoiheader>
                                    <a href="{{$setting->gplus}}"><img src="{{asset('frontend/img/gplus22.jpg')}}" class="img-s zalo" /></a>
                             </div>
                            <div class="khoiheader headergiohang">
                                <a class="slsp" id= "slsp" href="{{route('cart.index')}}">{{Cart::count()}}</a>
                            <a href="{{route('cart.index')}}"><img src="{{asset('frontend/img/gio hang.png')}}" class="img-s" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-header">
        <div class="container posre">
            <div class="row headertop">
                <div class="col-md-2 col-xs-4">
                    <a href="{{route('index')}}"><img src="{{asset($setting->logo)}}" alt="" class="image-logo"></a>
                </div>
                <div class="col-md-7 pd0">
                    <div class="search-cart">
                        <div class="vnt-search">
                            <div class="formsearch">
                                <form name="formSearch" method="GET"
                                    action="/san-pham/tim-kiem" class="box_search">
                                    @csrf
                                    <div class="input-group">
                                        <div class="input-group-select">
                                            <select class="form-control" name="type">
                                                <option value="-1">Tất cả</option>
                                                @foreach ($cate_pro as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input name="keyword" type="text" value="" class="text_search form-control">

                                        <div class="input-group-btn">
                                            <button type="submit" value="" class="btn"><span>Tìm
                                                    kiếm</span><img src="{{asset('frontend/img/search.png')}}"></button>
                                        </div>
                                        <!---->
                                    </div>
                                    {{-- <input name="do_search" value="1" type="hidden"> --}}
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-8">
                    <div class="box-social fright">
                        <div class="box-social-inner">
                            <div class=khoiheader>
                                <a href="tel:{{$setting->phone}}"><img src="{{asset('frontend/img/headercall.png')}}" class="img-s" /></a>
                            </div>
                            <div class=khoiheader>
                                <a href="{{$setting->zalo}}"><img src="{{asset('frontend/img/zalo11.jpg')}}" class="img-s zalo" /></a>
                            </div>
                            <div class=khoiheader>
                                 <a href="{{$setting->facebook}}"><img src="{{asset('frontend/img/fb.png')}}" class="img-s zalo" /></a>
                             </div>
                            <div class=khoiheader>
                                    <a href="{{$setting->gplus}}"><img src="{{asset('frontend/img/gplus22.jpg')}}" class="img-s zalo" /></a>
                             </div>
                            <div class="khoiheader headergiohang">
                            <a class="slsp" href="{{route('cart.index')}}">{{Cart::count()}}</a>
                            <a href="{{route('cart.index')}}"><img src="{{asset('frontend/img/gio hang.png')}}" class="img-s" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-main">
        <div class="container">
            <div class="box-nav">
                <div class="row">
                    <div class="col-md-3">
                        <div class="categories">
                            <div class="dropdown categories">
                                <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    Danh mục sản phẩm
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">                                    
                                    @foreach ($cate_pro as $cate)
                                <li><a href="{{route('productByCate',$cate->slug)}}">{{$cate->name}}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <script>
                        jQuery('.dropdowncat2').on('click', function (e) {
                            e.preventDefault();
                            if (jQuery('.dropdown-category2').css('display') == "none") {
                                jQuery('.dropdown-category2').slideDown();
                            }
                            else {
                                jQuery('.dropdown-category').slideUp();
                            }
                        });
                    </script>
                    <a href="javascript:void(0)" id="menu_mobile"><img src="{{asset('frontend/image/icon-menu.svg')}}" /></a>
                    <div class="col-md-9">
                        <ul class="menu_main" id="menu_main_ul">
                            <li>
                            <a href="{{route('index')}}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{route('intro')}}">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="{{route('allProduct')}}">Sản phẩm</a>
                            </li>
                            @php
                                $cate_post = DB::table('cate_posts')->where('status',1)->get();
                            @endphp
                            @foreach ($cate_post as $cate)
                            <li>
                                <a href="{{route('postByCate',$cate->slug)}}">{{$cate->name}}</a>
                            </li>
                            @endforeach
                            <li>
                                <a href="{{route('contact')}}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
	$(function(){
		$('.menu_main li a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
		$('.menu_main li a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})
	})
    </script>
@endsection