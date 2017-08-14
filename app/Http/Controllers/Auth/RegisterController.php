<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\HocVien;
use App\Huyen;
use App\Tinh;
use App\CongTy;
use App\KhoaHoc;
use App\Lop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $huyens = Huyen::all();
        $tinhs = Tinh::all();
        $khoahocs = KhoaHoc::all();
        $lops = Lop::all();
        $congtys = CongTy::all();
        return view('auth.register', compact('huyens', 'tinhs', 'congtys', 'khoahocs', 'lops'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'ho_lot' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gioi_tinh' => 'required',
            'ngay_sinh' => 'required',
            'huyen' => 'required',
            'tinh' => 'required',
            'thon_xa' => 'required',
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $input = $request->all();

        $input['Active'] = false;
        $hocVienData = $this->createHocVien($input);

        $input['HocVienID'] = $hocVienData->HocVienID;
        $this->create($input);

        return redirect('/login')->with('status', 'Đăng ký thành công. Đang chờ xét duyệt.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'HocVienID' => $data['HocVienID']
        ]);
    }

    /**
     * Create a new hocvien instance after a valid registration.
     *
     * @param  array  $data
     * @return HocVien
     */
    public function createHocVien(array $data)
    {
        return HocVien::create([
            'HoLot' => $data['ho_lot'],
            'Ten' => $data['name'],
            'NgaySinh' => $data['ngay_sinh'],
            'GioiTinh' => $data['gioi_tinh'],
            'ThonXa' => $data['thon_xa'],
            'HuyenID' => $data['huyen'],
            'TinhID' => $data['tinh'],
            'SDTNhaRieng' => $data['sdt_nharieng'],
            'SDTDiDong' => $data['sdt_didong'],
        ]);
    }
}
