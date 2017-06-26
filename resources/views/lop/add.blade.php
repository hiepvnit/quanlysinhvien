@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('lop_add') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <div class="{{ $errors->has('ten_lop') ? ' has-error' : '' }}">
                            <input id="ten_lop" type="text" class="form-control" name="ten_lop" value="" autofocus placeholder="Thêm lớp mới ...">
                            @if ($errors->has('ten_lop'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_lop') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <textarea id="ghi_chu" name="ghi_chu" class="form-control" value="" placeholder="Ghi chú ..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Thêm
                    </button>
                </div>
            </form>
            <a href="{{ route('lop_index') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection