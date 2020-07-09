@php
    $setting = DB::table('settings')->where('id',1)->first();
@endphp
<footer class="bg-footer box-all mt30">
    <div class="khoihotro">
        <div class="container">
            <div class="thunghotro">
                <div class="row">
                    <div class="col-sm-4 thunghotro2 thung1">
                        <img src="{{asset('frontend/img/spcall.png')}}" />
                        <p>hỗ trợ 24h</p>
                    </div>
                    <div class="col-sm-4 thunghotro2 ngancach">
                        <img src="{{asset('frontend/img/sp100.png')}}" />
                        <p>hỗ trợ 24h</p>
                    </div>
                    <div class="col-sm-4 thunghotro2 thung1 thung3">
                        <img src="{{asset('frontend/img/spcar.png')}}" />
                        <p>hỗ trợ 24h</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="khoiduoicung">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box-address">
                        <h2 class="fadeInDown wow text-white">Thông tin liên hệ</h2>
                        <div class="fadeInDown wow lineheight text-white">
                            <div class="khoi">
                                <img src="{{asset('frontend/img/map.png')}}" alt="" width="20px" class="mr-2">
                                <p class="p-0 m-0">{{$setting->address}}</p>
                            </div>
                            <div class="khoi">
                                <img src="{{asset('frontend/img/call.png')}}" alt="" width="20px" class="mr-2">
                            <p class="p-0 m-0">{{$setting->phone}}</p>
                            </div>
                            <div class="khoi">
                                <img src="{{asset('frontend/img/call.png')}}" alt="" width="20px" class="mr-2">
                            <p class="p-0 m-0">{{$setting->hotline}}</p>
                            </div>
                            <div class="khoi">
                                <img src="{{asset('frontend/img/mail.png')}}" alt="" width="20px" class="mr-2">
                                <div>
                                    <p class="p-0 m-0">{{$setting->email}}</p>
                                </div>

                            </div>
                            <div class="khoi">
                                <img src="{{asset('frontend/img/fb.png')}}" alt="" width="20px" class="mr-2">
                                <p class="p-0 m-0">{{$setting->facebook}}</p>
                            </div>
                            @if(isset($setting->gplus))
                            <div class="khoi">
                                <img src="{{asset('frontend/img/gplus22.jpg')}}" alt="" width="20px" class="mr-2">
                                <p class="p-0 m-0">{{$setting->gplus}}</p>
                            </div>
                            @endif
                            @if(isset($setting->zalo))
                            <div class="khoi">
                                <img src="{{asset('frontend/img/zalo11.jpg')}}" alt="" width="20px" class="mr-2">
                                <p class="p-0 m-0">{{$setting->zalo}}</p>
                            </div>
                            @endif
                            <!-- <a href="tel:0965480046"><img src="{{asset($setting->banner)}}" alt="" class="mr-1 mb-1"></a> -->
                            

                        </div>
                        <!-- ma fb -->

                    </div>
                </div>
                <div class="col-md-3 fadeInDown wow">
                    <h2 class="fadeInDown wow text-white">Sơ đồ web </h2>
                    <ul class="txtfooter">
                    <li><a href="{{route('index')}}">Trang chủ</a></li>
                    <li><a href="{{route('postByCate','tin-tuc')}}">Tin tức</a></li>
                        <li><a href="{{route('postByCate','doi-tac')}}">Đối tác</a></li>
                        <li><a href="{{route('postByCate','blog')}}">Blog</a></li>
                        <li><a href="{{route('intro')}}">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-5 fright" style="text-align: right;">
                    <h2 class="fadeInDown wow text-white">Liên hệ trực tiếp </h2>
                    <div class="box-small fadeInDown wow">
                        <div class="box-social-footer">
                        <a href="{{$setting->facebook}}"><img src="{{asset('frontend/img/lh_fb.png')}}"></a>
                        <a href="mailto:{{$setting->email}}"><img src="{{asset('frontend/img/lh_mail.png')}}"></a>
                        <a href="tel:{{$setting->phone}}"><img src="{{asset('frontend/img/lh_phone.png')}}"></a>
                        </div>
                        @if(isset($setting->banquyen))
                        <div class="truy-cap txtRight">
                            {{$setting->banquyen}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<a class="messagefacebook" href="{{$setting->message}}"><img src="{{asset('frontend/img/message.png')}}" alt=""></a>
</footer>

<!-- ma tawk.to -->


<script type="text/javascript" src="{{asset('frontend/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.bxslider.js')}}"></script>
<script type="text/javascript">
    $('#slider1').bxSlider({
        mode: 'fade',
        auto: true,
        speed: 1500,
        autoControls: false,
        pager: false,
        controls: true,
        pause: 4000
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).click(function (event) {
            if (!$(event.target).closest('.box-lang').length && !$(event.target).is('.box-lang') && !$(event.target).closest('#btn_lang').length && !$(event.target).is('#btn_lang')) {
                $('.box-lang').slideUp();
            }
        });
        var wow = new WOW({
            boxClass: 'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0,          // distance to the element when triggering the animation (default is 0)
            mobile: true,       // trigger animations on mobile devices (default is true)
            live: false,       // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            }
        }
        );
        wow.init();

        function generateHeader(height) {
            if (height > 90) {

                $('.header').addClass('menu-top-fix');
            }
            else {
                $('.header').removeClass('menu-top-fix');
            }
        }
        $(window).scroll(function () {
            var top = $(document).scrollTop();
            generateHeader(top);
        });
        $(window).scroll();
    });
    $(document).on('click', function (event) {
        var container = $(".menu_main");
        var container2 = $("#menu_mobile");
        var categories = jQuery('.categories');
        if ($(window).width() < 1000) {
            if (!container.is(event.target) && container.has(event.target).length === 0 && !container2.is(event.target) && container2.has(event.target).length === 0) {
                $(".menu_main").slideUp();
            }
        }
        if (!categories.is(event.target) && categories.has(event.target).length === 0) {
            $(".dropdown-category").slideUp();
        }
    });
    function post_registerinformation() {
        var txt_dangky = encodeURIComponent($('#email').val());
        if (txt_dangky == "") {
            alert("Bạn chưa nhập email!");
            $('#email').focus();
            return false;
        } else {
            $.post('index.php?route=common/footer/dangkythongtin&email=' + txt_dangky, function (data) {
                if (data == "OK") {
                    alert("Cảm ơn bạn đã gửi thông tin đăng ký!");
                    $('#email').val("");
                }
            });
        }
    }
</script>
<script>
    $(function () {
        $('.giohang').click(function(){
            var id = $(this).data('id');
            var cl = '.sp'+id;
            var quantity = $(cl).val();
            alert('Thêm giỏ hàng thành công');
            $.get('/cart/add-cart/'+id,{
                quantity: quantity
            },function(data){
                data = JSON.parse(data);               
                $('.slsp').html(data.sosanpham);           
            })
        })
    })
</script>
<script>
    $(function () {
        $('.giohan').click(function(){
            var id = $(this).data('id');
            var cl = '.spp'+id;
            var quantity = $(cl).val();
            alert('Thêm giỏ hàng thành công');
            $.get('/cart/add-cart/'+id,{
                quantity: quantity
            },function(data){
                data = JSON.parse(data);               
                $('.slsp').html(data.sosanpham);           
            })
        })
    })
</script>
