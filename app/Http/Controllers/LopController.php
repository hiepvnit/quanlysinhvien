<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lop;
use Illuminate\Support\Facades\Validator;

class LopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
     * index
     */
    public function index(Request $request) {
        $lops = Lop::all();

        return view('lop.index', ['lops' => $lops]);
    }
    /*
     * show form add
     */
    public function showAddForm() {
        return view('lop.add');
    }
    /*
     * add lop
     */
    public function add(Request $request) {
        $rules = array(
            'ten_lop' => 'required|max:255',
        );
        $message = array(
            'ten_lop.required' => "Tên lớp chưa nhập",
            'ten_lop.max:255' => "Tên lớp quá dài",
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('lop/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $lop = new Lop;
            $lop->TenLop = $request->input('ten_lop');
            $lop->GhiChu = $request->input('ghi_chu');
            $lop->save();

            return redirect()->route('lop.index')->with('status', 'Tạo mới lớp thành công');
        }
    }
    /*
     * delete lop
     */
    public function delete($id) {
        $lopData = Lop::find($id);
        if (!empty($lopData)) {
            $lopData->delete();
            return redirect()->route('lop.index')->with('status', 'Xóa lớp thành công');
        }
        return abort(404);
    }
    /*
     * edit lop
     */
    public function edit($id) {
        $lopData = Lop::find($id);
        if (!empty($lopData)) {
            return view('lop.edit')->with(compact(array('lopData')));
        }
        return abort(404);
    }
    /*
     * update lop
     */
    public function update(Request $request) {
        $rules = array(
            'ten_lop' => 'required|max:255',
        );
        $message = array(
            'ten_lop.required' => "Tên lớp chưa nhập",
            'ten_lop.max:255' => "Tên lớp quá dài",
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('lop/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $lop = Lop::find($request->input('id'));
            $lop->TenLop = $request->input('ten_lop');
            $lop->GhiChu = $request->input('ghi_chu');
            $lop->save();

            return redirect()->route('lop.index')->with('status', 'Cập nhật lớp thành công');
        }
    }
}
