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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link href="{{ url('css/all.css') }}" rel="stylesheet">

        <link href="{{ url('css/mycss.css') }}" rel="stylesheet">

    </head>

    <body>
        @include('admin.thanhphan.header')
        <div id="wrapper">
            <div class="row">
                <div class="col-3">
                    <h2 class="text-center">Menu</h2>
                    <div id="list-example" class="list-group">
                        @if(Auth::user()->quyen == 1)
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.trangcanhan') !!}">Thông Tin Cá Nhân</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.danhsach') !!}">Danh Sách Người Dùng</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.them') !!}">Thêm người dùng</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.loai.danhsach') !!}">Loại Sản Phẩm</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.loai.them') !!}">Thêm Loại Sản Phẩm</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.sanpham.danhsach') !!}">Danh Sách Sản Phẩm</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.sanpham.them') !!}">Thêm Sản Phẩm</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.danhsachhoadon') !!}">Danh Sách Hóa Đơn</a>
                        <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.xemdonhang',['id'=>Auth::user()->id]) !!}">Xem Hóa Đơn Cá Nhân</a>
                        @else
                            <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.trangcanhan') !!}">Thông Tin Cá Nhân</a>
                            <a class="list-group-item list-group-item-action" href="{!! route('admin.nguoidung.xemdonhang',['id'=>Auth::user()->id]) !!}">Xem Hóa Đơn Cá Nhân</a>
                        @endif
                    </div>
                </div>
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('js/popper.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>

        <script src="{{ url('js/myScript.js') }}"></script>
        
        <script src="{{ url('js/toastr.min.js') }}"></script>
        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif
        </script>

        <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        </script>
    </body>

</html>
