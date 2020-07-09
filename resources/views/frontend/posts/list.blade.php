@extends('frontend.partials.master')
{{-- @section('title', $cate_post->name)
@section('title_seo', $cate_post->title_seo)
@section('meta_key', $cate_post->meta_key)
@section('meta_des', $cate_post->meta_des)
@section('canonical')
{{ URL::current() }}
@stop --}}
@section('content')
<section class="box-all bg-white page-gioithieu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <h3 class="title-gioithieu fadeInUp wow">{{$post->name}}</h3>
                @foreach ($ds_post as $bl)
                <div class="row" style="margin-bottom:30px;">
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="image">
                            <img src="{{asset('/'.$bl->image)}}"
                                alt="{{$bl->name}} "
                                title="{{$bl->name}} "
                                class="img-responsive" style="width:90%;" height="90%"/>
                        </div>
                    </div>
                    <div class="blog-meta col-lg-8 col-md-8 col-sm-7 col-xs-12">
                        <div class="blog-body">
                            <div class="blog-header">
                            <h3 class="blog-title"> <a href="{{route('detail',$bl->slug)}}"
                                        title="{{$bl->name}} ">{{$bl->name}} </a></h3>
                            </div>
                            <div class="description">
                                <p dir="ltr"
                                    style="text-align: justify; margin-top: 0pt; margin-bottom: 0pt; line-height: 1.38;">
                                    <span style="background-color: transparent; font-size: 18px;">
                                    <font face="Times New Roman" style="background-color: transparent; font-size: 18px;">{!!$bl->title!!}</font>
                                    </span><br></p>
                                <p dir="ltr" style="margin-top: 0pt; margin-bottom: 0pt; line-height: 1.38;"><br>
                                </p>
                            </div>
                            <ul class="list-inline">
                                <li>
                                    <span class="created"><b>Ngày: </b> {{date('Y-m-d',strtotime($bl->created_at))}}</span>
                                </li>
                                {{-- <li>
                                <span class="hits"><b>Lượt xem: </b> {{$bl->luotxem}}</span>
                                </li> --}}
                            </ul>
                        <a href="{{route('detail',$bl->slug)}}" class="btn btn-primary btn-arrow-right">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <div style="clear:both;">
                    {{-- <ul class="pagination">
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">&gt;</a></li>
                        <li><a href="#">&gt;|</a>
                        </li>
                    </ul> --}}

                    {{$ds_post->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection