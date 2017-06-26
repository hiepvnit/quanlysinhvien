<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    protected $table = 'KhoaHoc';
    protected $primaryKey = 'KhoaHocID';

    public function hocvien()
    {
        return $this->hasMany('App\HocVien', 'KhoaHocID', 'KhoaHocID');
    }
}
