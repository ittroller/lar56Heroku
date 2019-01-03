@extends('admin.master')
@section('content')

<div class="container">
    <h1 class="text-center">Danh Sách Hóa Đơn</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <tr>
                    <th>STT</th>
                    <th>Họ Tên</th>
                    <th>Địa Chỉ</th>
                    <th>SDT</th>
                    <th>Email</th>
                    <th>Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Xóa</th>
                </tr>
                <?php $stt = 0; ?>
                @foreach($hd as $item)
                <?php $stt = $stt + 1; ?>
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$item['hoten']}}</td>
                    <td>{{$item['diachi']}}</td>
                    <td>{{$item['sdt']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>
                        <?php $chitiet = DB::table('hoadonchitiets')->select('tensp','soluong')->where('hoadon_id',$item['id'])->get(); ?>
                        @foreach($chitiet as $i)
                            {!! $i->tensp; !!}({!!$i->soluong!!})<br>
                        @endforeach
                    </td>
                    <td>{{$item['tongtien']}} VNĐ</td>
                    <td>
                        @if($item['tinhtrang']==0)
                            <a href="{{route('admin.nguoidung.thanhtoan',['id'=>$item['id']])}}" style="text-decoration:none; border:1px solid red; padding:5px;">Chưa Thanh Toán</a>
                        @else
                            <div class="alert alert-success">Đã Thanh Toán</div>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.nguoidung.xoahoadon',['id'=>$item['id']])}}"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection