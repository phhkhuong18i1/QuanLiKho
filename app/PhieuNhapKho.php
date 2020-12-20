<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhapKho extends Model
{
    protected $table = 'phieunhapkho';

    public function ChiTietNhapKho()
    {
        return $this->hasManny('App\ChiTietNhapKho', 'pnk_id', 'id');
    }
    public function nhaphanphoi()
    {
        return $this->belongsTo('App\NhaPhanPhoi','npp_id','id');
    }

    public function nhanvien()
    {
    	return $this->belongsTo('App\NhanVien','nv_id','id');
    }
}
