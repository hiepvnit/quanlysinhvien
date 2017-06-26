<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocVien;

class HocVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * home function. show list hocvien
     */
    public function index(Request $request) {
        $hocvien_key = $request->input('hocvien_key');
        $hocviens = HocVien::with('congty', 'khoahoc', 'lop')
            ->where('Ten', 'like', "%$hocvien_key%")
            ->where('Active', '=', '1')
            ->paginate(50);
        $gioiTinh = array(
            '1' => 'Nam',
            '0' => 'Nữ'
        );
        $chiNhanh = array(
            '1' => 'Bắc Ninh',
            '0' => 'Hà Nội'
        );
        return view('hocvien.index', compact(array('hocviens', 'hocvien_key', 'gioiTinh', 'chiNhanh')));
    }
}
