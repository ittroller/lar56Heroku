@extends('admin.master')

@section('content')

<style>
    .pagination{position: absolute;top:700px;}
</style>

<div class="row">
    <div class="col-10">
        @if(count($sp)>0)
        <table class="table table-hover">
            <thead>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá gốc</th>
                <th>Giá chót</th>
                <th>Ảnh</th>
                <th>Xem</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </thead>
            
            <?php $stt = 0; ?>
            <tbody>
                @foreach($sp as $item)
                    <?php $stt = $stt + 1; ?>
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $item['tensp'] }}</td>
                        <td>{{ $item['soluong'] }}</td>
                        <td>{{ $item['gia'] }}</td>
                        <td>{{ $item['giamgia'] }}</td>
                        <td>
                            <img height="100" width="100" src="{{asset('upload/'.$item['anh'])}}" alt="">
                        </td>
                        <td><a href="{!! route('admin.sanpham.xem',$item['id']) !!}"><i class="fas fa-search"></i></a></td>
                        <td><a href="{!! route('admin.sanpham.sua',$item['id']) !!}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{!! route('admin.sanpham.xoa',$item['id']) !!}"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            {{ $sp->links() }}
            <br>
            <br>
            <br>
            
        </table>
        @else
            <br>
            <h1>
                Không có sản phẩm
            </h1>
        @endif
    </div>
</div>

@endsection