<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
    protected $table = 'khuvuc';

    public function Kho()
    {
        return $this->hasMany('App\NhaSanXuat', 'kv_id', 'id');
    }

    public function NhaPhanPhoi()
    {
        return $this->hasMany('App\NhaPhanPhoi', 'khuvuc_id', 'id');
    }
    public function nhasanxuat()
    {
        return $this->hasMany('App\NhaSanXuat','kv_id','id');
    }
}
