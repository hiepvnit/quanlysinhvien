<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaHoc;
use Illuminate\Support\Facades\Validator;

class KhoaHocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * index
     */
    public function index(Request $request) {
        $khoahocs = KhoaHoc::all();

        return view('khoahoc.index', ['khoahocs' => $khoahocs]);
    }
    /*
     * show form add
     */
    public function showAddForm() {
        return view('khoahoc.add');
    }
    /*
     * add KhoaHoc
     */
    public function add(Request $request) {
        $rules = array(
            'ten_khoahoc' => 'required|max:255',
        );
        $message = array(
            'ten_khoahoc.required' => "Tên khóa học chưa nhập",
            'ten_khoahoc.max:255' => "Tên khóa học quá dài",
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('khoahoc/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $khoahoc = new KhoaHoc;
            $khoahoc->TenKhoaHoc = $request->input('ten_khoahoc');
            $khoahoc->GhiChu = $request->input('ghi_chu');
            $khoahoc->save();

            return redirect()->route('khoahoc_index')->with('status', 'Tạo mới khóa học thành công');
        }
    }
    /*
     * delete KhoaHoc
     */
    public function delete($id) {
        $khoahocData = KhoaHoc::find($id);
        $khoahocData->delete();
        return redirect()->route('khoahoc_index')->with('status', 'Xóa khóa học thành công');
    }
    /*
     * edit KhoaHoc
     */
    public function edit($id) {
        $khoahocData = KhoaHoc::find($id);
        return view('khoahoc.edit')->with(compact(array('khoahocData')));
    }
    /*
     * update KhoaHoc
     */
    public function update(Request $request) {
        $rules = array(
            'ten_khoahoc' => 'required|max:255',
        );
        $message = array(
            'ten_khoahoc.required' => "Tên khóa học chưa nhập",
            'ten_khoahoc.max:255' => "Tên khóa học quá dài",
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('khoahoc/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $khoahoc = KhoaHoc::find($request->input('id'));
            $khoahoc->TenKhoaHoc = $request->input('ten_khoahoc');
            $khoahoc->GhiChu = $request->input('ghi_chu');
            $khoahoc->save();

            return redirect()->route('khoahoc_index')->with('status', 'Cập nhật khóa học thành công');
        }
    }
}
