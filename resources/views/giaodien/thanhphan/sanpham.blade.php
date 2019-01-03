@extends('giaodien.master')
@section('main')

<div class="container">
    <h2 class="text-center label-cate">Sản Phẩm: <?php foreach($tenloai as $i){echo $i->tenloai;} ?></h2>
    @if(count($sp)>0)
    <div class="row">
        @foreach($sp as $item)
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
    @else
        <i>KHÔNG CÓ SẢN PHẨM TRONG DANH MỤC NÀY</i>
    @endif
</div>



@endsection