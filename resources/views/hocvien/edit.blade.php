@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/hocvien.css') }}">
@endsection

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script>var baseUrl = "<?php echo route('hocvien.ajax'); ?>";</script>
@endsection

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Sửa học viên</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    @include('errors.error')
                    <form class="" role="form" method="POST" action="{{ route('hocvien.update') }}" enctype="multipart/form-data">
                        <!--                {{ csrf_field() }}-->
                        <input type="hidden" name="id" value="{{$hocVien->HocVienID}}" />
                        <div class="form-group col-md-6">
                            <label for="ho_lot">Họ lót <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="ho_lot" id="ho_lot" placeholder="Họ lót" value="{{$hocVien->HoLot}}">
                            <label for="ten">Tên <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="ten" id="" placeholder="Tên" value="{{$hocVien->Ten}}">
                        </div>

                        <div class="form-group col-md-6">
                            @if($hocVien->Avatar)
                                <label for="anh">Ảnh đại diện</label>
                                <img src="{{ asset('storage/'.$hocVien->Avatar) }}" alt="" class="img-responsive" width="100" height="100" style="padding: 6px 12px;">
                            @endif
                            <label for="anh">Chọn ảnh đại diện</label>
                            <input type="file" name="anh" value="{{old('anh')}}" class="form-control" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_sinh">Ngày sinh</label>
                            <input type="text" class="form-control datepicker" name="ngay_sinh" id="" placeholder="Ngày sinh" value="{{$hocVien->NgaySinh}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gioi_tinh">Giới tính <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                                <option value="">[Chọn giới tính]</option>
                                <option value="1" @if($hocVien->GioiTinh == 1) selected @endif>Nam</option>
                                <option value="0" @if($hocVien->GioiTinh == 0) selected @endif>Nữ</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="khoa_hoc">Khóa học <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="khoa_hoc" id="khoa_hoc">
                                <option value="">[Chọn khóa học]</option>
                                @foreach ($khoahocs as $khoahoc)
                                <option value="{{$khoahoc->KhoaHocID}}" @if($khoahoc->KhoaHocID == $hocVien->KhoaHocID) selected @endif>{{$khoahoc->TenKhoaHoc}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lop">Lớp <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="lop" id="lop">
                                <option value="">[Chọn lớp]</option>
                                @foreach ($lops as $lop)
                                <option value="{{$lop->LopID}}" @if($lop->LopID == $hocVien->LopID) selected @endif>{{$lop->TenLop}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="congty">Công ty tiếp nhận <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="congty" id="congty">
                                <option value="">[Chọn công ty tiếp nhận]</option>
                                @foreach ($congtys as $congty)
                                <option value="{{$congty->CongTyID}}" @if($congty->CongTyID == $hocVien->CongTyID) selected @endif>{{$congty->TenCongTy}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tinh">Tỉnh <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="tinh" id="tinh">
                                <option value="">[Chọn tỉnh]</option>
                                @foreach ($tinhs as $tinh)
                                <option value="{{$tinh->TinhID}}" @if($tinh->TinhID == $hocVien->TinhID) selected @endif>{{$tinh->TenTinh}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="huyen">Huyện <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="huyen" id="huyen">
                                <option value="">[Chọn huyện]</option>
                                @if(isset($hocVien->HuyenID))
                                <option value="{{ $hocVien->TinhID }}" selected>{{ $huyen[$hocVien->HuyenID] }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="thon_xa">Thôn xã</label>
                            <input type="text" class="form-control" name="thon_xa" id="" placeholder="Thôn xã" value="{{$hocVien->ThonXa}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sdt_nharieng">SDT nhà riêng</label>
                            <input type="text" class="form-control" name="sdt_nharieng" id="sdt_nharieng" placeholder="SDT nhà riêng" value="{{$hocVien->SDTNhaRieng}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sdt_didong">SDT di động</label>
                            <input type="text" class="form-control" name="sdt_didong" id="sdt_didong" placeholder="SDT di động" value="{{$hocVien->SDTDiDong}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cmnd">CMND</label>
                            <input type="text" class="form-control" name="cmnd" id="cmnd" placeholder="CMND" value="{{$hocVien->CMND}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_xuat_canh">Ngày xuất cảnh</label>
                            <input type="text" class="form-control datepicker" name="ngay_xuat_canh" id="ngay_xuat_canh" placeholder="Ngày xuất cảnh" value="{{ $hocVien->NgayXuatCanh}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_cap_cmnd">Ngày cấp CMND</label>
                            <input type="text" class="form-control datepicker" name="ngay_cap_cmnd" id="" placeholder="Ngày cấp CMND" value="{{ $hocVien->NgayCapCMND }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tinh">Nơi cấp CMND</label>
                            <select class="form-control" name="noi_cap_cmnd" id="noi_cap_cmnd">
                                <option value="">[Chọn nơi cấp CMND]</option>
                                @foreach ($tinhs as $tinh)
                                <option value="{{$tinh->TinhID}}" @if($tinh->TinhID == $hocVien->NoiCapCMND) selected @endif>{{$tinh->TenTinh}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngap_nhap_hoc">Ngày nhập học</label>
                            <input type="text" class="form-control datepicker" name="ngap_nhap_hoc" id="" placeholder="Ngày nhập học" value="{{ $hocVien->NgayNhapHoc}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ngay_ket_thuc">Ngày kết thúc học</label>
                            <input type="text" class="form-control datepicker" name="ngay_ket_thuc" id="ngay_ket_thuc" placeholder="Ngày kết thúc học" value="{{ $hocVien->NgayKetThuc}}">
                        </div>

                        <div class="form-group col-md-6">
                            <div class="checkbox">
                                <label>
                                    @if($hocVien->BoChuongTrinh == 1)
                                    <input type="checkbox" value="{{$hocVien->BoChuongTrinh}}" id="bo_chuong_trinh" name="bo_chuong_trinh" checked="checked">
                                    @else
                                    <input type="checkbox" id="bo_chuong_trinh" name="bo_chuong_trinh" value="1">
                                    @endif
                                    Bỏ chương trình
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="checkbox">
                                <label>
                                    @if($hocVien->XuatCanh == 1)
                                    <input type="checkbox" value="{{$hocVien->XuatCanh}}" id="xuat_canh" name="xuat_canh" checked="checked">
                                    @else
                                    <input type="checkbox" id="xuat_canh" name="xuat_canh" value="1">
                                    @endif
                                    Xuất cảnh
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="ghi_chu">Ghi chú</label>
                            <textarea id="ghi_chu" name="ghi_chu" class="form-control" placeholder="Ghi chú" rows="2">{{ $hocVien->GhiChu}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_1">Đóng tiền lần 1</label>
                            <input type="text" class="form-control" name="dong_tien_lan_1" id="dong_tien_lan_1" placeholder="Đóng tiền lần 1" value="{{ $hocVien->DongTienLan1}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_2">Đóng tiền lần 2</label>
                            <input type="text" class="form-control" name="dong_tien_lan_2" id="dong_tien_lan_2" placeholder="Đóng tiền lần 2" value="{{ $hocVien->DongTienLan2}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dong_tien_lan_3">Đóng tiền lần 3</label>
                            <input type="text" class="form-control" name="dong_tien_lan_3" id="dong_tien_lan_3" placeholder="Đóng tiền lần 3" value="{{ $hocVien->DongTienLan3}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="chi_nhanh">Chi nhánh <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="chi_nhanh" id="chi_nhanh">
                                <option value="">[Chọn chi nhánh]</option>
                                <option value="1" @if($hocVien->ChiNhanh == 1) selected @endif>Bắc Ninh</option>
                                <option value="0" @if($hocVien->ChiNhanh == 0) selected @endif>Hà Nội</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="checkbox">
                                <label>
                                    @if($hocVien->Active == 1)
                                    <input type="checkbox" value="{{$hocVien->Active}}" id="con_quan_ly" name="con_quan_ly" checked="checked">
                                    @else
                                    <input type="checkbox" id="con_quan_ly" name="con_quan_ly" value="1">
                                    @endif
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
                                    Sửa
                                </button>
                                @role(['admin', 'teacher'])
                                    <a href="{{ route('hocvien.index') }}">Quay lại</a>
                                @endrole
                                @role('student')
                                    <a href="{{url('/hocvien/detail', ['id' => $hocVien->HocVienID])}}">Quay lại</a>
                                @endrole
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
