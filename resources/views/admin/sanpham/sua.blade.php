@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-8">
        <h1>Thêm sản phẩm</h1>
        <hr>
        @include('admin.alert.errors.errors')
        <form action="" method="post" enctype="multipart/form-data" name="frmEditProduct">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label>Chọn Loại</label>
                <select class="form-control" name="loai">
                    <option value="">Chọn Loại (bắt buộc)</option>
                    <?php
                        cate_parent($loai, 0, "", $sp["loaisp_id"]);
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" name="tensp" value="{!! old('tensp',isset($sp) ? $sp['tensp'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" class="form-control" name="soluong" value="{!! old('soluong',isset($sp) ? $sp['soluong'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" name="gia" value="{!! old('gia',isset($sp) ? $sp['gia'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Phần trăm giảm giá (sẽ tính toán thành giá chót)</label>
                <input type="text" class="form-control" name="giamgia" value="0">
            </div>
            <div class="form-group">
                <label for="">Mới hay cũ (bán chạy hay không)</label>
                <select name="moihaycu" class="form-control">
                        @if($sp['moihaycu']==1)
                            <option value="1" selected>Mới (bán chạy)</option>
                            <option value="0">Cũ</option>
                        @else
                            <option value="1">Mới (bán chạy)</option>
                            <option value="0" selected>Cũ</option>
                        @endif
                    </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="mota">
                    {!! old('mota',isset($sp) ? $sp['mota'] : null) !!}
                </textarea>
            </div>
            <div class="form-group">
                <h3 class="text-center">Ảnh chính</h3>
                <input type="text" name="anhcu" class="form-control" hidden value="{!! old('anhcu',isset($sp) ? $sp['anh'] : null) !!}">
                <img height="200" width="200" src="{!! asset('upload/'.$sp['anh']) !!}" alt="Sai URL hoặc ko có ảnh">
                <br><br>
                <input type="file" name="anhchinh" class="form-control">
            </div>
            <hr>
            <p class="text-center"><label for="">Ảnh Chi Tiết</label></p>
            @foreach($anhchitiet as $key => $item)
                <div class="form-group" id="{!! $key !!}">
                    <img height="150" width="150" src="{!! asset('upload/anhchitiet/'.$item['anhchitiet']) !!}" alt="không có hình" class="image_detail" idHinh="{!! $item['id'] !!}" id="{!! $key !!}" />
                    <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                </div>
            @endforeach
            <hr>
            <button type="button" class="btn btn-primary" id="addImages">Thêm Ảnh Khác</button>
            <br><br>
            <div id="insert"></div>
            <hr>
            <p class="text-center"><button type="submit" class="btn btn-info">Sửa</button></p>
        </form>
    </div>
</div>

@endsection