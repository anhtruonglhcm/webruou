@extends('admin.partials.master')
@section('title', 'Cấu hình web')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    <div class="page-heading">
                        <h1>Cấu hình web</h1>
                        <div class="options">
                            <div class="btn-toolbar">
                            </div>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li>Trang chủ</li>
                        <li class="active">Cấu hình</li>
                    </ol>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    </div>
                                    @include('errors.message')
                                    <div class="panel-body">
                                        <form role="form" class="form-horizontal" method="post"
                                            action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Tên công ty: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            placeholder="Tên công ty" name="name"
                                                            value="{{ $settings->name }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Email: </label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            required name="email" value="{{ $settings->email }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Địa chỉ: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Địa chỉ"
                                                            required name="address" value="{{ $settings->address }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Điện thoại: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Điện thoại"
                                                            required name="phone" value="{{ $settings->phone }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Hotline: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Hotline"
                                                            required name="hotline" value="{{ $settings->hotline }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Facebook: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Facebook"
                                                            required name="facebook" value="{{ $settings->facebook }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Zalo: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="zalo"
                                                            required name="zalo" value="{{ $settings->zalo }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">G plus: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="gplus"
                                                         name="gplus" value="{{ $settings->gplus }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Bản quyền: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="ban quyen" required
                                                             name="banquyen" value="{{ $settings->banquyen }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Message: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            placeholder="Link message" required name="message"
                                                            value="{{ $settings->message }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Google Map: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control"
                                                            placeholder="Link Iframe google map" required name="map"
                                                            id="thead">{{ $settings->map }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Giới thiệu: </label>
                                                    <div class="col-md-8">
                                                        <textarea name="intro" class="form-control " id="editor2"
                                                            required
                                                            value="{{ old('title') }}">{{ $settings->intro }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Logo: </label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="form-control" name="logo">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-8">
                                                        <img src="{{asset($settings->logo)}}" style="max-width: 30%;" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Ảnh số điện thoại: </label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="form-control" name="banner">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-8">
                                                        <img src="{{asset($settings->banner)}}"
                                                            style="max-width: 30%;" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Icon: </label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="form-control" name="icon">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-8">
                                                        <img src="{{asset($settings->icon)}}" style="max-width: 30%;" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Thẻ head: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Meta_Des"
                                                            name="thead" id="thead">{{ $settings->thead }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Thẻ body: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Meta_Des"
                                                            name="tbody" id="tbody">{{ $settings->tbody }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">File-robot: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Meta_Des"
                                                            name="robot" id="robot">{{ $file }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Title_SEO: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Title SEO"
                                                            name="title_seo" value="{{ $settings->title_seo }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Meta_key: </label>
                                                    <div class="col-md-8">
                                                        <textarea type="text" class="form-control"
                                                            placeholder="Meta_key"
                                                            name="meta_key">{{ $settings->meta_key }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Meta_des: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Meta_Des"
                                                            name="meta_des">{{ $settings->meta_des }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <button class="btn-success btn">Lưu</button>
                                                        <a class="btn-default btn" href='javascript:goback()'>Quay
                                                            lại</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('editor2', {
    filebrowserBrowseUrl: '/ckfinder-customer',
});
</script>

@endsection