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
        $lop_key = $request->input('lop_key');
        $lops = Lop::where('TenLop', 'like', "%$lop_key%")->paginate(50);

        return view('lop.index', ['lops' => $lops, 'lop_key' => $lop_key]);
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

            return redirect()->route('lop_index')->with('status', 'Tạo mới lớp thành công');
        }
    }
    /*
     * delete lop
     */
    public function delete($id) {
        $lopData = Lop::find($id);
        $lopData->delete();
        return redirect()->route('lop_index')->with('status', 'Xóa lớp thành công');
    }
    /*
     * edit lop
     */
    public function edit($id) {
        $lopData = Lop::find($id);
        return view('lop.edit')->with(compact(array('lopData')));
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

            return redirect()->route('lop_index')->with('status', 'Cập nhật lớp thành công');
        }
    }
}
