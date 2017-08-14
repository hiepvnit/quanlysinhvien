<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    protected $table = 'KhoaHoc';
    protected $primaryKey = 'KhoaHocID';

    protected $fillable = [
        'KhoaHocID',
        'TenKhoaHoc'
    ];

}
