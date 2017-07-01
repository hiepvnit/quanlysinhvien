<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CongTy;
use Illuminate\Support\Facades\Validator;

class CongTyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * index
     */
    public function index(Request $request) {
        $congtys = CongTy::all();

        return view('congty.index', ['congtys' => $congtys]);
    }
    /*
     * show form add
     */
    public function showAddForm() {
        return view('congty.add');
    }
    /*
     * add CongTy
     */
    public function add(Request $request) {
        $rules = array(
            'ten_congty' => 'required|max:255',
        );
        $message = array(
            'ten_congty.required' => "Tên công ty chưa nhập",
            'ten_congty.max:255' => "Tên công ty quá dài",
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('congty/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $congty = new CongTy;
            $congty->TenCongTy = $request->input('ten_congty');
            $congty->GhiChu = $request->input('ghi_chu');
            $congty->save();

            return redirect()->route('congty_index')->with('status', 'Tạo mới công ty thành công');
        }
    }
    /*
     * delete CongTy
     */
    public function delete($id) {
        $congtyData = CongTy::find($id);
        $congtyData->delete();
        return redirect()->route('congty_index')->with('status', 'Xóa công ty thành công');
    }
    /*
     * edit CongTy
     */
    public function edit($id) {
        $congtyData = CongTy::find($id);
        return view('congty.edit')->with(compact(array('congtyData')));
    }
    /*
     * update CongTy
     */
    public function update(Request $request) {
        $rules = array(
            'ten_congty' => 'required|max:255',
        );
        $message = array(
            'ten_congty.required' => "Tên công ty chưa nhập",
            'ten_congty.max:255' => "Tên công ty quá dài",
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('congty/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $congty = CongTy::find($request->input('id'));
            $congty->TenCongTy = $request->input('ten_congty');
            $congty->GhiChu = $request->input('ghi_chu');
            $congty->save();

            return redirect()->route('congty_index')->with('status', 'Cập nhật công ty thành công');
        }
    }
}
