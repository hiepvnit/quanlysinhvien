@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('hocvien.add') }}" class="btn btn-primary m-r-5 m-b-5">Thêm học viên mới</a></li>
    </ol>
    <h1 class="page-header">Quản lý Học Viên <small>Vinanippon</small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @isset($hocviens)
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%" data-page-length='50'>
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
                        <tfoot>
                            <tr>
                                <th>Mã HV</th>
                                <th>Họ lót</th>
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
                        </tfoot>
                        @foreach ($hocviens as $hocvien)
                        <tr>
                            <td><a href="{{url('/hocvien/detail', ['id' => $hocvien->HocVienID])}}">{{ $hocvien->HocVienID }}</a></td>
                            <td><a href="{{url('/hocvien/detail', ['id' => $hocvien->HocVienID])}}">{{ $hocvien->HoLot }}</a></td>
                            <td><a href="{{url('/hocvien/detail', ['id' => $hocvien->HocVienID])}}">{{ $hocvien->Ten }}</a></td>
                            <td><a href="{{url('/hocvien/detail', ['id' => $hocvien->HocVienID])}}">{{ $hocvien->HoLot . ' ' . $hocvien->Ten }}</a></td>
                            <td>{{ Carbon\Carbon::parse($hocvien->NgaySinh)->format('d/m/Y') }}</td>
                            <td>{{ isset($congty[$hocvien->CongTyID]) ? $congty[$hocvien->CongTyID] : '' }}</td>
                            <td>{{ isset($khoahoc[$hocvien->KhoaHocID]) ? $khoahoc[$hocvien->KhoaHocID] : '' }}</td>
                            <td>{{ isset($lop[$hocvien->LopID]) ? $lop[$hocvien->LopID] : '' }}</td>
                            <td>{{ $gioiTinh[$hocvien->GioiTinh] }}</td>
                            <td>{{ $hocvien->ThonXa }}</td>
                            <td>{{ isset($chiNhanh[$hocvien->ChiNhanh]) ? $chiNhanh[$hocvien->ChiNhanh] : '' }}</td>
                            <td>{{ isset($huyen[$hocvien->HuyenID]) ? $huyen[$hocvien->HuyenID] : '' }}</td>
                            <td>{{ isset($tinh[$hocvien->TinhID]) ? $tinh[$hocvien->TinhID] : '' }}</td>
                            <td>{{ $hocvien->SDTNhaRieng }}</td>
                            <td>{{ $hocvien->SDTDiDong }}</td>
                            <td>{{ $hocvien->CMND }}</td>
                            <td>{{ Carbon\Carbon::parse($hocvien->NgayCapCMND)->format('d/m/Y') }}</td>
                            <td>{{ isset($tinh[$hocvien->NoiCapCMND]) ? $tinh[$hocvien->NoiCapCMND] : '' }}</td>
                            <td>{{ Carbon\Carbon::parse($hocvien->NgayNhapHoc)->format('d/m/Y')}}</td>
                            <td>{{ Carbon\Carbon::parse($hocvien->NgayKetThuc)->format('d/m/Y')}}</td>
                            <td>{{ $hocvien->GhiChu}}</td>
                            <td>{{Carbon\Carbon::parse($hocvien->NgayXuatCanh)->format('d/m/Y')}}</td>
                            <td>{{ isset($huyChuongTrinh[$hocvien->BoChuongTrinh]) ? $huyChuongTrinh[$hocvien->BoChuongTrinh] : ''}}</td>
                            <td>{{ isset($xuatCanh[$hocvien->XuatCanh]) ? $xuatCanh[$hocvien->XuatCanh] : ''}}</td>
                            <td>{{ $hocvien->DongTienLan1}}</td>
                            <td>{{ $hocvien->DongTienLan2}}</td>
                            <td>{{ $hocvien->DongTienLan3}}</td>
                            <td>{{ $hocvien->DongTienLan1 + $hocvien->DongTienLan2 + $hocvien->DongTienLan3 }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection