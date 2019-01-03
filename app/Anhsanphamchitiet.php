<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anhsanphamchitiet extends Model
{
    protected $table = 'anhsanphamchitiets';
    protected $fillable = ['anhchitiet','sanpham_id'];
    public $timestamps = false;
	public function sanpham(){
		return $this->belongTo('App\Sanpham');
	}
}
