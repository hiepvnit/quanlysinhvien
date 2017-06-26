@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('tinh_add') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('ten_tinh') ? ' has-error' : '' }}">
                    <div class="col-md-9">
                        <input id="ten_tinh" type="text" class="form-control" name="ten_tinh" value="" autofocus placeholder="Thêm tỉnh mới ...">
                        @if ($errors->has('ten_tinh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ten_tinh') }}</strong>
                                </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Thêm
                    </button>
                </div>
            </form>
            <a href="{{ route('tinh_index') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection
