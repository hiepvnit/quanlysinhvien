@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Thêm lớp</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('lop.add') }}">
        <!--                {{ csrf_field() }}-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tên Lớp</label>
                            <div class="col-md-9">
                                <div class="{{ $errors->has('ten_lop') ? ' has-error' : '' }}">
                                    <input id="ten_lop" type="text" class="form-control" name="ten_lop" value="" autofocus placeholder="Thêm lớp mới ...">
                                    @if ($errors->has('ten_lop'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ten_lop') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ghi Chú</label>
                            <div class="col-md-9">
                                <textarea id="ghi_chu" name="ghi_chu" class="form-control" value="" placeholder="Ghi chú ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('lop.index') }}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
