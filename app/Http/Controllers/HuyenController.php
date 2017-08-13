<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Huyen;
use App\Tinh;
use Illuminate\Support\Facades\Validator;

class HuyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * home function. show list huyen
     */
    public function index(Request $request) {
        $huyens = Huyen::all();

        $tinhDatas = Tinh::all()->pluck('TenTinh', 'TinhID');

        return view('huyen.index', ['huyens' => $huyens, 'tinhDatas' => $tinhDatas]);
    }

    /*
     * show form add
     */
    public function showAddForm() {
        $tinhDatas = Tinh::all();
        return view('huyen.add')->with(compact('tinhDatas'));
    }
    /*
     * add huyen
     */
    public function add(Request $request) {
        $rules = array(
            'ten_huyen' => 'required|max:255',
            'ten_tinh' => 'required'
        );
        $message = array(
            'ten_huyen.required' => "Tên huyện chưa nhập",
            'ten_huyen.max:255' => "Tên huyện quá dài",
            'ten_tinh.required' => "Tên tỉnh chưa chọn"
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('huyen/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $huyen = new Huyen;
            $huyen->TenHuyen = $request->input('ten_huyen');
            $huyen->TinhID = $request->input('ten_tinh');
            $huyen->save();

            return redirect()->route('huyen.index')->with('status', 'Tạo mới huyện thành công');
        }
    }

    /*
     * delete huyen
     */
    public function delete($id) {
        $huyenData = Huyen::find($id);
        if (!empty($huyenData)) {
            $huyenData->delete();
            return redirect()->route('huyen.index')->with('status', 'Xóa huyện thành công');
        }
        return abort(404);
    }
    /*
     * edit huyen
     */
    public function edit($id) {
        $huyenData = Huyen::find($id);
        if (!empty($huyenData)) {
            $tinhDatas = Tinh::all();
            return view('huyen.edit')->with(compact(array('huyenData', 'tinhDatas')));
        }
        return abort(404);
    }
    /*
     * update huyen
     */
    public function update(Request $request) {
        $rules = array(
            'ten_huyen' => 'required|max:255',
            'ten_tinh' => 'required'
        );
        $message = array(
            'ten_huyen.required' => "Tên huyện chưa nhập",
            'ten_huyen.max:255' => "Tên huyện quá dài",
            'ten_tinh.required' => "Tên tỉnh chưa chọn"
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('huyen/edit/'.$request->input('id'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $huyen = Huyen::find($request->input('id'));
            $huyen->TenHuyen = $request->input('ten_huyen');
            $huyen->TinhID = $request->input('ten_tinh');
            $huyen->save();

            return redirect()->route('huyen.index')->with('status', 'Cập nhật huyện thành công');
        }
    }
}
