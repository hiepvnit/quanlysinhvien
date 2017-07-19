@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('huyen_add') }}" class="btn btn-primary m-r-5 m-b-5">Thêm huyện mới</a></li>
    </ol>
    <h1 class="page-header">Quản lý Huyện <small>thêm, xóa, sửa huyện</small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @isset($huyens)
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Mã Huyện</th>
                                <th>Tên Huyện</th>
                                <th>Tỉnh</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($huyens as $huyen)
                            <tr>
                                <td>{{ $huyen->HuyenID }}</td>
                                <td>{{ $huyen->TenHuyen }}</td>
                                <td>{{ isset($tinhDatas[$huyen->TinhID]) ? $tinhDatas[$huyen->TinhID] : '' }}</td>
                                <td><a href="{{ url('/huyen/edit', ['id' => $huyen->HuyenID]) }}">Sửa</a> | <a href="{{ url('/huyen/delete', ['id' => $huyen->HuyenID]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
