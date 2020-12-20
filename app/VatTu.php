<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VatTu extends Model
{
    protected $table = 'vattu';

    public function vattukho()
    {
        return $this->hasMany('App\VatTuKho', 'vattu_id', 'id');
    }

    public function ChatLuong()
    {
        return $this->belongsTo('App\ChatLuong', 'chatluong_id', 'id');
    }

    public function NhomVatTu()
    {
        return $this->belongsTo('App\NhomVatTu', 'nhomvattu_id', 'id');
    }

    public function DonViTinh()
    {
        return $this->belongsTo('App\DonViTinh', 'donvitinh_id', 'id');
    }

    public function ChiTietXuatKho()
    {
        return $this->hasMany('App\ChiTietXuatKho', 'vattu_id', 'id');
    }

    public function ChiTietNhapKho()
    {
        return $this->hasMany('App\ChiTietNhapKho', 'vt_id', 'id');
    }

    public function NhaPhanPhoi()
    {
        return $this->belongsTo('App\NhaPhanPhoi', 'nhaphanphoi_id', 'id');
    }

    public function NhaSanXuat()
    {
        return $this->belongsTo('App\NhaSanXuat', 'nhasanxuat_id', 'id');
    }
}
