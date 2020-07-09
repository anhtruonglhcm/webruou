@extends('frontend.partials.master')
@section('title', $detail->title_seo)
@section('title_seo', $detail->title_seo)
@section('meta_key', $detail->meta_key)
@section('meta_des', $detail->meta_des)
@section('content')
<section class="box-all bg-white page-gioithieu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h3 class="title-gioithieu fadeInUp wow">{{$detail->name}}</h3>
            {!!$detail->description!!}
                <div class="row" style="padding:20px 0 20px 15px; ">
                    <ul class="list-inline">
                        <li>
                        <span class="created"><b>Ngày: </b>{{date('d/m/Y',strtotime($detail->created_at))}}</span>
                        </li>

                        {{-- <li>
                        <span class="hits"><b>Lượt xem: </b> {{$detail->luotxem}}</span>

                        </li> --}}
                    </ul>
                </div>
                <div class="row">
                    <h3 class="title-gioithieu fadeInUp wow">Bài viết liên quan</h3>

                    <ul class="grid-products">
                        @foreach ($bloglienquan as $bl)
                        <li class="col-md-3 col-sm-4 fadeInUp wow">
                            <div class="productg" style="height:280px;">
                            <a href="{{route('detail',$bl->slug)}}">
                                    <div class="box-img" style="height:200px; width:auto;"><img
                                            style="min-height:auto;"
                                    src="{{asset($bl->image)}}"
                                            alt="{{$bl->name}}">
                                    </div>
                                    <span class="title-product">
                                        {{$bl->name}} </span>
                                </a>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=1579370508992302";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endsection
