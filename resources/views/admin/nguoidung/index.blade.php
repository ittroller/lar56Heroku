@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-11">
        <table class="table table-hover">
            <thead>
                <th>Tên Đăng Nhập</th>
                <th>Họ tên</th>
                <th>Địa Chỉ</th>
                <th>Số ĐT</th>
                <th>Quyền</th>
                <th>Xem</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </thead>
            @if($users->count()>0)
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->hoten }}</td>
                        <td>{{ $user->diachi }}</td>
                        <td>{{ $user->sdt }}</td>
                        <td>
                            @if($user->quyen == 1)
                                Quản trị viên
                            @else
                                Người dùng
                            @endif
                        </td>
                        <td><a href="{!! route('admin.nguoidung.xemchitiet',$user->id) !!}"><i class="fas fa-search"></i></a></td>
                        <td><a href="{!! route('admin.nguoidung.sua',$user->id) !!}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{!! route('admin.nguoidung.xoa',$user->id) !!}"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            @else
                Không có người dùng
            @endif
        </table>
    </div>
</div>

@endsection