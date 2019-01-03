@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-8">
        <h1>Thêm Người Dùng</h1>
        <hr>
        @include('admin.alert.errors.errors')
        <form action="{!! route('admin.nguoidung.luu') !!}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Nhập Họ">
            </div>
            <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" name="hoten" class="form-control" placeholder="Nhập Tên">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Nhập Email">
            </div>
            <div class="form-group">
                <label for="">Số ĐT</label>
                <input type="text" name="sdt" class="form-control" placeholder="Nhập Số điện thoại">
            </div>
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" name="diachi" class="form-control" placeholder="Nhập Địa chỉ">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu">
            </div>
            <div class="form-group">
                <label for="">Quyền</label>
                <select name="quyen" class="form-control">
                    <option value="1">Admin</option>
                    <option value="0">Người dùng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="anhdaidien" class="form-control">
            </div>
            <p class="text-center">
                <input type="submit" class="btn btn-info" value="Thêm">
            </p>
        </form>
    </div>
</div>
@endsection