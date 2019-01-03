<div id="top">
    <div class="container">
        <div class="row">
            <div class="col-2" id="logo">
                <a href="{{ url('/') }}" id="design_logo">SHOP CỎ MAY</a>
            </div>
            <div class="col-8" id="search">
                <form action="{{ route('timkiem') }}" method="get" id="form-tim-kiem" class="form-inline">
                    <input type="text" class="form-control" id="input-timkiem" placeholder="Vui lòng nhập tên sản phẩm không dấu" name="key">
                    <button type="submit" class="btn btn-warning" id="btn-timkiem">Tìm kiếm</button>
                </form>
            </div>
            <div class="col-1" id="giohang">
                <a style="text-decoration:none;" href="{!! route('giohang') !!}" id="icon-giohang">
                    <i class="fas fa-cart-arrow-down fa-2x"></i>@if(Cart::count()>0)
                    {{Cart::count()}}
                    @endif
                </a>
            </div>
            <div class="col-1" id="nguoidung">
                @if(Auth::check())
                    <a href="{!!route('admin.trangquanly')!!}" id="icon-nguoidung"><i class="fas fa-user-shield fa-2x"></i></a>
                @else
                <a href="{!!route('getdangnhap')!!}" id="icon-nguoidung"><i class="fas fa-user-shield fa-2x"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>