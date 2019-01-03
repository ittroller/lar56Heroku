<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as RequestGiaoDien;
use App\Http\Requests\HoadonRequest;

use DB,Mail,Request,Cart, Session, Auth;
use App\Hoadon;
use App\Hoadonchitiet;
use App\Loaisanpham;
use App\Sanpham;
use App\User as UserModel;
use Hash;

class GiaodienController extends Controller
{
    public function trangchu(){
        // sp mới
        $sp_moi = DB::table('sanphams')->select('*')->orderBy('id','DESC')->skip(0)->take(6)->get();
        
        // sp bán chạy == 1 bán chạy
        $sp_banchay = DB::table('sanphams')->select('*')->where('moihaycu','=',1)->orderBy('id','DESC')->skip(0)->take(6)->get();
        
        // sp hạ giá
        $sp_hagia = DB::select('SELECT * FROM sanphams WHERE giamgia != gia ORDER BY id DESC');
        
        return view('giaodien.trangchu', compact('sp_hagia','sp_moi','sp_banchay'));
    }

    public function chitietsanpham($id){
        $sp_chitiet = DB::table('sanphams')->where('id',$id)->first();
        $anhchitiet = DB::table('anhsanphamchitiets')->select('id','anhchitiet')->where('sanpham_id',$sp_chitiet->id)->get(); // image detail
        return view('giaodien.thanhphan.trangchitiet',compact('sp_chitiet','anhchitiet'));
    }
    public function themvaogiohang($id, RequestGiaoDien $request){
        $sp_themgiohang = DB::table('sanphams')->where('id',$id)->first();
        Cart::add(
            array(
                'id'=>$id,
                'name'=>$sp_themgiohang->tensp,
                'qty'=>1,
                'price'=>$sp_themgiohang->giamgia,
                'options'=>array('anh'=>$sp_themgiohang->anh)
                )
        );
        $content = Cart::content();

        Session::flash('success','Thêm vào giỏ hàng thành công');

        return redirect()->back();
    }
    public function giohang(){
        $content = Cart::content();
        // $subtotal = (float)Cart::subtotal();
        // $total = floatval($subtotal);
		return view('giaodien.thanhphan.giohang',compact('content'));
    }
    public function xoamotsp($id){
        Cart::remove($id);
		return redirect()->route('giohang');
    }
    public function capnhatgiohang($id, RequestGiaoDien $request){
        $sp = DB::table('sanphams')->where('id',$id)->first();

        if($request->soluong <= 0){
            Session::flash('error','Nhập sai số lượng');
            return redirect()->back();
        }
        if($sp->soluong < $request->soluong){
            Session::flash('error','SP K ĐỦ, kho còn'.$sp->soluong.' Sp');
            return redirect()->back();
        }else{
            Cart::update($request->rowId,['qty'=>$request->soluong]);
            Session::flash('success','cập nhật  giỏ thành công');
        }
    }
    public function thanhtoan(){
        if(Auth::check()){
            return view('giaodien.thanhphan.thanhtoan')->with('user',Auth::user());
        }
        else{
            return view('giaodien.thanhphan.thanhtoan');
        }
    }
    public function luuhoadon(RequestGiaoDien $request){
        $id_user = '';
        $hoten = '';
        $diachi = '';
        $sdt = '';
        $email = '';
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $hoten = $request->hoten;
            $diachi = $request->diachi;
            $sdt = $request->sdt;
            $email = $request->email;
        }else{
            $id_user = null;
            $hoten = $request->thanhtoan_hoten;
            $diachi = $request->thanhtoan_diachi;
            $sdt = $request->thanhtoan_sdt;
            $email = $request->thanhtoan_email;
        }
        $hoadon = new Hoadon;
        $hoadon->hoten = $hoten;
        $hoadon->diachi = $diachi;
        $hoadon->email = $email;
        $hoadon->sdt = $sdt;
        $hoadon->tongtien = $request->tongtien;
        $hoadon->user_id = $id_user;

        // var_dump($hoadon);
        // die();

        $hoadon->save();

        $hoadonid = $hoadon->id;

        foreach(Cart::content() as $item){
            $hoadonchitiet = new Hoadonchitiet;
            $hoadonchitiet->tensp = $item->name;
            $hoadonchitiet->soluong = $item->qty;
            $hoadonchitiet->hoadon_id = $hoadonid;
            $hoadonchitiet->save();
        }
        Cart::destroy();
        Session::flash('success','Lưu Hóa Đơn Thành công');

        return redirect()->route('trang-chu');
    }

    public function danhmucsp($id){
        $sp = DB::table('sanphams')->where('loaisp_id',$id)->get();
        $tenloai = DB::table('loaisanphams')->where('id',$id)->get();
        return view('giaodien.thanhphan.sanpham',compact('sp','tenloai'));
    }
    public function timkiem(RequestGiaoDien $request){
        $key = $request->key;
        $tk = DB::table('sanphams')->select('*')->where('alias','like','%'.$key.'%')->get();
        Session::flash('success','Chức năng này chưa hoàn thiện do CSDL ở host(free) chưa conf được !');
        return view('giaodien.thanhphan.timkiem',compact('tk','key'));
    }

    public function guiphanhoi(){
        return view('giaodien.thanhphan.phanhoi');
    }
    public function postguiphanhoi(RequestGiaoDien $request){
        $data = [
            'hoten'=>$request->hoten,
            'email'=>$request->email,
            'noidung'=>$request->noidung
        ];
        Mail::send('emails.blanks',$data, function($msg){
            // $msg->from('Shop Hoa Cỏ May','Khách');
            $msg->to('dffcommunity@gmail.com','MINH IT')->subject('Phản Hồi Từ Shop Hoa Cỏ May');
        });
        Session::flash('success','Gửi Phản Hồi Thành Công !!!');
        return redirect()->route('trang-chu');
    }
    public function sanphamgiamgia(){
        $sp_hagia = DB::select('SELECT * FROM sanphams WHERE giamgia != gia ORDER BY id DESC');
        return view('giaodien.thanhphan.spgiamgia', compact('sp_hagia'));
    }
    public function sanphammoi(){
        $sp_moi = DB::table('sanphams')->select('*')->orderBy('id','DESC')->get();
        return view('giaodien.thanhphan.spmoi', compact('sp_moi'));
    }
    public function sanphambanchay(){
        $sp_banchay = DB::table('sanphams')->select('*')->where('moihaycu','=',1)->orderBy('id','DESC')->get();
        return view('giaodien.thanhphan.spbanchay', compact('sp_banchay'));
    }

    public function timtheogia(RequestGiaoDien $request){
        $gia1 = $request->gia1;
        $gia2 = $request->gia2;
        $sp = DB::select('select * from sanphams where giamgia >= :gia1 and giamgia <= :gia2',['gia1' => $gia1,'gia2'=>$gia2]);
        return view('giaodien.thanhphan.timtheogia', compact('sp','gia1','gia2'));
    }
    public function taoadmin(){
        $user = new UserModel;
        $user->username = 'superadmin';
        $user->hoten = 'superadmin';
        $user->email = 'superadmin@gmail.com';
        $user->sdt = '01655853003';
        $user->password = Hash::make('123456');
        // $user->password = $request->password;
        $user->diachi = 'superadmin'; 
        $user->quyen = 1;

        $user->anhdaidien = null;

        $user->save();

        Session::flash('success','Thêm Thành công');

        return redirect()->back();
    }
}
