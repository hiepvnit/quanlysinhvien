@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <a href="{{ route('hocvien_add') }}">Thêm học viên mới</a>

            <form class="form-horizontal" role="form" method="GET" action="{{ route('hocvien_index') }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <input id="hocvien_key" type="text" class="form-control" name="hocvien_key" value="{{ $hocvien_key }}" placeholder="Tìm học viên ...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tìm
                    </button>
                </div>
            </form>

            @isset($hocviens)
            {{ $hocviens->links() }}
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã HV</th>
                            <th>Họ Lót</th>
                            <th>Tên</th>
                            <th>Họ Và tên</th>
                            <th>Ngày Sinh</th>
                            <th>Công Ty Tiếp Nhận</th>
                            <th>Khóa Học</th>
                            <th>Lớp</th>
                            <th>Giới Tính</th>
                            <th>Thôn Xã</th>
                            <th>Chi Nhánh</th>
                            <th>Huyện</th>
                            <th>Tỉnh</th>
                            <th>SĐT Nhà Riêng</th>
                            <th>SĐT Di Động</th>
                            <th>CMND</th>
                            <th>Ngày Cấp</th>
                            <th>Nơi Cấp CMND</th>
                            <th>Ngày Nhập Học</th>
                            <th>Ngày Kết Thúc</th>
                            <th>Ghi Chú</th>
                            <th>Ngày Xuất Cảnh</th>
                            <th>Hủy Chương Trình</th>
                            <th>Xuất Cảnh</th>
                            <th>Đóng tiền lần 1</th>
                            <th>Đóng tiền lần 2</th>
                            <th>Đóng tiền lần 3</th>
                            <th>Tổng Tiền Đóng</th>
                        </tr>
                    </thead>
                    @foreach ($hocviens as $hocvien)
                    <tr>
                        <td>{{ $hocvien->HocVienID }}</td>
                        <td>{{ $hocvien->HoLot }}</td>
                        <td>{{ $hocvien->Ten }}</td>
                        <td>{{ $hocvien->HoVaTen }}</td>
                        <td>{{ $hocvien->NgaySinh }}</td>
                        <td>{{ isset($hocvien->congty->TenCongTy) ? $hocvien->congty->TenCongTy : '' }}</td>
                        <td>{{ isset($hocvien->khoahoc->TenKhoaHoc) ? $hocvien->khoahoc->TenKhoaHoc : '' }}</td>
                        <td>{{ isset($hocvien->lop->TenLop) ? $hocvien->lop->TenLop : '' }}</td>
                        <td>{{ $gioiTinh[$hocvien->GioiTinh] }}</td>
                        <td>{{ $hocvien->ThonXa }}</td>
                        <td>{{ $chiNhanh[$hocvien->ChiNhanh] }}</td>
                        <td>{{ isset($hocvien->huyen->TenHuyen) ? $hocvien->huyen->TenHuyen : '' }}</td>
                        <td>{{ isset($hocvien->tinh->TenTinh) ? $hocvien->tinh->TenTinh : '' }}</td>
                        <td>{{ $hocvien->SDTNhaRieng }}</td>
                        <td>{{ $hocvien->SDTDiDong }}</td>
                        <td>{{ $hocvien->CMND }}</td>
                        <td>{{ $hocvien->NgayCapCMND }}</td>
                        <td>@if(isset($hocvien->tinh->TinhID) && $hocvien->tinh->TinhID == $hocvien->NoiCapCMND) {{ $hocvien->tinh->TenTinh }} @endif</td>
                        <td>{{ $hocvien->NgayNhapHoc}}</td>
                        <td>{{ $hocvien->NgayKetThuc}}</td>
                        <td>{{ $hocvien->GhiChu}}</td>
                        <td>{{ $hocvien->NgayXuatCanh}}</td>
                        <td>{{ $hocvien->BoChuongTrinh}}</td>
                        <td>{{ $hocvien->XuatCanh}}</td>
                        <td>{{ $hocvien->DongTienLan1}}</td>
                        <td>{{ $hocvien->DongTienLan2}}</td>
                        <td>{{ $hocvien->DongTienLan3}}</td>
                        <td>{{ $hocvien->TongTienDong}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{ $hocviens->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
