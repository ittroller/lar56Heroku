@extends('admin.master')

@section('content')

<div class="row">
    <div class="col-8">
        <h1>Thêm Loại sản phẩm</h1>
        <hr>
        @include('admin.alert.errors.errors')
        <form action="{!! route('admin.loai.luu') !!}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label>Loại (nếu muốn)</label>
                <select class="form-control" name="loai">
                    <option value="0">Chọn Loại (nếu muốn)</option>
                    <?php cate_parent($id_hientai); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên Loại</label>
                <input type="text" class="form-control" name="tenloai" placeholder="Nhập tên loại">
            </div>
            <button type="submit" class="btn btn-info">Thêm</button>
        </form>
    </div>
</div>

@endsection