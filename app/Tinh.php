<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = 'Tinh';
    protected $primaryKey = 'TinhID';
    protected $fillable = array('TenTinh');

}
