<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhapKho extends Model
{
    protected $table = 'chitietnhapkho';

    public function PhieuNhapKho()
    {
        return $this->belongsTo('App\PhieuNhapKho', 'pnk_id', 'id');
    }

    public function VatTu()
    {
        return $this->belongsTo('App\VatTu', 'vt_id', 'id');
    }
}
