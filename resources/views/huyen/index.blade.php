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

            <a href="{{ route('huyen_add') }}">Thêm huyện mới</a>

            <form class="form-horizontal" role="form" method="GET" action="{{ route('huyen_index') }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <input id="search_huyen" type="text" class="form-control" name="search_huyen" value="{{ $search_huyen }}" placeholder="Tìm huyện ...">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tìm
                    </button>
                </div>
            </form>

            @isset($huyens)
            {{ $huyens->links() }}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã Huyện</th>
                        <th>Tên Huyện</th>
                        <th>Tỉnh</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                @foreach ($huyens as $huyen)
                <tr>
                    <td>{{ $huyen->HuyenID }}</td>
                    <td>{{ $huyen->TenHuyen }}</td>
                    <td>{{ isset($tinhDatas[$huyen->TinhID]) ? $tinhDatas[$huyen->TinhID] : '' }}</td>
                    <td><a href="{{ url('/huyen/edit', ['id' => $huyen->HuyenID]) }}">Sửa</a> | <a href="{{ url('/huyen/delete', ['id' => $huyen->HuyenID]) }}">Xóa</a></td>
                </tr>
                @endforeach
            </table>
            {{ $huyens->links() }}
            @endisset
        </div>
    </div>
</div>
@endsection
