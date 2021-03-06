<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tinh;
use Illuminate\Support\Facades\Validator;

class TinhController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * show list tinh
     */
    public function index(Request $request) {
        $tinhs = Tinh::all();

        return view('tinh.index', ['tinhs' => $tinhs]);
    }
    /*
     * show tinh add form
     */
    public function showAddForm() {
        return view ('tinh.add');
    }
    /*
     * add function
     */
    public function add(Request $request) {
        $rules = array(
            'ten_tinh' => 'required|max:255'
        );
        $message = array(
            'required' => "Tên tỉnh chưa nhập",
            'max:255' => "Tên tỉnh quá dài"
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('tinh/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $tinh = new Tinh;
            $tinh->TenTinh = $request->input('ten_tinh');
            $tinh->save();

            return redirect()->route('tinh.index')->with('status', 'Tạo mới tỉnh thành công');
        }
    }
    /*
     * delete tinh
     */
    public function delete($id) {
        $tinhData = Tinh::find($id);
        if (!empty($tinhData)) {
            $tinhData->delete();
            return redirect()->route('tinh.index')->with('status', 'Xóa tỉnh thành công');
        }
        return abort(404);
    }
    /*
     * edit tinh
     */
    public function edit($id) {
        $tinhData = Tinh::find($id);
        if (!empty($tinhData)) {
            return view('tinh.edit')->with(compact('tinhData', $tinhData));
        }
        return abort(404);
    }
    /*
     * update tinh
     */
    public function update(Request $request) {
        $rules = array(
            'ten_tinh' => 'required|max:255'
        );
        $message = array(
            'required' => "Tên tỉnh chưa nhập",
            'max:255' => "Tên tỉnh quá dài"
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('tinh/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $tinh = Tinh::find($request->input('id'));
            $tinh->TenTinh = $request->input('ten_tinh');
            $tinh->save();

            return redirect()->route('tinh.index')->with('status', 'Cập nhật tỉnh thành công');
        }
    }
}
