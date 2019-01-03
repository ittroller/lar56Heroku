@extends('giaodien.master')
@section('main')
    <h2 class="text-center label-cate"><a href="{{route('sanphamgiamgia')}}" style="text-decoration:none;">Sản Phẩm Giảm Giá</a></h2>
    <div class="row">
        <?php //echo count($sp_hagia); ?>
        @foreach($sp_hagia as $item)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('upload/'.$item->anh) }}" height="150" width="250" alt="...">
                <div class="caption">
                    <h4>{!! $item->tensp !!}</h4>
                    <hr>
                    <div class="alert alert-secondary"><i>Giá gốc : <strike>{!! $item->gia !!}</strike> VNĐ</i></div>
                    <div style="margin-top:-15px;" class="alert alert-danger"><i>Giá KM : {!! $item->giamgia !!} VNĐ</i></div>
                    <p>Mô tả: {!! mb_strimwidth($item->mota, 0, 25, " ...") !!}</p>
                    <hr>
                    <p class="text-center">
                        <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}" role="button"><i class="fa fa-search fa-2x"></i></a>
                        <a style="margin-left: 30px;" href="{!! url('them-vao-gio-hang',[$item->id,$item->alias]) !!}" role="button"><i class="fa fa-cart-plus fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <h2 class="text-center label-cate1"><a href="{{route('sanphammoi')}}" style="text-decoration:none;">Sản Phẩm Mới</a></h2>
    <div class="row">
        @foreach($sp_moi as $item)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('upload/'.$item->anh) }}" height="150" width="250" alt="...">
                <div class="caption">
                    <h4>{!! $item->tensp !!}</h4>
                    <hr>
                    @if($item->gia == $item->giamgia)
                    <div class="alert alert-secondary"><i>Giá gốc : {!! $item->gia !!} VNĐ</i></div>
                    @else
                    <div class="alert alert-secondary"><i>Giá gốc : <strike>{!! $item->gia !!}</strike> VNĐ</i></div>
                    <div style="margin-top:-15px;" class="alert alert-danger"><i>Giá KM : {!! $item->giamgia !!} VNĐ</i></div>
                    @endif
                    <p>Mô tả: {!! mb_strimwidth($item->mota, 0, 25, " ...") !!}</p>
                    <hr>
                    <p class="text-center">
                        <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}" role="button"><i class="fa fa-search fa-2x"></i></a>
                        <a style="margin-left: 30px;" href="{!! url('them-vao-gio-hang',[$item->id,$item->alias]) !!}" role="button"><i class="fa fa-cart-plus fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <h2 class="text-center label-cate2"><a href="{{route('sanphambanchay')}}" style="text-decoration:none;">Sản Phẩm Bán Chạy</a></h2>
    <div class="row">
        @foreach($sp_banchay as $item)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ asset('upload/'.$item->anh) }}" height="150" width="250" alt="...">
                <div class="caption">
                    <h4>{!! $item->tensp !!}</h4>
                    <hr>
                    @if($item->gia == $item->giamgia)
                    <div class="alert alert-secondary"><i>Giá gốc : {!! $item->gia !!} VNĐ</i></div>
                    @else
                    <div class="alert alert-secondary"><i>Giá gốc : <strike>{!! $item->gia !!}</strike> VNĐ</i></div>
                    <div style="margin-top:-15px;" class="alert alert-danger"><i>Giá KM : {!! $item->giamgia !!} VNĐ</i></div>
                    @endif
                    <p>Mô tả: {!! mb_strimwidth($item->mota, 0, 25, " ...") !!}</p>
                    <hr>
                    <p class="text-center">
                        <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}" role="button"><i class="fa fa-search fa-2x"></i></a>
                        <a style="margin-left: 30px;" href="{!! url('them-vao-gio-hang',[$item->id,$item->alias]) !!}" role="button"><i class="fa fa-cart-plus fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection