<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// FIX ERROR IF CUSTOM REGISTER AND LOGIN
Auth::routes();
Route::get(
    'login',
    [
        'as'=>'login',
        'uses'=>'Authentication@getDangnhap'
    ]
);
// ERROR IF CUSTOM REGISTER AND LOGIN


Route::get('/',['as'=>'trang-chu','uses'=>'GiaodienController@trangchu']);
Route::get('/trang-chu',['as'=>'trang-chu','uses'=>'GiaodienController@trangchu']);

// ĐĂNG NHẬP ĐĂNG KÍ
Route::get('dangnhap',['as'=>'getdangnhap','uses'=>'Authentication@getDangnhap']);
Route::post('dangnhap',['as'=>'postDangnhap','uses'=>'Authentication@postDangnhap']);
Route::get('dangky',['as'=>'getDangky','uses'=>'Authentication@getDangky']);
Route::post('dangky',['as'=>'postDangky','uses'=>'Authentication@postDangky']);
Route::get('logout',['as'=>'logout','uses'=>'Authentication@logout']);
// END ĐĂNG NHẬP ĐĂNG KÍ

// ADMIN
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/trangquanly', ['uses'=>'User@trangquantri','as'=>'admin.trangquanly']);
    Route::group(['prefix'=>'nguoi-dung'], function(){
        Route::get('/trangcanhan', ['uses'=>'User@trangcanhan','as'=>'admin.nguoidung.trangcanhan']);
        Route::get('/danh-sach', ['uses'=>'User@index','as'=>'admin.nguoidung.danhsach'])->middleware('admin');
        Route::get('/them', ['uses'=>'User@create','as'=>'admin.nguoidung.them']);
        Route::post('/them', ['uses'=>'User@store','as'=>'admin.nguoidung.luu']);
        Route::get('/sua/{id}', ['uses'=>'User@edit','as'=>'admin.nguoidung.sua']);
        Route::post('/sua/{id}', ['uses'=>'User@update','as'=>'admin.nguoidung.capnhat']);
        Route::get('/xoa/{id}', ['uses'=>'User@destroy','as'=>'admin.nguoidung.xoa']);

        Route::get('/xem-chi-tiet/{id}', ['uses'=>'User@look','as'=>'admin.nguoidung.xemchitiet']);
        Route::get('/danh-sach-hoa-don', ['uses'=>'User@danhsachhoadon','as'=>'admin.nguoidung.danhsachhoadon']);
        Route::get('/thanh-toan/{id}', ['uses'=>'User@thanhtoan','as'=>'admin.nguoidung.thanhtoan']);
        Route::get('/xem-hoa-don/{id}',['uses'=>'User@xemhoadon','as'=>'admin.nguoidung.xemdonhang']);
        Route::get('/xoa-hoa-don/{id}', ['uses'=>'User@xoahoadon','as'=>'admin.nguoidung.xoahoadon']);
    });

    Route::group(['prefix'=>'loai-san-pham'],function(){
        Route::get('/danh-sach',['uses'=>'LoaiController@index','as'=>'admin.loai.danhsach']);
        Route::get('/them',['uses'=>'LoaiController@create','as'=>'admin.loai.them']);
        Route::post('/them',['uses'=>'LoaiController@store','as'=>'admin.loai.luu']);
        Route::get('/sua/{id}',['uses'=>'LoaiController@edit','as'=>'admin.loai.sua']);
        Route::post('/sua/{id}',['uses'=>'LoaiController@update','as'=>'admin.loai.capnhat']);
        Route::get('/xoa/{id}',['uses'=>'LoaiController@destroy','as'=>'admin.loai.xoa']);
    });
    Route::group(['prefix'=>'san-pham'],function(){
        Route::get('/danh-sach',['uses'=>'SanphamController@index','as'=>'admin.sanpham.danhsach']);
        Route::get('/them',['uses'=>'SanphamController@create','as'=>'admin.sanpham.them']);
        Route::post('/them',['uses'=>'SanphamController@store','as'=>'admin.sanpham.luu']);
        Route::get('/xem/{id}',['uses'=>'SanphamController@show','as'=>'admin.sanpham.xem']);
        Route::get('/sua/{id}',['uses'=>'SanphamController@edit','as'=>'admin.sanpham.sua']);
        Route::post('/sua/{id}',['uses'=>'SanphamController@update','as'=>'admin.sanpham.capnhat']);
        Route::get('/xoa/{id}',['uses'=>'SanphamController@destroy','as'=>'admin.sanpham.xoa']);

        Route::get('xoaanh/{id}',['as'=>'admin.sanpham.xoaanh','uses'=>'SanphamController@xoaanh']);
    });
    
});

Route::get('chi-tiet-san-pham/{id}/{tensp}',['as'=>'chitietsanpham','uses'=>'GiaodienController@chitietsanpham']);
Route::get('them-vao-gio-hang/{id}/{tensp}',['as'=>'themvaogiohang','uses'=>'GiaodienController@themvaogiohang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'GiaodienController@giohang']);
Route::get('xoa-khoi-gio/{id}',['as'=>'xoamotsp','uses'=>'GiaodienController@xoamotsp']);
Route::post('cap-nhat-gio-hang/{id}',['as'=>'capnhatgiohang','uses'=>'GiaodienController@capnhatgiohang']);
Route::get('thanh-toan',['as'=>'thanhtoan','uses'=>'GiaodienController@thanhtoan']);
Route::post('luu-hoa-don',['as'=>'thanhtoanhoadon','uses'=>'GiaodienController@luuhoadon']);

Route::get('danh-muc/{id}/{alias}',['as'=>'danhmuc', 'uses'=>'GiaodienController@danhmucsp']);
Route::get('tim-kiem',['as'=>'timkiem','uses'=>'GiaodienController@timkiem']);

Route::get('gui-phan-hoi',['as'=>'guiphanhoi','uses'=>'GiaodienController@guiphanhoi']);
Route::post('gui-phan-hoi',['as'=>'postguiphanhoi','uses'=>'GiaodienController@postguiphanhoi']);

Route::get('san-pham-giam-gia',['as'=>'sanphamgiamgia','uses'=>'GiaodienController@sanphamgiamgia']);
Route::get('san-pham-moi',['as'=>'sanphammoi','uses'=>'GiaodienController@sanphammoi']);
Route::get('san-pham-ban-chay',['as'=>'sanphambanchay','uses'=>'GiaodienController@sanphambanchay']);

Route::get('tim-theo-gia',['as'=>'timtheogia','uses'=>'GiaodienController@timtheogia']);

Route::get('/taoadmin', ['uses'=>'GiaodienController@taoadmin','as'=>'admin.nguoidung.taoadmin']);