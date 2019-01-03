@extends('giaodien.master')
@section('main')



<div class="container">
    <h2 class="title_chitiet">CHI TIẾT SẢN PHẨM</h2>
    <hr>
    <div class="row">
        <div class="col-5">
            <h3>Ảnh Sản Phẩm</h3>
            <a target="_blank" href="{{ asset('upload/'.$sp_chitiet->anh) }}">
                <img class="chitiet_anhchinh" src="{{ asset('upload/'.$sp_chitiet->anh) }}" height="350" width="350" alt="...">
            </a>
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <h3>Ảnh Chi Tiết Sản Phẩm</h3>
            @if($anhchitiet->count()>0)
                @foreach($anhchitiet as $anh)
                    <a target="_blank" href="{{ asset('upload/anhchitiet/'.$anh->anhchitiet) }}"><img class="chitiet_anhchitiet" src="{{ asset('upload/anhchitiet/'.$anh->anhchitiet) }}" height="100" width="100" alt="..."></a>
                @endforeach
            @else
                <h2>Không có ảnh chi tiết cho sản phẩm này</h2>
            @endif
        </div>
        <hr>
        <div class="col-12">
            <h4>
                <i>Tên Sản Phẩm: </i> {{$sp_chitiet->tensp}}
            </h4>
            <h4>
                <i>Giá gốc: </i> {{$sp_chitiet->gia}}
            </h4>
            <h4>
                <i>Giá chót: </i> {{$sp_chitiet->giamgia}}
            </h4>
            <h4>
                <i>Mô tả: </i> {{$sp_chitiet->mota}}
            </h4>
        </div>
        <br><br>
        <a href="{!! url('them-vao-gio-hang',[$sp_chitiet->id,$sp_chitiet->alias]) !!}" class="btn btn-info btn-themgiohang" role="button">Thêm Vào Giỏ Hàng <i class="fa fa-cart-plus"></i></a>
    </div>
    <hr>
    <div class="comment">
        <label for=""><i>Viết Bình Luận Cho Sản Phẩm</i></label>
        @include('giaodien.thanhphan.binhluan')
    </div>
</div>


@endsection