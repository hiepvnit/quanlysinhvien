@extends('layouts.app')

@section('content')
<div class="content" id="content">
    <h1 class="page-header">Thêm học viên</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('hocvien_add') }}">
                        <!--                {{ csrf_field() }}-->
                        <div class="form-group">
                            <div class="col-md-3">
                                <input type="file" name="hocvien_thumb" accept="image/*">
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-6">
                                    <label class="col-md-3 control-label">Họ Lót</label>
                                    <div class="col-md-9">
                                        <input id="ho_lot" type="text" class="form-control" name="ho_lot" value="{{ old('ho_lot') }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-3 control-label">Tên</label>
                                    <div class="col-md-9">
                                        <input id="ten" type="text" class="form-control" name="ten" value="{{ old('ten') }}" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Họ và Tên</label>
                            <div class="col-md-9">
                                <input id="ho_va_ten" type="text" class="form-control" name="ho_va_ten" value="{{ old('ho_va_ten') }}" autofocus>
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
                    <a href="{{ route('hocvien_index') }}">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
