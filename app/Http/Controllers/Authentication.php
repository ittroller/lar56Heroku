<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// request
use App\Http\Requests\User;
use App\Http\Requests\LoginRequest;

// use model
use App\User as UserModel;

use Session;
use Hash;
use Auth;

class Authentication extends Controller
{
    public function getDangnhap(){
		return view('admin.dangnhap');
    }
    public function postDangnhap(LoginRequest $request){
      $username = $request->username;
      $password = $request->password;

      if(Auth::attempt(['username'=>$username, 'password'=>$password])){
        return redirect()->route('admin.trangquanly');
      }else{
        Session::flash('error',"Sai");
        return redirect()->back();
      }
    }
    public function getDangky(){
		  return view('admin.dangky');
    }
    public function postDangky(User $request){
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
      Auth::login($user);

      Session::flash('success','Tạo Thành công');

      return redirect()->route('admin.trangquanly');
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
