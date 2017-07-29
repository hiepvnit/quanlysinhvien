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
        'ho_lot',
        'ten',
//        'faq_cate_id',
//        'public_flg',
//        'sortnum',
//        'delete_flg'
    ];

    public function congty()
    {
        return $this->belongsTo('App\CongTy', 'CongTyID', 'CongTyID');
    }
    public function khoahoc()
    {
        return $this->belongsTo('App\KhoaHoc', 'KhoaHocID', 'KhoaHocID');
    }
    public function lop()
    {
        return $this->belongsTo('App\Lop', 'LopID', 'LopID');
    }
    public function huyen()
    {
        return $this->belongsTo('App\Huyen', 'HuyenID', 'HuyenID');
    }
    public function tinh()
    {
        return $this->belongsTo('App\Tinh', 'TinhID', 'TinhID');
    }
}
