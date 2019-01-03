<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoaisanphamRequest;

use App\Loaisanpham;

use Auth;
use Session;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.loaisanpham.danhsach')->with('loai',Loaisanpham::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_hientai = Loaisanpham::select('id','tenloai','id_hientai')->get()->toArray();
		return view('admin.loaisanpham.them',compact('id_hientai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaisanphamRequest $request){
        $loai = new Loaisanpham;
        $loai->tenloai = $request->tenloai;
        $loai->alias = changeTitle($request->tenloai);
        $loai->id_hientai = $request->loai;

        $loai->save();

        Session::flash('success','Thêm Thành công');

        return redirect()->route('admin.loai.danhsach');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Loaisanpham::findOrFail($id)->toArray();
		$id_hientai = Loaisanpham::select('id','tenloai','id_hientai')->get()->toArray();
		return view('admin.loaisanpham.sua',compact('data','id_hientai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoaisanphamRequest $request, $id)
    {
        $loai = Loaisanpham::find($id);
        $loai->tenloai = $request->tenloai;
        $loai->alias = changeTitle($request->tenloai);
		$loai->id_hientai 		= $request->loai;
        $loai->save();

        Session::flash('success','Sửa Thành công');

        return redirect()->route('admin.loai.danhsach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = Loaisanpham::find($id);
        $loai->delete();
        return redirect()->route('admin.loai.danhsach');
    }
}
