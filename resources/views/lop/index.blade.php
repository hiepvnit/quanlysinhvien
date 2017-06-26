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

            <a href="{{ route('lop_add') }}">Thêm lớp mới</a>

            <form class="form-horizontal" role="form" method="GET" action="{{ route('lop_index') }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <input id="lop_key" type="text" class="form-control" name="lop_key" value="{{ $lop_key }}" placeholder="Tìm lớp ...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tìm
                    </button>
                </div>
            </form>

            @isset($lops)
            {{ $lops->links() }}
            <table class="table table-bordered">
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
                    <td><a href="{{ url('/lop/edit', ['id' => $lop->LopID]) }}">Sửa</a> | <a href="{{ url('/lop/delete', ['id' => $lop->LopID]) }}">Xóa</a></td>
                </tr>
                @endforeach
            </table>
            {{ $lops->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
