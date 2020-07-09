@extends('frontend.partials.master')

@if($intro)
    @section('title', $intro->title_seo)
    @section('title_seo', $intro->title_seo)
    @section('meta_key', $intro->meta_key)
    @section('meta_des', $intro->meta_des)
    @section('content')
    <section class="box-all bg-white page-gioithieu">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="title-gioithieu fadeInUp wow">GIỚI THIỆU</h3>
                    {!!$intro->description !!}
                </div>
            </div>
        </div>
    </section>
    @endsection
@endif