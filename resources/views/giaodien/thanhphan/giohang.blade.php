@extends('giaodien.master')
@section('main')

<?php $tonggia = 0; ?>
<div class="container-fluid">
    @if(Cart::count()>0)
    <table class="table table-hover">
        <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Xóa sản phẩm</th>
        </tr>
        <?php $stt = 0; ?>
        @foreach($content as $item)
        <?php
            $stt = $stt + 1;
            $tonggia += ($item->price * $item->qty);
        ?>
        <tr>
            <td>{{ $stt }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }} VNĐ</td>
            <td>
                <form action="{!! route('capnhatgiohang',$item->id) !!}" method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <input type="hidden" name="rowId" value="{!! $item->rowId !!}"/>
                    <input type="number" name="soluong" class="form-control qty" style="width:100px;" value="{{$item->qty}}" >
                </form>
            </td>
            <td>
                <a style="margin-left:50px;" class="text-center" href="{!! url('xoa-khoi-gio',['id'=>$item->rowId]) !!}"><i class="far fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <hr>
    <br>
    <b>Tổng tiền: </b><i><?php echo number_format($tonggia); ?> VNĐ</i>
    <hr>
    <p class="text-center">
        <a class="btn btn-danger" href="">Xóa Toàn Bộ Giỏ Hàng</a>
        <a style="margin-left:10px;" class="btn btn-success" href="{!!route('thanhtoan')!!}">Thanh Toán</a>
    </p>
    @else
        <h1>Giỏ hàng rỗng</h1>
    @endif
</div>



@endsection