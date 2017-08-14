<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    protected $table = 'HocVien';

    protected $primaryKey = 'HocVienID';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'HoLot',
        'Ten',
        'NgaySinh',
        'GioiTinh',
        'ThonXa',
        'CongTyID',
        'KhoaHocID',
        'LopID',
        'HuyenID',
        'TinhID',
        'SDTNhaRieng',
        'SDTDiDong',
        'Active'
    ];
}
