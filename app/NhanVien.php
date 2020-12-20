<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';

    public function NhapKho()
    {
        return $this->hasMany('App\PhieuNhapKho', 'nv_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id','id');
    }

   

   
}
