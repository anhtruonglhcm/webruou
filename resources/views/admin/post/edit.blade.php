@extends('admin.partials.master')
@section('title', 'Sửa bài viết')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    <div class="page-heading">
                        <h1>Sửa bài viết</h1>
                        <div class="options">
                            <div class="btn-toolbar">
                            </div>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li>Trang chủ</li>
                        <li>Quản lý bài viết</li>
                        <li>Bài viết</li>
                        <li class="active">Sửa</li>
                    </ol>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    </div>
                                    @include('errors.message')
                                    <div class="panel-body">
                                        <form role="form" class="form-horizontal" method="POST"
                                            action="{{ route('admin.post.postUpdate', $post->slug) }}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Tên: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Nhập tên"
                                                            name="name" value="{{ $post->name }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Danh mục: </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="cate_post_id">
                                                            @foreach($data as $l)
                                                            <option {{$post->cate_post_id == $l->id ? 'selected': ''}}
                                                                value="{{$l->id}}">{{$l->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Slug: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Nhập slug"
                                                            name="slug" value="{{ $post->slug }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Ảnh bìa: </label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-8">
                                                        <img src="{{ asset($post->image) }}"
                                                            style="height: 50px; width: 50px">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Trạng thái: </label>
                                                    <label class="switch">
                                                        <input type="checkbox" name="status"
                                                            {{ ($post->status) ? 'checked': '' }}>
                                                        <span class="slider round"></span>
                                                        <input type="hidden" name="id" value="1">
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Tin hot: </label>
                                                    <label class="switch">
                                                        <input type="checkbox" name="is_home"
                                                            {{ ($post->is_home) ? 'checked': '' }}>
                                                        <span class="slider round"></span>
                                                        <input type="hidden" name="id" value="1">
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Vị trí: </label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control"
                                                            placeholder="Nhập vị trí" name="position"
                                                            value="{{ $post->position }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Số lượt xem: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            placeholder="Nhập số lượt xem" name="luotxem"
                                                            value="{{ $post->luotxem }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Giới thiệu: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Miêu tả"
                                                            name="title" id="editor2">
                                                        {{ $post->title }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Miêu tả: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Miêu tả"
                                                            name="description" id="editor1">
                                                        {{ $post->description }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Title_SEO: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" placeholder="Title SEO"
                                                            name="title_seo" value="{{ $post->title_seo }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Meta_key: </label>
                                                    <div class="col-md-8">
                                                        <textarea type="text" class="form-control"
                                                            placeholder="Meta_key"
                                                            name="meta_key">{{ $post->meta_key }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Meta_des: </label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" placeholder="Meta_Des"
                                                            name="meta_des">{{ $post->meta_des }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <button class="btn-success btn">Lưu</button>
                                                        <a class="btn-default btn"
                                                            href="{{ route('admin.post.create') }}">
                                                            Hủy
                                                        </a>
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
CKEDITOR.replace('editor1', {
    filebrowserBrowseUrl: '/ckfinder-customer',
});
CKEDITOR.replace('editor2', {
    filebrowserBrowseUrl: '/ckfinder-customer',
});
</script>
@endsection