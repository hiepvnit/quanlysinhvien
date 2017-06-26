@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('congty_update') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $congtyData['CongTyID'] }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <div class="{{ $errors->has('ten_congty') ? ' has-error' : '' }}">
                            <input id="ten_congty" type="text" class="form-control" name="ten_congty" value="{{ old('ten_congty', $congtyData['TenCongTy']) }}" autofocus>
                            @if ($errors->has('ten_congty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_congty') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <textarea id="ghi_chu" name="ghi_chu" class="form-control">{{ old('ghi_chu', $congtyData['GhiChu']) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Sửa
                    </button>
                </div>
            </form>
            <a href="{{ route('congty_index') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection
