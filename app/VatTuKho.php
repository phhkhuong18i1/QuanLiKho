<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VatTuKho extends Model
{
    protected $table = 'vattukho';

    public function vattu()
    {
        return $this->belongsTo('App\VatTu', 'vattu_id', 'id');
    }

    public function Kho()
    {
        return $this->belongsTo('App\Kho', 'kho_id', 'id');
    }
}
