@extends('admin.master')
@section('content')

<br>
<h1>Thông tin chi tiết sản phẩm</h1>
<br>

<table class="table table-hover" id="table-trangcanhan">
    <tr>
        <th>Tên Sản Phẩm</th>
        <td>{!! $sp['tensp'] !!}</td>
    </tr>
    <tr>
        <th>Số Lượng</th>
        <td>{!! $sp['soluong'] !!} Cái</td>
    </tr>
    <tr>
        <th>Giá</th>
        <td>{!! $sp['gia'] !!}</td>
    </tr>
    <tr>
        <th>Giá chót</th>
        <td>{!! $sp['giamgia'] !!} %</td>
    </tr>
    <tr>
        <th>Hàng Mới hay cũ</th>
        @if($sp['moihaycu']==0)
        <td>
            <?php echo "Cũ"; ?>
        </td>
        @else
        <td>
            <?php echo "Mới"; ?>
        </td>
        @endif
    </tr>
    <tr>
        <th>Mô tả sản phẩm</th>
        <td>{!! $sp['mota'] !!}</td>
    </tr>
    <tr>
        <th>Thuộc loại</th>
        <?php
            $loai = DB::table('loaisanphams')->where('id', $sp['loaisp_id'])->get();
            $tenloai = "";
            foreach($loai as $x){
                $tenloai = $x->tenloai;
            }
        ?>
        <td>{!! $tenloai !!}</td>
    </tr>
    <tr>
        <th>Ảnh sản phẩm (ảnh chính)</th>
        <td><img height="200" width="200" src="{{ asset('upload/'.$sp['anh']) }}" alt=""></td>
    </tr>
</table>
<hr>
<label for=""><b>Ảnh sản phẩm chi tiết</b></label>
<?php
    $listanh = DB::table('anhsanphamchitiets')->where('sanpham_id', $sp['id'])->get()->toArray();

    foreach($listanh as $a){
?>
    <img height="150" width="150" src="{{ asset('upload/anhchitiet/'.$a->anhchitiet) }}" alt="">
<?php
    }
?>
<hr>
<a class="btn btn-primary" href="{!! route('admin.sanpham.danhsach') !!}">Trở về trang danh sách</a>
<br><br>
@endsection