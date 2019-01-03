@extends('giaodien.master')
@section('main')

<div class="container">
    @include('admin.alert.errors.errors')
    <form method="post" action="{!!route('thanhtoanhoadon')!!}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="row">
            <div class="col-6">
                <table class="table table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Tên SP</th>
                        <th>Số Lượng</th>
                    </tr>
                    <?php $stt = 0; $tonggia = 0; ?>
                    @foreach(Cart::content() as $item)
                    <?php $stt = $stt + 1; $tonggia += ($item->price * $item->qty); ?>
                    <tr>
                        <td>{{$stt}}</td>
                        <td>
                            <input type="text" disabled name="tensp" value="{{$item->name}}" class="form-control">
                        </td>
                        <td>
                            <input type="text" disabled name="soluong" value="{{$item->qty}}" class="form-control">
                        </td>
                    </tr>
                    @endforeach
                </table>
                <hr>
                <b>Tổng tiền: </b>
                <i>
                    <input type="text" class="form-control" style="width:350px;" disabled value="<?php echo number_format($tonggia)."  VNĐ"; ?>">
                    <input type="hidden" name="tongtien" value="{!! $tonggia !!}">
                </i>
            </div>
            <div class="col-6">
                <h1>Thông tin hóa đơn</h1>
                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" name="thanhtoan_hoten" required {!! isset($user) ? 'disabled' : '' !!} class="form-control" value="{!! isset($user) ? $user->hoten : null !!}">
                    <input type="hidden" name="hoten" value="{!! isset($user) ? $user->hoten : null !!}">
                    <span id="err_hoten"></span>
                </div>
                <div class="form-group">
                    <label for="">Địa Chỉ</label>
                    <input type="text" name="thanhtoan_diachi" required {!! isset($user) ? 'disabled' : null !!} class="form-control" value="{!! isset($user) ? $user->diachi : null !!}">
                    <input type="hidden" name="diachi" value="{!! isset($user) ? $user->hoten : null !!}">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="thanhtoan_email" required {!! isset($user) ? 'disabled' : null !!} class="form-control" value="{!! isset($user) ? $user->email : null !!}">
                    <input type="hidden" name="email" value="{!! isset($user) ? $user->hoten : null !!}">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="thanhtoan_sdt" required {!! isset($user) ? 'disabled' : null !!} class="form-control" value="{!! isset($user) ? $user->sdt : null !!}">
                    <input type="hidden" name="sdt" value="{!! isset($user) ? $user->hoten : null !!}">
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" id="submit" class="form-control btn btn-info">Gửi</button>
    </form>
</div>

@endsection