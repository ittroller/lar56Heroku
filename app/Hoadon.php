<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table = 'hoadons';
	protected $fillable = ['hoten','diachi','sdt','email','tongtien','tinhtrang','user_id'];
    public $timestamps = false;
    
    public function hoadonchitiet(){
    	return $this->hasMany('App\Hoadonchitiet');
    }
}
