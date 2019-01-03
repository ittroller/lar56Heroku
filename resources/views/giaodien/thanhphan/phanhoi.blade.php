@extends('giaodien.master')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1 class="text-center">Gửi Phản Hồi</h1>
            <form action="{{route('postguiphanhoi')}}" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                <div class="form-group">
                    <label for="">Họ Tên</label>
                    <input type="text" required class="form-control" name="hoten">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" required class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="">Nội dung phản hồi</label>
                    <textarea required class="form-control" name="noidung" cols="30" rows="10"></textarea>
                </div>
                <p class="text-center"><button type="submit" style="padding: 5px 100px;" class="btn btn-info">Gửi</button></p>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

@endsection