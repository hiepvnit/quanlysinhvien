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

            <a href="{{ route('tinh_add') }}">Thêm tỉnh mới</a>

            <form class="form-horizontal" role="form" method="GET" action="{{ route('tinh_index') }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <input id="tinh_key" type="text" class="form-control" name="tinh_key" value="{{ $tinh_key }}" placeholder="Tìm tỉnh ...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tìm
                    </button>
                </div>
            </form>

            @isset($tinhs)
            {{ $tinhs->links() }}
            <table class="table table-bordered">
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
            {{ $tinhs->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
