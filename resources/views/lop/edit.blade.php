@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('lop_update') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $lopData['LopID'] }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <div class="{{ $errors->has('ten_lop') ? ' has-error' : '' }}">
                            <input id="ten_lop" type="text" class="form-control" name="ten_lop" value="{{ old('ten_lop', $lopData['TenLop']) }}" autofocus>
                            @if ($errors->has('ten_lop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_lop') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <textarea id="ghi_chu" name="ghi_chu" class="form-control">{{ old('ghi_chu', $lopData['GhiChu']) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Sửa
                    </button>
                </div>
            </form>
            <a href="{{ route('lop_index') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection
