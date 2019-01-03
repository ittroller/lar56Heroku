@extends('admin.master')
@section('content')


{{-- {!!$user->email!!} --}}
<br>
<h1>Thông tin cá nhân</h1>
<br>

<table class="table table-hover" id="table-trangcanhan">
    <tr>
        <th>Username</th>
        <td>{!! $user->username !!}</td>
    </tr>
    <tr>
        <th>Họ Tên</th>
        <td>{!! $user->hoten !!}</td>
    </tr>
    <tr>
        <th>Số điện thoại</th>
        <td>{!! $user->sdt !!}</td>
    </tr>
</table>
<hr>
<a class="btn btn-warning" href="{!! route('admin.nguoidung.sua',$user->id) !!}">Sửa thông tin</a>
@endsection