@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('tinh_add') }}" class="btn btn-primary m-r-5 m-b-5">Thêm tỉnh mới</a></li>
    </ol>
    <h1 class="page-header">Quản lý Tỉnh <small>thêm, xóa, sửa tỉnh</small></h1>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-body">

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @isset($tinhs)
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Mã Tỉnh</th>
                                <th>Tên Tỉnh</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        @foreach ($tinhs as $tinh)
                        <tr>
                            <td>{{ $tinh->TinhID }}</td>
                            <td>{{ $tinh->TenTinh }}</td>
                            <td><a href="{{ url('/tinh/edit', ['id' => $tinh->TinhID]) }}">Sửa</a> | <a href="{{ url('/tinh/delete', ['id' => $tinh->TinhID]) }}">Xóa</a></td>
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
