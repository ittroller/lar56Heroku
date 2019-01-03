@if(Session::has('flash_message')) <!--nếu tồn tại biến,tức là thêm thành công thì thông báo ra-->
<!--<div class="alert alert-success">-->
<div class="alert alert-{!! Session::get('flash_level') !!}">
    {!! Session::get('flash_message') !!}
</div>
@endif