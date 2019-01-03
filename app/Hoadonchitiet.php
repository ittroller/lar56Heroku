<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadonchitiet extends Model
{
    protected $table = 'hoadonchitiets';
	protected $fillable = ['tensp','soluong','hoadon_id'];
    public $timestamps = false;
    
    public function hoadon(){
		return $this->belongTo('App\Hoadon');
	}
}
