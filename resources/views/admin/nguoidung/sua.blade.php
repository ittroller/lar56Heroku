@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-8">
        <h1>Sửa Người Dùng</h1>
        <hr>
        @include('admin.alert.errors.errors')
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" value="{!! old('username',isset($user) ? $user['username'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" name="hoten" class="form-control" value="{!! old('hoten',isset($user) ? $user['hoten'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{!! old('email',isset($user) ? $user['email'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Số ĐT</label>
                <input type="text" name="sdt" class="form-control" value="{!! old('sdt',isset($user) ? $user['sdt'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" name="diachi" class="form-control" value="{!! old('diachi',isset($user) ? $user['diachi'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" name="password" class="form-control" placeholder="Nhập mật khẩu mới hoặc giữ nguyên mật khẩu cũ">
                <input type="text" hidden name="passwordcu" class="form-control" value="{!! old('password',isset($user) ? $user['password'] : null) !!}">
            </div>
            <div class="form-group">
                <label for="">Quyền</label>
                <select name="quyen" class="form-control">
                    @if($user['quyen']==1)
                        <option value="1" selected>Admin</option>
                        <option value="0">Người dùng</option>
                    @else
                        <option value="1">Admin</option>
                        <option value="0" selected>Người dùng</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="anhdaidien" class="form-control">
                <hr>
                <label for="">Ảnh đại diện cũ</label>
                <input type="text" name="anhdaidiencu" class="form-control" hidden value="{!! old('anhdaidien',isset($user) ? $user['anhdaidien'] : null) !!}">
                <img height="200" width="200" src="{!! asset('upload/'.$user['anhdaidien']) !!}" alt="Sai URL hoặc ko có ảnh">
            </div>
            <p class="text-center">
                <input type="submit" class="btn btn-info" value="Lưu">
            </p>
        </form>
    </div>
</div>
@endsection