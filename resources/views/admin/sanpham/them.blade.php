@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-8">
        <h1>Thêm sản phẩm</h1>
        <hr>
        @include('admin.alert.errors.errors')
        <form action="{!! route('admin.sanpham.luu') !!}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label>Chọn Loại</label>
                <select class="form-control" name="loai">
                    <option value="">Chọn Loại (bắt buộc)</option>
                    <?php
                    cate_parent($loai, 0, "", old('loai'));
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="tensp" placeholder="Nhập tên sp">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" class="form-control" name="soluong" placeholder="Nhập số lượng">
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" name="gia" placeholder="Nhập giá">
            </div>
            <div class="form-group">
                <label for="">Phần trăm giảm giá (sẽ tính toán thành giá chót)</label>
                <input type="text" class="form-control" name="giamgia" placeholder="Nhập số phần trăm giảm giá">
            </div>
            <div class="form-group">
                <label for="">Mới hay cũ</label>
                <select name="moihaycu" class="form-control">
                    <option value="0">Cũ</option>
                    <option value="1">Mới</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="mota"></textarea>
            </div>
            <div class="form-group">
                <label for="">Ảnh chính</label>
                <input type="file" class="form-control" name="anhchinh">
            </div>
            <hr>
            <p class="text-center"><label for="">Ảnh Chi Tiết</label></p>
            @for($i = 1;$i <=5;$i++)
                <div class="form-group">
                    <label>Ảnh {!! $i !!}</label>
                    <input type="file" class="form-control" name="dsanhchitiet[]" />
                </div>
            @endfor
            <hr>
            <p class="text-center"><button type="submit" class="btn btn-info">Thêm</button></p>
        </form>
    </div>
</div>

@endsection