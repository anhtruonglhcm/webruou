@extends('admin.partials.master')
@section('title', 'Quản lý sản phẩm')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Sản phẩm</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý sản phẩm</li>
            <li class="active">Sản phẩm</li>
        </ol>
    </section>
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    @include('errors.message')
                    <div class="search">
                        <form class="" method="get" enctype="multipart/form-data"
                            action="{{ route('admin.product.search') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                                        <i class=" fa fa-fw fa-plus"></i>
                                        Thêm mới
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="box">
                                    <div class="box-body">
                                        <form method="post" action="{{ route('checkbox') }}">
                                            {{ csrf_field() }}
                                            <table id="datatable_order" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall" name="checkall" />
                                                        </th>
                                                        <th>STT</th>
                                                        <th>Ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Trạng thái</th>
                                                        <th>SP home</th>
                                                        <th>SP hot</th>
                                                        <th>Cập nhật</th>
                                                        <th>Xử lý</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($product as $key => $c)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="checkbox[]" class="checkbox"
                                                                value="{{ $c->id }}">
                                                        </td>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td style="text-align:center">
                                                            <img src="{{ asset($c->image) }}" style="height: 60px">
                                                        </td>
                                                        <td>{{ $c->name }}</td>
                                                        <td>
                                                            @if($c->status == 1)
                                                            <a href="#" title="Ẩn" id="status" data-id="{{ $c->id }}">
                                                                <span id="status{{ $c->id }}"><span
                                                                        class="label label-success">Hiện</span></span>
                                                            </a>
                                                            @else
                                                            <a href="#" title="Hiện" id="status" data-id="{{ $c->id }}">
                                                                <span id="status{{ $c->id }}"><span
                                                                        class="label label-danger">Ẩn</span></span>
                                                            </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($c->is_home == 1)
                                                            <a href="#" title="Ẩn" id="is_home" data-id="{{ $c->id }}">
                                                                <span id="is_home{{ $c->id }}"><span
                                                                        class="label label-success">Hiện</span></span>
                                                            </a>
                                                            @else
                                                            <a href="#" title="Hiện" id="is_home"
                                                                data-id="{{ $c->id }}">
                                                                <span id="is_home{{ $c->id }}"><span
                                                                        class="label label-danger">Ẩn</span></span>
                                                            </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($c->is_hot == 1)
                                                            <a href="#" title="Ẩn" id="is_hot" data-id="{{ $c->id }}">
                                                                <span id="is_hot{{ $c->id }}"><span
                                                                        class="label label-success">Hiện</span></span>
                                                            </a>
                                                            @else
                                                            <a href="#" title="Hiện" id="is_hot" data-id="{{ $c->id }}">
                                                                <span id="is_hot{{ $c->id }}"><span
                                                                        class="label label-danger">Ẩn</span></span>
                                                            </a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $c->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.product.update', $c->slug)}}">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a href="{{ route('admin.product.destroy', $c->id) }}"
                                                                type="button"
                                                                onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                                <i class="fa fa-times-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall" name="checkall" />
                                                        </th>
                                                        <th>STT</th>
                                                        <th>Ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Trạng thái</th>
                                                        <th>Cập nhật</th>
                                                        <th>Xử lý</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <select class="" name="select_action">
                                                <option value="0">Lựa chọn</option>
                                                <option value="1">Xóa</option>
                                                <option value="2">Hiện</option>
                                                <option value="3">Ẩn</option>
                                            </select>
                                            <button id="delete_all" class="btn-success">Thực hiện</button>
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
</div><!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable_order').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<select><option value="">Chọn</option></select>')
                    .appendTo($(column.footer()).empty())
                    .css('width', '60px')
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });
});
</script>
<script type='text/javascript'>
$(document).ready(function() {
    $(".checkall").change(function() {
        var checked = $(this).is(':checked');
        if (checked) {
            $(".checkbox").each(function() {
                $(this).prop("checked", true);
            });
        } else {
            $(".checkbox").each(function() {
                $(this).prop("checked", false);
            });
        }
    });

    $(".checkbox").click(function() {
        if ($(".checkbox").length == $(".checkbox:checked").length) {
            $(".checkall").prop("checked", true);
        } else {
            $(".checkall").removeAttr("checked");
        }
    });
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click', '#status', function() {
    var id = $(this).data('id');
    $.post('/admin/product/status', {
            id: id
        },
        function(data) {
            if (data.status == 1) {
                $('#status' + id).html('<span class="label label-success">Hiện</span>');
            } else {
                $('#status' + id).html('<span class="label label-danger">Ẩn</span>');
            }
        });
});
$(document).on('click', '#is_home', function() {
    var id = $(this).data('id');
    $.post('/admin/product/is_home', {
            id: id
        },
        function(data) {
            if (data.is_home == 1) {
                $('#is_home' + id).html('<span class="label label-success">Hiện</span>');
            } else {
                $('#is_home' + id).html('<span class="label label-danger">Ẩn</span>');
            }
        });
});
$(document).on('click', '#is_hot', function() {
    var id = $(this).data('id');
    $.post('/admin/product/is_hot', {
            id: id
        },
        function(data) {
            if (data.is_hot == 1) {
                $('#is_hot' + id).html('<span class="label label-success">Hiện</span>');
            } else {
                $('#is_hot' + id).html('<span class="label label-danger">Ẩn</span>');
            }
        });
});
</script>
@endsection