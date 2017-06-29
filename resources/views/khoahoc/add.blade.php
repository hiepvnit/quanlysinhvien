@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('khoahoc_add') }}">
<!--                {{ csrf_field() }}-->
                <div class="form-group">
                    <div class="col-md-9">
                        <div class="{{ $errors->has('ten_khoahoc') ? ' has-error' : '' }}">
                            <input id="ten_khoahoc" type="text" class="form-control" name="ten_khoahoc" value="" autofocus placeholder="Thêm khóa học mới ...">
                            @if ($errors->has('ten_khoahoc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_khoahoc') }}</strong>
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
            <a href="{{ route('khoahoc_index') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection
