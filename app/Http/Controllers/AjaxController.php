<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Huyen;

class AjaxController extends Controller
{
    public function getHuyenData(Request $request) {
        $id_tinh = $request->id_tinh;
        $huyen = Huyen::where('TinhID', '=', $id_tinh)->pluck('TenHuyen', 'HuyenID')->all();

        return view('hocvien.ajax.get_huyen',compact('huyen'));
//        return response()->json(['options'=>$datas]);
    }
}
