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
        $hocviens = HocVien::with('congty', 'khoahoc', 'lop')
            ->where('Active', '=', '1')
            ->get();
        $gioiTinh = array(
            '1' => 'Nam',
            '0' => 'Nữ'
        );
        $chiNhanh = array(
            '1' => 'Bắc Ninh',
            '0' => 'Hà Nội'
        );
        $huyChuongTrinh = array(
            '1' => 'Có',
            '0' => 'Không'
        );
        $xuatCanh = array(
            '1' => 'Có',
            '0' => 'Không'
        );
        return view('hocvien.index', compact(array('hocviens', 'gioiTinh', 'chiNhanh', 'huyChuongTrinh', 'xuatCanh')));
    }

    /*
     * delete hocvien
     */
    public function delete($id) {
        $hocVienData = Hocvien::find($id);
        $hocVienData->delete();
        return redirect()->route('hocvien_index')->with('status', 'Xóa học viên thành công');
    }
}
