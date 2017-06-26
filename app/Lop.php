<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'Lop';
    protected $primaryKey = 'LopID';

    public function hocvien()
    {
        return $this->hasMany('App\HocVien', 'LopID', 'LopID');
    }
}
