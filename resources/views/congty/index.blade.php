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

            <a href="{{ route('congty_add') }}">Thêm công ty mới</a>

            <form class="form-horizontal" role="form" method="GET" action="{{ route('congty_index') }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <input id="congty_key" type="text" class="form-control" name="congty_key" value="{{ $congty_key }}" placeholder="Tìm công ty ...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tìm
                    </button>
                </div>
            </form>

            @isset($congtys)
            {{ $congtys->links() }}
            <table class="table table-bordered">
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
            {{ $congtys->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
