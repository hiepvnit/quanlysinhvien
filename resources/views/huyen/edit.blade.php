@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Sửa huyện</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('huyen_update') }}">
        <!--                {{ csrf_field() }}-->
                        <input type="hidden" name="id" value="{{ $huyenData['HuyenID'] }}">
                        <div class="form-group{{ $errors->has('ten_huyen') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tên Huyện</label>
                            <div class="col-md-9">
                                <input id="ten_huyen" type="text" class="form-control" name="ten_huyen" value="{{ old('ten_huyen', $huyenData['TenHuyen']) }}" autofocus>
                                @if ($errors->has('ten_huyen'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ten_huyen') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ten_tinh') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tên Tỉnh</label>
                            <div class="col-md-9">
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
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Sửa
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('huyen_index') }}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
