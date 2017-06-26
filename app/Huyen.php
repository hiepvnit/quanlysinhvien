<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $table = 'Huyen';
    protected $primaryKey = 'HuyenID';

    public function hocvien()
    {
        return $this->hasMany('App\HocVien', 'HuyenID', 'HuyenID');
    }
}
