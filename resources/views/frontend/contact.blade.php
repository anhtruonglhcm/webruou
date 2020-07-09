@extends('frontend.partials.master')
@section('title', 'Liên hệ')
@section('content')
@php
     $setting = DB::table('settings')->first();
@endphp
<section class="box-all bg-white page-gioithieu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {!!$setting->map!!}
                   <div class="form-horizontal bg-white space-padding-20">
                    <div class="row">
                        @if(Session::has('success'))
                                    <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                                @endif
                        <fieldset class="col-md-4">
                            <h3></h3>
                            <div class="contact-customhtml">
                                <div class="content">
                                    <div class="panel-contact-info">
                                        <div class="panel-body">
                                            <div class="row">

                                                <div class="media">
                                                    <div class="media-icon pull-left"><span
                                                            class="fa fa-home fa-2x"></span></div>
                                                    <div class="media-body">
                                                        {!!$setting->intro!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="col-md-8">
                            <form action="{{route('post_contact')}}" method="post">
                                @csrf
                            <h3 class="title-gioithieu fadeInUp wow">Thông tin yêu cầu</h3>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-name">Họ tên:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="" id="input-name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-email">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" value="" id="input-email"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-email">Tiêu đề:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="" id="input-email"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-enquiry">Nội dung:</label>
                                <div class="col-sm-10">
                                    <textarea name="content" rows="10" id="input-enquiry"
                                        class="form-control" required></textarea>
                                </div>
                            </div>

                            {{-- <fieldset>
                                <!--<legend></legend>-->
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-captcha">Nhập mã code như hình
                                        bên dưới: </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="captcha" id="input-captcha" class="form-control" />
                                        <img src="#" alt="" />
                                    </div>
                                </div>
                            </fieldset> --}}
                            <div class="buttons">
                                <div class="pull-right">
                                    <input class="btn btn-primary" type="submit" value="Gửi đi" />
                                </div>
                            </div>
                        </form>
                        </fieldset>
                    </div>
                    </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection