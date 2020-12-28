<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietXuatKho extends Model
{
    protected $table = 'chitietxuatkho';

    public function PhieuXuatKho()
    {
        return $this->belongsTo('App\PhieuXuatKho', 'phieuxuatkho_id', 'id');
    }

    public function VatTu()
    {
        return $this->belongsTo('App\VatTu', 'vattu_id', 'id');
    }
    public function kho()
    {
        return $this->belongsTo('App\Kho', 'kho_id', 'id');
    }

}
