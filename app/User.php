<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'username',
        'hoten',
        'email',
        'sdt',
        'password',
        'diachi',
        'quyen'
    ];
    public $timestamps = false;
    public function sanpham()
    {
        return $this->hasMany('App\Sanpham');
    }
    public function hoadon(){
    	return $this->hasMany('App\Hoadon');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
