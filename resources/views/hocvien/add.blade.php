@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Thêm học viên</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    @include('errors.error')
                    <form class="" role="form" method="POST" action="{{ route('hocvien_add') }}" enctype="multipart/form-data">
<!--                                        {{ csrf_field() }}-->
                        <div class="form-group col-md-12">
                            <label for="anh">Ảnh đại diện</label>
                            <input type="file" name="anh" value="{{old('anh')}}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ho_lot">Họ lót <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="ho_lot" id="ho_lot" placeholder="Họ lót" value="{{ old('ho_lot') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ten">Tên <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="ten" id="" placeholder="Tên" value="{{ old('ten') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_sinh">Ngày sinh</label>
                            <input type="text" class="form-control datepicker" name="ngay_sinh" id="" placeholder="Ngày sinh" value="{{ old('ngay_sinh') }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gioi_tinh">Giới tính <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                                <option value="">[Chọn giới tính]</option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="khoa_hoc">Khóa học <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="khoa_hoc" id="khoa_hoc">
                                <option value="">[Chọn khóa học]</option>
                                @foreach ($khoahocs as $khoahoc)
                                    @if (old('khoa_hoc') == $khoahoc->KhoaHocID)
                                        <option value="{{$khoahoc->KhoaHocID}}" selected>{{$khoahoc->TenKhoaHoc}}</option>
                                    @else
                                        <option value="{{$khoahoc->KhoaHocID}}">{{$khoahoc->TenKhoaHoc}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lop">Lớp <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="lop" id="lop">
                                <option value="">[Chọn lớp]</option>
                                @foreach ($lops as $lop)
                                    @if (old('lop') == $lop->LopID)
                                        <option value="{{$lop->LopID}}" selected>{{$lop->TenLop}}</option>
                                    @else
                                        <option value="{{$lop->LopID}}">{{$lop->TenLop}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="congty">Công ty tiếp nhận <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="congty" id="congty">
                                <option value="">[Chọn công ty tiếp nhận]</option>
                                @foreach ($congtys as $congty)
                                    @if (old('congty') == $congty->CongTyID)
                                        <option value="{{$congty->CongTyID}}" selected>{{$congty->TenCongTy}}</option>
                                    @else
                                        <option value="{{$congty->CongTyID}}">{{$congty->TenCongTy}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="thon_xa">Thôn xã</label>
                            <input type="text" class="form-control" name="thon_xa" id="" placeholder="Thôn xã" value="{{old('thon_xa')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="huyen">Huyện <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="huyen" id="huyen">
                                <option value="">[Chọn huyện]</option>
                                @foreach ($huyens as $huyen)
                                    @if(old('huyen') == $huyen->HuyenID)
                                    <option value="{{$huyen->HuyenID}}" selected>{{$huyen->TenHuyen}}</option>
                                    @else
                                    <option value="{{$huyen->HuyenID}}">{{$huyen->TenHuyen}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tinh">Tỉnh <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="tinh" id="tinh">
                                <option value="">[Chọn tỉnh]</option>
                                @foreach ($tinhs as $tinh)
                                    @if(old('tinh') == $tinh->TinhID)
                                    <option value="{{$tinh->TinhID}}" selected>{{$tinh->TenTinh}}</option>
                                    @else
                                    <option value="{{$tinh->TinhID}}">{{$tinh->TenTinh}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sdt_nharieng">SDT nhà riêng</label>
                            <input type="text" class="form-control" name="sdt_nharieng" id="sdt_nharieng" placeholder="SDT nhà riêng" value="{{old('sdt_nharieng')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sdt_didong">SDT di động</label>
                            <input type="text" class="form-control" name="sdt_didong" id="sdt_didong" placeholder="SDT di động" value="{{old('sdt_didong')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cmnd">CMND</label>
                            <input type="text" class="form-control" name="cmnd" id="cmnd" placeholder="CMND" value="{{old('cmnd')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_xuat_canh">Ngày xuất cảnh</label>
                            <input type="text" class="form-control datepicker" name="ngay_xuat_canh" id="ngay_xuat_canh" placeholder="Ngày xuất cảnh" value="{{old('ngay_xuat_canh')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_cap_cmnd">Ngày cấp CMND</label>
                            <input type="text" class="form-control datepicker" name="ngay_cap_cmnd" id="" placeholder="Ngày cấp CMND" value="{{old('ngay_cap_cmnd')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tinh">Nơi cấp CMND</label>
                            <select class="form-control" name="noi_cap_cmnd" id="noi_cap_cmnd">
                                <option value="">[Chọn nơi cấp CMND]</option>
                                @foreach ($tinhs as $tinh)
                                    @if(old('noi_cap_cmnd') == $tinh->TinhID)
                                    <option value="{{$tinh->TinhID}}" selected>{{$tinh->TenTinh}}</option>
                                    @else
                                    <option value="{{$tinh->TinhID}}">{{$tinh->TenTinh}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngap_nhap_hoc">Ngày nhập học</label>
                            <input type="text" class="form-control datepicker" name="ngap_nhap_hoc" id="" placeholder="Ngày nhập học" value="{{old('ngay_nhap_hoc')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_ket_thuc">Ngày kết thúc học</label>
                            <input type="text" class="form-control datepicker" name="ngay_ket_thuc" id="ngay_ket_thuc" placeholder="Ngày kết thúc học" value="{{old('ngay_ket_thuc')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" id="bo_chuong_trinh" name="bo_chuong_trinh" value="{{old('bo_chuong_trinh')}}">
                                    Bỏ chương trình
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" id="xuat_canh" name="xuat_canh" value="{{old('xuat_canh')}}">
                                    Xuất cảnh
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="ghi_chu">Ghi chú</label>
                            <textarea id="ghi_chu" name="ghi_chu" class="form-control" placeholder="Ghi chú" rows="2">{{old('ghi_chu')}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_1">Đóng tiền lần 1</label>
                            <input type="text" class="form-control" name="dong_tien_lan_1" id="dong_tien_lan_1" placeholder="Đóng tiền lần 1" value="{{old('dong_tien_lan_1')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_2">Đóng tiền lần 2</label>
                            <input type="text" class="form-control" name="dong_tien_lan_2" id="dong_tien_lan_2" placeholder="Đóng tiền lần 2" value="{{old('dong_tien_lan_2')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_3">Đóng tiền lần 3</label>
                            <input type="text" class="form-control" name="dong_tien_lan_3" id="dong_tien_lan_3" placeholder="Đóng tiền lần 3" value="{{old('dong_tien_lan_3')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chi_nhanh">Chi nhánh <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="chi_nhanh" id="chi_nhanh">
                                <option value="">[Chọn chi nhánh]</option>
                                <option value="1">Bắc Ninh</option>
                                <option value="0">Hà Nội</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" id="con_quan_ly" name="con_quan_ly" checked="checked" value="{{old('con_quan_ly')}}">
                                    Còn quản lý
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <p>Trường có dấu <span class="text-danger">*</span> là bắt buộc phải nhập</p>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Thêm
                                </button>
                                <a href="{{ route('hocvien_index') }}">Quay lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
