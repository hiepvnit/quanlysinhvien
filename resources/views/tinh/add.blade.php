@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Thêm Tỉnh</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tinh.add') }}">
        <!--                {{ csrf_field() }}-->
                        <div class="form-group{{ $errors->has('ten_tinh') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tên Tỉnh</label>
                            <div class="col-md-9">
                                <input id="ten_tinh" type="text" class="form-control" name="ten_tinh" value="" autofocus placeholder="Thêm tỉnh mới ...">
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
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('tinh.index') }}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
