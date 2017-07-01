@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('congty_add') }}" class="btn btn-primary m-r-5 m-b-5">Thêm công ty tiếp nhận mới</a></li>
    </ol>
    <h1 class="page-header">Quản lý Cty Tiếp Nhận <small>thêm, xóa, sửa cty tiếp nhận</small></h1>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @isset($congtys)
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Mã Công Ty</th>
                                <th>Tên Công Ty Tiếp Nhận</th>
                                <th>Ghi Chú</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        @foreach ($congtys as $congty)
                        <tr>
                            <td>{{ $congty->CongTyID }}</td>
                            <td>{{ $congty->TenCongTy }}</td>
                            <td>{{ $congty->GhiChu }}</td>
                            <td><a href="{{ url('/congty/edit', ['id' => $congty->CongTyID]) }}">Sửa</a> | <a href="{{ url('/congty/delete', ['id' => $congty->CongTyID]) }}">Xóa</a></td>
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
