<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Shop">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Cao Kha Minh">
        <title>Shop</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h1>Đăng Ký</h1>
                    <hr>
                    @include('admin.alert.errors.errors')
                    <form action="{!! route('postDangky') !!}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" required class="form-control" placeholder="Nhập Họ">
                        </div>
                        <div class="form-group">
                            <label for="">Họ Tên</label>
                            <input type="text" name="hoten" required class="form-control" placeholder="Nhập Tên">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" required class="form-control" placeholder="Nhập Email">
                        </div>
                        <div class="form-group">
                            <label for="">Số ĐT</label>
                            <input type="text" name="sdt" required required class="form-control" placeholder="Nhập Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="">Địa Chỉ</label>
                            <input type="text" name="diachi" required class="form-control" placeholder="Nhập Địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="password" required class="form-control" placeholder="Nhập Mật Khẩu">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Quyền</label>
                            <select name="quyen" class="form-control">
                                <option value="1">Admin</option>
                                <option value="0">Người dùng</option>
                            </select>
                        </div> --}}
                        <input type="hidden" name="quyen" value="0" class="form-control">
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="anhdaidien" class="form-control">
                        </div>
                        <p class="text-center">
                            <input type="submit" class="btn btn-info" value="Đăng Ký">
                        </p>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('js/popper.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
    </body>

</html>
