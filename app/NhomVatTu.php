<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomVatTu extends Model
{
    protected $table = 'nhomvattu';

    public function VatTu()
    {
        return $this->hasMany('App\VatTu', 'nhomvattu_id', 'id');
    }
}
