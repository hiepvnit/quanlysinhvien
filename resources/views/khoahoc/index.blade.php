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

            <a href="{{ route('khoahoc_add') }}">Thêm khóa học mới</a>

            <form class="form-horizontal" role="form" method="GET" action="{{ route('khoahoc_index') }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <input id="khoahoc_key" type="text" class="form-control" name="khoahoc_key" value="{{ $khoahoc_key }}" placeholder="Tìm khóa học ...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tìm
                    </button>
                </div>
            </form>

            @isset($khoahocs)
            {{ $khoahocs->links() }}
            <table class="table table-bordered">
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
            {{ $khoahocs->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
