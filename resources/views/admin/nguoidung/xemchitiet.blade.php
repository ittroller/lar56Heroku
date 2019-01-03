@extends('admin.master')
@section('content')


{{-- {!!$user->email!!} --}}
<br>
<h1>Thông tin cá nhân</h1>
<br>

<table class="table table-hover" id="table-trangcanhan">
    <tr>
        <th>Username</th>
        <td>{!! $user['username'] !!}</td>
    </tr>
    <tr>
        <th>Họ Tên</th>
        <td>{!! $user['hoten'] !!}</td>
    </tr>
    <tr>
        <th>Số điện thoại</th>
        <td>{!! $user['sdt'] !!}</td>
    </tr>
    <tr>
        <th>Ảnh đại diện</th>
        <td><img height="300" width="300" src="{{ asset('upload/'.$user['anhdaidien']) }}" alt=""></td>
    </tr>
</table>
@endsection