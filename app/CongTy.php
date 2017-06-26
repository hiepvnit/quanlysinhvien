<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongTy extends Model
{
    protected $table = 'CongTy';
    protected $primaryKey = 'CongTyID';

    public function hocvien()
    {
        return $this->hasMany('App\HocVien', 'CongTyID', 'CongTyID');
    }
}
