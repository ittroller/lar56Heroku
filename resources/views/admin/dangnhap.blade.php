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
        <link href="{{ url('css/toastr.min.css') }}" rel="stylesheet">
        
    </head>

    <body>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <h1 class="text-center">Đăng nhập</h1>
                    <hr>
                    @include('admin.alert.errors.errors')
                    <form action="{!! route('postDangnhap') !!}" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                        <div class="form-group">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" name="username" required class="form-control" placeholder="Nhập Email">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" name="password" required class="form-control" placeholder="Nhập Mật Khẩu">
                        </div>
                        <p class="text-center"><a href="{!! route('getDangky') !!}">Nếu chưa có account ?</a></p>
                        <p class="text-center">
                            <input type="submit" class="btn btn-info" value="Đăng nhập">
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
        <script src="{{ url('js/toastr.min.js') }}"></script>
        <script>
            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif
        </script>
    </body>

</html>
