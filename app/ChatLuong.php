<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatLuong extends Model
{
    protected $table = 'chatluong';

    public function VatTu()
    {
        return $this->hasMany('App\VatTu', 'chatluong_id', 'id');
    }
}
