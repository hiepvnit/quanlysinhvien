<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'Lop';
    protected $primaryKey = 'LopID';

    protected $fillable = [
        'LopID',
        'TenLop'
    ];

}
