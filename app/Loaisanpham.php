<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    protected $table = 'loaisanphams';
    protected $fillable = ['tenloai','alias','loaisp_tp','loai_id'];
    public $timestamps = false;
    
    public function sanpham(){
    	return $this->hasMany('App\Sanpham');
    }
}
