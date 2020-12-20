<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongTrinh extends Model
{
    protected $table = 'congtrinh';

    public function PhieuXuatKho()
    {
        return $this->hasMany('App\PhieuXuatKho', 'ct_id', 'id');
    }
}
