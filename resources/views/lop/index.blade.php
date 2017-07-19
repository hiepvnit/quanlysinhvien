@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('lop_add') }}" class="btn btn-primary m-r-5 m-b-5">Thêm lớp mới</a></li>
    </ol>
    <h1 class="page-header">Quản lý Lớp <small>thêm, xóa, sửa lớp</small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @isset($lops)
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Mã Lớp</th>
                                <th>Tên Lớp</th>
                                <th>Ghi Chú</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        @foreach ($lops as $lop)
                        <tr>
                            <td>{{ $lop->LopID }}</td>
                            <td>{{ $lop->TenLop }}</td>
                            <td>{{ $lop->GhiChu }}</td>
                            <td><a href="{{ url('/lop/edit', ['id' => $lop->LopID]) }}">Sửa</a> | <a href="{{ url('/lop/delete', ['id' => $lop->LopID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a></td>
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
