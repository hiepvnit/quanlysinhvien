<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongTy extends Model
{
    protected $table = 'CongTy';
    protected $primaryKey = 'CongTyID';


    protected $fillable = [
        'CongTyID',
        'TenCongTy'
    ];
}
