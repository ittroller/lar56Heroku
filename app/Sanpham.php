<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = 'sanphams';
	protected $fillable = ['tensp','alias','soluong','gia','giamgia','moihaycu','anh','mota','loaisp_id','user_id'];
	public $timestamps = false;

	public function loaisp(){
		return $this->belongTo('App\Loaisanpham');
	}
	public function user(){
		return $this->belongTo('App\User');
	}
	public function anhchitiet(){
		return $this->hasMany('App\Anhsanphamchitiet');
	}
}
