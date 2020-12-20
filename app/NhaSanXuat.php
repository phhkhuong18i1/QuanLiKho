<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table = 'nhasanxuat';

    public function KhuVuc()
    {
        return $this->belongsTo('App\KhuVuc', 'kv_id', 'id');
    }

    public function VatTu()
    {
        return $this->hasMany('App\VatTu', 'nhasanxuat_id', 'id');
    }
}
