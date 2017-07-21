<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocVien;
use App\KhoaHoc;
use App\Lop;
use App\CongTy;
use App\Huyen;
use App\Tinh;
use Excel;

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
     * show form add
     */
    public function showAddForm() {
        $khoahocs = KhoaHoc::all();
        $lops = Lop::all();
        $congtys = CongTy::all();
        $huyens = Huyen::all();
        $tinhs = Tinh::all();

        return view('hocvien.add', compact('khoahocs', 'lops', 'congtys', 'huyens', 'tinhs'));
    }

    /*
     * delete hocvien
     */
    public function delete($id) {
        $hocVienData = Hocvien::find($id);
        $hocVienData->delete();
        return redirect()->route('hocvien_index')->with('status', 'Xóa học viên thành công');
    }

    /*
     * view hocvien
     * @params $id
     */
    public function detail($id) {
        $hocvien = HocVien::with('congty', 'khoahoc', 'lop')->find($id);

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

        return view('hocvien.detail', compact('hocvien', 'gioiTinh', 'chiNhanh', 'huyChuongTrinh', 'xuatCanh'));
    }
}
