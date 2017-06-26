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
        $huyen_key = $request->input('search_huyen');
        $huyens = Huyen::where('TenHuyen', 'like', "%$huyen_key%")->paginate(50);

        $tinhDatas = Tinh::all()->pluck('TenTinh', 'TinhID');

        return view('huyen.index', ['huyens' => $huyens, 'search_huyen' => $huyen_key, 'tinhDatas' => $tinhDatas]);
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

            return redirect()->route('huyen_index')->with('status', 'Tạo mới huyện thành công');
        }
    }

    /*
     * delete huyen
     */
    public function delete($id) {
        $huyenData = Huyen::find($id);
        $huyenData->delete();
        return redirect()->route('huyen_index')->with('status', 'Xóa huyện thành công');
    }
    /*
     * edit huyen
     */
    public function edit($id) {
        $huyenData = Huyen::find($id);
        $tinhDatas = Tinh::all();
        return view('huyen.edit')->with(compact(array('huyenData', 'tinhDatas')));
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

            return redirect()->route('huyen_index')->with('status', 'Cập nhật huyện thành công');
        }
    }
}
