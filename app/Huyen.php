<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $table = 'Huyen';
    protected $primaryKey = 'HuyenID';

    protected $fillable = [
        'HuyenID',
        'TenHuyen'
    ];
}
