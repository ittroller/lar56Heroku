<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;

use App\Http\Requests\SanphamRequest;

use App\Loaisanpham;
use App\Sanpham;
use App\Anhsanphamchitiet;

use Auth;
use Session;
use File;
use Illuminate\Support\Facades\Input;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp = Sanpham::select('*')->orderBy('id','DESC')->paginate(5);
        return view('admin.sanpham.danhsach',compact('sp'));
        // return view('admin.sanpham.danhsach');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loai = Loaisanpham::select('id','tenloai','id_hientai')->get()->toArray();
		return view('admin.sanpham.them',compact('loai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SanphamRequest $request){
        $sp = new Sanpham;
        $sp->tensp = $request->tensp;
        $sp->alias = changeTitle($request->tensp);
        $sp->soluong = $request->soluong;
        $sp->gia = $request->gia;
        $sp->giamgia = ($request->gia-(($request->gia*$request->giamgia)/100));
        $sp->moihaycu = $request->moihaycu;
        $sp->mota = $request->mota;
        $sp->mota = $request->mota;
        $sp->loaisp_id = $request->loai;
        $sp->user_id   = Auth::user()->id;

        $tenanhchinh = $request->file('anhchinh')->getClientOriginalName();
        $request->file('anhchinh')->move('upload/',$tenanhchinh);
        $sp->anh = $tenanhchinh;
        $sp->save();

        $id_sp = $sp->id;
        if(Input::hasFile('dsanhchitiet')){
            foreach(Input::file('dsanhchitiet') as $file){
                $anh_chitiet= new Anhsanphamchitiet();
                if(isset($file)){
                    $anh_chitiet->anhchitiet=$file->getClientOriginalName();
                    $anh_chitiet->sanpham_id=$id_sp;
                    $file->move('upload/anhchitiet/',$file->getClientOriginalName());
                    $anh_chitiet->save();
                }
            }
        }
        Session::flash('success','Thêm Sản Phẩm Thành công');

        return redirect()->route('admin.sanpham.danhsach');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sp = Sanpham::findOrFail($id)->toArray();
        return view('admin.sanpham.xemchitiet',compact('sp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai = Loaisanpham::select('id','tenloai','id_hientai')->get()->toArray();
        $sp = Sanpham::find($id);
        $anhchitiet = Sanpham::find($id)->anhchitiet;
        return view('admin.sanpham.sua',compact('loai','sp','anhchitiet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SanphamRequest $request, $id)
    {
        $sp = Sanpham::find($id);
        $sp->tensp = $request->tensp;
        $sp->alias = changeTitle($request->tensp);
        $sp->soluong = $request->soluong;
        $sp->gia = $request->gia;
        $sp->giamgia = ($request->gia-(($request->gia*$request->giamgia)/100));
        $sp->moihaycu = $request->moihaycu;
        $sp->mota = $request->mota;
        $sp->loaisp_id = $request->loai;
        $sp->user_id   = Auth::user()->id;

        $anhcu = 'upload/'.Request::input('anhcu');
        if(!empty(Request::file('anhchinh'))){
            $tenfile = Request::file('anhchinh')->getClientOriginalName();
            $sp->anh = $tenfile;
            Request::file('anhchinh')->move('upload/',$tenfile);
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }
        }elseif(empty(Request::file('anhchinh')) && !empty(Request::file('anhcu'))){
            $tenfilecu = Request::file('anhcu')->getClientOriginalName();
            $sp->anh = $tenfilecu;
        }
        $sp->save();


        // thêm ảnh chi tiết mới
        if(!empty(Request::file('fEditDetail'))){
            foreach (Request::file('fEditDetail') as $file) {
                $anhchitiet = new Anhsanphamchitiet();
                if(isset($file)){
                    $anhchitiet->anhchitiet = $file->getClientOriginalName();
                    $anhchitiet->sanpham_id = $id;
                    $file->move('upload/anhchitiet/',$file->getClientOriginalName());
                    $anhchitiet->save();
                }
            }
        }

        Session::flash('success','Sửa Sản Phẩm Thành công');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anhchitiet = Sanpham::find($id)->anhchitiet->toArray();
        foreach ($anhchitiet as $value) {
            File::delete('upload/anhchitiet/'.$value["anhchitiet"]);
        }
        $sp = Sanpham::find($id);
        File::delete('upload/'.$sp->anh);
        $sp->delete($id);

        Session::flash('success','Xóa Sản Phẩm Thành công');

        return redirect()->back();
    }

    public function xoaanh($id){
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = Anhsanphamchitiet::find($idHinh);
            if(!empty($image_detail)){
                $img = '/upload/anhchitiet/'.$image_detail->anhchitiet;
                // xóa luôn trong source
                unlink('upload/anhchitiet/'.$image_detail->anhchitiet);
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "OK";
        }
    }
}
