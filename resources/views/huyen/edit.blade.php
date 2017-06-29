@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('huyen_update') }}">
<!--                {{ csrf_field() }}-->
                <input type="hidden" name="id" value="{{ $huyenData['HuyenID'] }}">
                <div class="form-group">
                    <div class="col-md-9">
                        <div class="form-group{{ $errors->has('ten_huyen') ? ' has-error' : '' }}">
                            <input id="ten_huyen" type="text" class="form-control" name="ten_huyen" value="{{ old('ten_huyen', $huyenData['TenHuyen']) }}" autofocus>
                            @if ($errors->has('ten_huyen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_huyen') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('ten_tinh') ? ' has-error' : '' }}">
                            @if(isset($tinhDatas))
                            <select name="ten_tinh" class="form-control">
                                <option value="">-- Chọn tỉnh --</option>
                                @foreach($tinhDatas as $tinhData)
                                    <option value="{{ $tinhData['TinhID'] }}" @if($huyenData['TinhID'] == $tinhData['TinhID']) selected="selected" @endif>{{ $tinhData['TenTinh'] }}</option>
                                @endforeach
                            </select>
                            @endif
                            @if ($errors->has('ten_tinh'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ten_tinh') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    &nbsp;<button type="submit" class="btn btn-primary">
                        Sửa
                    </button>
                </div>
            </form>
            <a href="{{ route('huyen_index') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection
