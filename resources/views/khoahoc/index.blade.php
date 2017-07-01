@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('khoahoc_add') }}" class="btn btn-primary m-r-5 m-b-5">Thêm khóa học mới</a></li>
    </ol>
    <h1 class="page-header">Quản lý Khóa Học <small>thêm, xóa, sửa khóa học</small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @isset($khoahocs)
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Mã Khóa Học</th>
                                <th>Tên Khóa Học</th>
                                <th>Ghi Chú</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        @foreach ($khoahocs as $khoahoc)
                        <tr>
                            <td>{{ $khoahoc->KhoaHocID }}</td>
                            <td>{{ $khoahoc->TenKhoaHoc }}</td>
                            <td>{{ $khoahoc->GhiChu }}</td>
                            <td><a href="{{ url('/khoahoc/edit', ['id' => $khoahoc->KhoaHocID]) }}">Sửa</a> | <a href="{{ url('/khoahoc/delete', ['id' => $khoahoc->KhoaHocID]) }}">Xóa</a></td>
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
