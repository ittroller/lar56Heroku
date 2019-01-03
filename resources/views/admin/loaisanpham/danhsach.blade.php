@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-10">
        <table class="table table-hover">
            <thead>
                <th>STT</th>
                <th>Tên Loại</th>
                <th>ID Thành Phần</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </thead>
            @if($loai->count()>0)
            <?php $stt = 0; ?>
            <tbody>
                @foreach($loai as $item)
                    <?php $stt = $stt + 1; ?>
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $item->tenloai }}</td>
                        <td>{{ $item->id_hientai }}</td>
                        <td><a href="{!! route('admin.loai.sua', $item->id) !!}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{!! route('admin.loai.xoa', $item->id) !!}"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            {{ $loai->links() }}
            @else
                Không có người dùng
            @endif
        </table>
    </div>
</div>

@endsection