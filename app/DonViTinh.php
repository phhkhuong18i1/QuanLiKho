<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    protected $table = 'donvitinh';

    public function VatTu()
    {
        return $this->hasMany('App\VatTu', 'donvitinh_id', 'id');
    }
}
