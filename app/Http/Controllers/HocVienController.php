<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocVien;
use App\KhoaHoc;
use App\Lop;
use App\CongTy;
use App\Huyen;
use App\Tinh;
use App\User;
use Auth;
use App\Http\Requests\HocVienRequest;

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
        'GhiChu' => 'ghi_chu',
        'ChiNhanh' => 'chi_nhanh',
        'NgayXuatCanh' => 'ngay_xuat_canh',
        'DongTienLan1' => 'dong_tien_lan_1',
        'DongTienLan2' => 'dong_tien_lan_2',
        'DongTienLan3' => 'dong_tien_lan_3',
        'Active' => 'con_quan_ly'
    ];
    /*
     * home function. show list hocvien
     */
    public function index(Request $request) {
        $hocviens = HocVien::where('Active', '=', '1')->get();
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
        $khoahoc = KhoaHoc::pluck('TenKhoaHoc', 'KhoaHocID')->all();
        $lop = Lop::pluck('TenLop', 'LopID')->all();
        $congty = CongTy::pluck('TenCongTy', 'CongTyID')->all();
        $huyen = Huyen::pluck('TenHuyen', 'HuyenID')->all();
        $tinh = Tinh::pluck('TenTinh', 'TinhID')->all();

        return view('hocvien.index', compact(array('hocviens', 'gioiTinh', 'chiNhanh',
            'huyChuongTrinh', 'xuatCanh', 'khoahoc', 'lop', 'congty', 'huyen', 'tinh')));
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

        $userID = $hocVienData->userID;
        if ($userID) {
            User::find($userID)->delete();
        }
        return redirect()->route('hocvien.index')->with('status', 'Xóa học viên thành công');
    }

    /*
     * view hocvien
     * @params $id
     */
    public function detail($id) {
        $user = Auth::user();
        if ($user->HocVienID == $id || $user->hasRole('admin') || $user->hasRole('teacher')) {
            $hocvien = HocVien::where('Active', '=', '1')->find($id);
            if (!empty($hocvien)) {
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

                $khoahoc = KhoaHoc::pluck('TenKhoaHoc', 'KhoaHocID')->all();
                $lop = Lop::pluck('TenLop', 'LopID')->all();
                $congty = CongTy::pluck('TenCongTy', 'CongTyID')->all();
                $huyen = Huyen::pluck('TenHuyen', 'HuyenID')->all();
                $tinh = Tinh::pluck('TenTinh', 'TinhID')->all();

                return view('hocvien.detail', compact('hocvien', 'gioiTinh', 'chiNhanh', 'huyChuongTrinh',
                    'xuatCanh', 'khoahoc', 'lop', 'congty', 'huyen', 'tinh'));
            }
            return abort(404);
        }
        return abort(403);
    }

    /*
     * add hocvien
     * @param $input data
     * @retun true or false
     */
    public function add(HocVienRequest $request) {
        $hocVien = new HocVien();

        foreach ($this->inputArrays as $key => $value) {
            if (!$request->bo_chuong_trinh) {
                $request->bo_chuong_trinh = 0;
            }
            if (!$request->xuat_canh) {
                $request->xuat_canh = 0;
            }
            if (!$request->con_quan_ly) {
                $request->con_quan_ly = 0;
            }
            $hocVien->$key = $request->$value;
        }
        if ($request->hasFile('anh')) {
            if($request->file('anh')->isValid()) {
                try {
                    $file = $request->file('anh');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('avatars', $fileName);
                    $hocVien->Avatar = $path;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }

        $hocVien->save();

        return redirect()->route('hocvien.index')->with('status', 'Tạo mới học viên thành công');
    }

    /*
     * edit hocvien
     * @param: $HocVienID
     * @return: hocVien index
     */
    public function edit($id) {
        $user = Auth::user();
        if ($user->HocVienID == $id || $user->hasRole('admin') || $user->hasRole('teacher')) {
            $hocVien = HocVien::find($id);
            if (!empty($hocVien)) {
                $khoahocs = KhoaHoc::all();
                $lops = Lop::all();
                $congtys = CongTy::all();
                $huyen = Huyen::pluck('TenHuyen', 'HuyenID')->all();
                $tinhs = Tinh::all();

                return view('hocvien.edit')->with(compact(array('hocVien', 'khoahocs', 'lops', 'congtys', 'huyen', 'tinhs')));
            }
            return abort(404);
        }
        return abort(403);
    }

    /*
     * update function
     * @param: array input
     * return: redirect hocvien index
     */
    public function update(HocVienRequest $request) {
        $hocVien = HocVien::find($request->id);
        foreach ($this->inputArrays as $key => $value) {
            if (!$request->bo_chuong_trinh) {
                $request->bo_chuong_trinh = 0;
            }
            if (!$request->xuat_canh) {
                $request->xuat_canh = 0;
            }
            if (!$request->con_quan_ly) {
                $request->con_quan_ly = 0;
            }
            $hocVien->$key = $request->$value;
        }
        if ($request->hasFile('anh')) {
            if($request->file('anh')->isValid()) {
                try {
                    $file = $request->file('anh');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('avatars', $fileName);
                    $hocVien->Avatar = $path;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }

        $hocVien->save();

        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('teacher')) {
            return redirect()->route('hocvien.index')->with('status', 'Sửa học viên thành công');
        }
        else {
            return redirect()->route('hocvien.detail', ['id' => $request->id])->with('status', 'Sửa học viên thành công');
        }
    }
}
