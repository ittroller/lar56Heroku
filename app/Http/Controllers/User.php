<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User as UserRequest;

use App\User as UserModel;

use App\Hoadon;
use App\Hoadonchitiet;

use Auth, DB;
use Hash;
use Session;

class User extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function trangquantri(){
        return view('admin.quantri');
    }

    public function trangcanhan(){
        return view('admin.nguoidung.trangcanhan')->with('user',Auth::user());
    }
    
    public function index(){
        return view('admin.nguoidung.index')->with('users',UserModel::all());
    }
    public function create(){
        return view('admin.nguoidung.them');
    }
    public function store(UserRequest $request){
        $user = new UserModel;
        $user->username = $request->username;
        $user->hoten = $request->hoten;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        $user->password = Hash::make($request->password);
        // $user->password = $request->password;
        $user->diachi = $request->diachi;
        $user->quyen = $request->quyen;

        if ($request->hasFile('anhdaidien')) {
            $file_name = $request->file('anhdaidien')->getClientOriginalName();// hàm lấy tên tấm hình
            $user->anhdaidien = $file_name;
            $request->file('anhdaidien')->move('upload/',$file_name);
        }

        $user->save();

        Session::flash('success','Thêm Thành công');

        return redirect()->back();
    }
    public function show($id){}
    public function edit($id){
        if(Auth::user()->id == $id || Auth::user()->quyen==1){
            $user = UserModel::findOrFail($id)->toArray();
            return view('admin.nguoidung.sua',compact('user','id'));
        }else{
            Session::flash('error','Bạn Không Có Quyền Truy Cập URL này !!');
            return redirect()->route('admin.nguoidung.xemchitiet',Auth::user()->id);
        }
    }
    public function update(Request $request, $id){
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->hoten = $request->hoten;
        $user->email = $request->email;
        $user->sdt = $request->sdt;

        if($request->email == ''){
            $user->password = $request->passwordcu;
        }else{
            $user->password = Hash::make($request->password);
        }

        $user->diachi = $request->diachi;
        $user->quyen = $request->quyen;

        if ($request->hasFile('anhdaidien') == '') {
            $file_name = $request->anhdaidiencu;
            $user->anhdaidien = $file_name;
        }elseif($request->hasFile('anhdaidien') != '' && $request->hasFile('anhdaidiencu') == ''){
            $file_name = $request->file('anhdaidien')->getClientOriginalName();
            $user->anhdaidien = $file_name;
            // unlink('upload/'.$request->anhdaidiencu);
            $request->file('anhdaidien')->move('upload/',$file_name);
        }

        $user->save();

        Session::flash('success','Sửa Thành công');

        return redirect()->back();
    }
    public function destroy($id){
        $idnguoidunghientai = Auth::user()->id;
        $user = UserModel::find($id);

        if(($idnguoidunghientai == $user->id) && $user->quyen != 1){
            Session::flash('error','Không thể xóa');
            return redirect()->back();
        }else{
            $user->delete($id);
            unlink('upload/'.$user->anhdaidien);
            Session::flash('success','Xóa thành công');
            return redirect()->route('admin.nguoidung.danhsach');
        }
    }
    public function look($id){
        $user = UserModel::findOrFail($id)->toArray();
        return view('admin.nguoidung.xemchitiet',compact('user'));
    }
    public function danhsachhoadon(){
        $hd = Hoadon::orderBy('id', 'desc')->get();
        return view('admin.nguoidung.danhsachhoadon',compact('hd'));
    }
    public function thanhtoan($id){
        $hd = Hoadon::find($id);
        $hd->tinhtrang = 1;
        $hd->save();
        Session::flash('success','Thanh toán thành công');
        return redirect()->back();
    }
    public function xoahoadon($id){
        $hd = Hoadon::find($id);
        $chitiethd = DB::table('hoadonchitiets')->where('hoadon_id',$id)->delete();
        $hd->delete();
        Session::flash('success','Xóa hóa đơn thành công');
        return redirect()->back();
    }
    public function xemhoadon($id){
        $xem = DB::table('hoadons')->where('user_id',$id)->orderBy('id', 'desc')->get();
        return view('admin.nguoidung.hoadoncanhan',compact('xem'));
    }
}
