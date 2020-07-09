@extends('frontend.partials.master')
@section('title', 'Trang chủ')
@section('content')
<section class="box-all bg-white page-single">
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div id="content" class="col-sm-12">
            <h3 class="title-gioithieu">Giỏ hàng của bạn</h3>
            <!--  -->
            <!--  -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Hình ảnh</td>
                            <td class="text-left">Tên sản phẩm</td>
                            <td class="text-left">Mã hàng</td>
                            <td class="text-left">Số lượng</td>
                            <td class="text-right" style="display:none;">Đơn Giá</td>
                            <td class="text-right" style="display:none;">Khuyến mãi</td>
                            <td class="text-right">Thành Tiền</td>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($content as $c )
                        @php
                        $product = DB::table('products')->where('id',$c->id)->first();
                        @endphp
                        <tr>
                            <td class="text-center"> <a href="{{route('detail_product',$product->slug)}}"><img
                                        src="{{asset($product->image)}}" alt="{{$c->name}}" title="{{$c->name}}"
                                        class="img-thumbnail" width="100px" /></a>
                            </td>
                            <td class="text-left"><a href="{{route('detail_product',$product->slug)}}">{{$c->name}}
                                </a>
                            </td>
                            <td class="text-left">{{number_format($c->price)}} VND</td>
                            <td class="text-left oinput">
                                <div class="input-group btn-block" style="max-width: 200px; display:flex;">
                                    <input type="text" name="quantity[380]" value="{{$c->qty}}" size="1"
                                        data-id="{{$c->id}}" rowId="{{$c->rowId}}" id="{{$c->rowId}}"
                                        class="form-control update-cart" />
                                    <button type="button" data-toggle="tooltip" title="Loại bỏ"
                                        class="btn btn-danger delete" data-id="{{$c->id}}" rowId="{{$c->rowId}}"
                                        id="{{$c->rowId}}"><i class="fa fa-times-circle"></i></button>
                                    <!-- <span class="input-group-btn">
                                        <button type="button" data-toggle="tooltip" title="Cập nhật"
                                            class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                        <button type="button" data-toggle="tooltip" title="Loại bỏ"
                                            class="btn btn-danger delete" data-id="{{$c->id}}" rowId="{{$c->rowId}}"
                                            id="{{$c->rowId}}"><i class="fa fa-times-circle"></i></button>
                                    </span> -->
                                </div>
                            </td>
                            <td class="text-right" id="TongTien">{{number_format($c->qty*$c->price)}} VND</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-right"><strong>Tổng cộng ::</strong></td>
                            <td class="text-right" id="TongGiaTriDonHang">{{$total}} VND</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                @php
                $number = Cart::count();
                @endphp
                @if($number>0)
                <form action="{{route('postOrder2')}}" method="post">
                    @csrf
                    <h3 class="title-gioithieu">Thông tin của bạn</h3>

                    <div class="form-horizontal bg-white space-padding-20">
                        <fieldset class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="input-hoten" style="text-align:right;">Họ
                                    tên:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" value="" id="input-hoten" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="input-emailemail"
                                    style="text-align:right;">Email:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="email" value="" id="input-emailemail"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="input-dienthoai"
                                    style="text-align:right;">Điện thoại:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="phone" value="" id="input-dienthoai"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="input-dienthoai"
                                    style="text-align:right;">Địa chỉ:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="address" value="" id="input-dienthoai"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="input-noidung" style="text-align:right;">Nội
                                    dung:</label>
                                <div class="col-sm-7">
                                    <textarea name="note" rows="5" id="input-noidung" class="form-control" required></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-left"><a href="{{route('allProduct')}}" class="btn btn-default">Tiếp
                                    tục
                                    mua
                                    hàng</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="save" class=" btn btn-primary">Gửi
                                    đơn
                                    hàng</button>
                            </div>
                        </div>
                </form>
                @else
                <div class="pull-left"><a href="{{route('allProduct')}}" class="btn btn-default">Tiếp tục
                        mua
                        hàng</a></div>
                @endif

            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('.update-cart').on('change', function() {
        var id = $(this).data('id');
        var qty = $(this).val();
        var rowId = $(this).attr('rowId');
        if (qty <= 0) {
            alert('Phải lớn 0');
            location.href = ""
        } else {
            $.get('cart/update', {
                id: id,
                qty: qty,
                rowId: rowId
            }, function(data) {
                data = JSON.parse(data);
                // console.log(data);
                $('#' + rowId).html(data.TongTien);
                $('#TongGiaTriDonHang').html(data.TongGiaTriDonHang);
                $('#TongTien').html(data.TongTien);
            });
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.delete').on('click', function() {
        var id = $(this).data('id');
        var qty = 0;
        var rowId = $(this).attr('rowId');
        $.get('cart/update', {
            id: id,
            qty: qty,
            rowId: rowId
        }, function() {
            location.reload();
        });
    });
});
</script>
@endsection