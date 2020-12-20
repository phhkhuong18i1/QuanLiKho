<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaPhanPhoi extends Model
{
    protected $table = 'nhaphanphoi';

    public function VatTu()
    {
        return $this->hasMany('App\VatTu', 'nhaphanphoi_id', 'id');
    }

    public function phieunhapkho()
    {
        return $this->hasMany('App\PhieuNhapKho','npp_id','id');
    }

    public function KhuVuc()
    {
        return $this->belongsTo('App\KhuVuc', 'khuvuc_id', 'id');
    }
}
