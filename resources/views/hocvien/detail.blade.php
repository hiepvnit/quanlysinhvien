@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Chi tiết: {{ $hocvien->Ten }}</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form class="" role="form" method="POST" action="{{ route('hocvien_add') }}">
                        <!--                {{ csrf_field() }}-->
                        <div class="form-group col-md-12">
                            <label for="ho_lot">Ảnh đại diện</label>
                            <img src="{{ asset('storage/'.$hocvien->Avatar) }}" alt="" class="img-responsive" width="100" height="100">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ho_lot">Họ lót</label>
                            <input type="text" class="form-control" name="ho_lot" id="ho_lot" value="{{$hocvien->HoLot}}" placeholder="Họ lót" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ten">Tên</label>
                            <input type="text" class="form-control" name="ten" id="ten" value="{{$hocvien->Ten}}" placeholder="Tên" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_sinh">Ngày sinh</label>
                            <input type="text" class="form-control" name="ngay_sinh" id="" value="{{ Carbon\Carbon::parse($hocvien->NgaySinh)->format('d/m/Y') }}" placeholder="Ngày sinh" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gioi_tinh">Giới tính</label>
                            <select class="form-control" name="gioi_tinh" id="gioi_tinh" disabled>
                                <option value="{{$hocvien->GioiTinh}}">{{$gioiTinh[$hocvien->GioiTinh]}}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="khoa_hoc">Khóa học</label>
                            <select class="form-control" name="khoa_hoc" id="khoa_hoc" disabled>
                                <option>{{ isset($hocvien->khoahoc->TenKhoaHoc) ? $hocvien->khoahoc->TenKhoaHoc : '' }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lop">Lớp</label>
                            <select class="form-control" name="lop" id="lop" disabled>
                                <option value="">{{ isset($hocvien->lop->TenLop) ? $hocvien->lop->TenLop : '' }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="congty">Công ty tiếp nhận</label>
                            <select class="form-control" name="congty" id="congty" disabled>
                                <option value="">{{ isset($hocvien->congty->TenCongTy) ? $hocvien->congty->TenCongTy : '' }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="thon_xa">Thôn xã</label>
                            <input type="text" class="form-control" name="thon_xa" id="" placeholder="Thôn xã" disabled value="{{ $hocvien->ThonXa }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="huyen">Huyện</label>
                            <select class="form-control" name="huyen" id="huyen" disabled>
                                <option value="">{{ isset($hocvien->huyen->TenHuyen) ? $hocvien->huyen->TenHuyen : '' }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tinh">Tỉnh</label>
                            <select class="form-control" name="tinh" id="tinh" disabled>
                                <option value="">{{ isset($hocvien->tinh->TenTinh) ? $hocvien->tinh->TenTinh : '' }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sdt_nharieng">SDT nhà riêng</label>
                            <input type="text" class="form-control" name="sdt_nharieng" id="sdt_nharieng" disabled value="{{ $hocvien->SDTNhaRieng }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sdt_didong">SDT di động</label>
                            <input type="text" class="form-control" name="sdt_didong" id="sdt_didong" disabled value="{{ $hocvien->SDTDiDong }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cmnd">CMND</label>
                            <input type="text" class="form-control" name="cmnd" id="cmnd" disabled value="{{ $hocvien->CMND }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_xuat_canh">Ngày xuất cảnh</label>
                            <input type="text" class="form-control" name="ngay_xuat_canh" id="ngay_xuat_canh" disabled value="{{ Carbon\Carbon::parse($hocvien->NgayXuatCanh)->format('d/m/Y')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_cap_cmnd">Ngày cấp CMND</label>
                            <input type="text" class="form-control" name="ngay_cap_cmnd" id="ngay_cap_cmnd" disabled value="{{ Carbon\Carbon::parse($hocvien->NgayCapCMND)->format('d/m/Y') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tinh">Nơi cấp CMND</label>
                            <select class="form-control" name="noi_cap_cmnd" id="noi_cap_cmnd" disabled>
                                <option value="">@if(isset($hocvien->tinh->TinhID) && $hocvien->tinh->TinhID == $hocvien->NoiCapCMND) {{ $hocvien->tinh->TenTinh }} @endif</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngap_nhap_hoc">Ngày nhập học</label>
                            <input type="text" class="form-control" name="ngap_nhap_hoc" id="ngap_nhap_hoc" disabled value="{{ Carbon\Carbon::parse($hocvien->NgayNhapHoc)->format('d/m/Y')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_ket_thuc">Ngày kết thúc học</label>
                            <input type="text" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc" disabled value="{{ Carbon\Carbon::parse($hocvien->NgayKetThuc)->format('d/m/Y')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <div class="checkbox">
                                <label>
                                    @if($hocvien->BoChuongTrinh == 1)
                                        <input type="checkbox" value="{{$hocvien->BoChuongTrinh}}" id="bo_chuong_trinh" name="bo_chuong_trinh" checked="checked" disabled>
                                    @else
                                        <input type="checkbox" value="{{$hocvien->BoChuongTrinh}}" id="bo_chuong_trinh" name="bo_chuong_trinh" disabled>
                                    @endif
                                    Bỏ chương trình
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="checkbox">
                                <label>
                                    @if($hocvien->XuatCanh == 1)
                                        <input type="checkbox" value="{{$hocvien->XuatCanh}}" id="xuat_canh" name="xuat_canh" checked="checked" disabled>
                                    @else
                                        <input type="checkbox" value="{{$hocvien->XuatCanh}}" id="xuat_canh" name="xuat_canh" disabled>
                                    @endif
                                    Xuất cảnh
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="ghi_chu">Ghi chú</label>
                            <textarea id="ghi_chu" name="ghi_chu" class="form-control" disabled rows="2">{{ $hocvien->GhiChu}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_1">Đóng tiền lần 1</label>
                            <input type="text" class="form-control" name="dong_tien_lan_1" id="dong_tien_lan_1" disabled value="{{ $hocvien->DongTienLan1}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_2">Đóng tiền lần 2</label>
                            <input type="text" class="form-control" name="dong_tien_lan_2" id="dong_tien_lan_2" disabled value="{{ $hocvien->DongTienLan2}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_3">Đóng tiền lần 3</label>
                            <input type="text" class="form-control" name="dong_tien_lan_3" id="dong_tien_lan_3" disabled value="{{ $hocvien->DongTienLan3}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chi_nhanh">Chi nhánh</label>
                            <select class="form-control" name="chi_nhanh" id="chi_nhanh" disabled>
                                <option value="">{{ $chiNhanh[$hocvien->ChiNhanh] }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="checkbox">
                                <label>
                                    @if($hocvien->Active == 1)
                                    <input type="checkbox" value="{{$hocvien->Active}}" id="active" name="active" checked="checked" disabled>
                                    @else
                                    <input type="checkbox" value="{{$hocvien->Active}}" id="active" name="active" disabled>
                                    @endif
                                    Còn quản lý
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <a href="{{ route('hocvien_index') }}" class="btn btn-primary">Quay lại</a>
                                <a href="{{ url('/hocvien/edit', ['id' => $hocvien->HocVienID]) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{ url('/hocvien/delete', ['id' => $hocvien->HocVienID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn btn-primary">Xóa</a>
<!--                                <a href="#" class="btn btn-primary">Xuất excel</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
