<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuXuatKho extends Model
{
    protected $table = 'phieuxuatkho';

    public function ChiTietXuatKho()
    {
        return $this->hasOne('App\ChiTietXuatKho', 'phieuxuatkho_id', 'id');
    }

    public function CongTrinh()
    {
        return $this->belongsTo('App\CongTrinh', 'congtrinh_id', 'id');
    }
}
