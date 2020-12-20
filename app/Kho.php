<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    protected $table = 'khovt';

    public function VatTuKho()
    {
        return $this->hasMany('App\VatTuKho', 'kho_id', 'id');
    }

    public function KhuVuc()
    {
        return $this->belongsTo('App\KhuVuc', 'kv_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo('App\User','id','id');
    }
}
