<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocVien;
use App\KhoaHoc;
use App\Lop;
use App\CongTy;
use App\Huyen;
use App\Tinh;
use App\Http\Requests\HocVienRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HocVienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * @param: field1 in db
     * @param: field2 on view
     * @return array[field1=>field2]
     */
    protected $inputArrays = [
        'HoLot' => 'ho_lot',
        'Ten' => 'ten',
        'NgaySinh' => 'ngay_sinh',
        'GioiTinh' => 'gioi_tinh',
        'CongTyID' => 'congty',
        'KhoaHocID' => 'khoa_hoc',
        'LopID' => 'lop',
        'HuyenID' => 'huyen',
        'TinhID' => 'tinh',
        'ThonXa' => 'thon_xa',
        'SDTNhaRieng' => 'sdt_nharieng',
        'SDTDiDong' => 'sdt_didong',
        'CMND' => 'cmnd',
        'NgayCapCMND' => 'ngay_cap_cmnd',
        'NoiCapCMND' => 'noi_cap_cmnd',
        'NgayNhapHoc' => 'ngap_nhap_hoc',
        'NgayKetThuc' => 'ngay_ket_thuc',
        'BoChuongTrinh' => 'bo_chuong_trinh',
        'XuatCanh' => 'xuat_canh',
//        'Anh' => 'anh',
        'GhiChu' => 'ghichu',
        'ChiNhanh' => 'chi_nhanh',
        'NgayXuatCanh' => 'ngay_xuat_canh',
        'DongTienLan1' => 'dong_tien_lan_1',
        'DongTienLan2' => 'dong_tien_lan_2',
        'DongTienLan3' => 'dong_tien_lan_3'
    ];
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

    /*
     * add hocvien
     * @param $input data
     * @retun true or false
     */
    public function add(HocVienRequest $request) {
        $hocVien = new HocVien();
        foreach ($this->inputArrays as $key => $value) {
            $hocVien->Active = 1;
            if (!$request->bo_chuong_trinh) {
                $request->bo_chuong_trinh = 0;
            }
            if (!$request->xuat_canh) {
                $request->xuat_canh = 0;
            }
            $hocVien->$key = $request->$value;
        }
        $hocVien->save();

        return redirect()->route('hocvien_index');
    }
}
