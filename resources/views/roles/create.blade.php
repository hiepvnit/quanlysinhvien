@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/common.js') }}"></script>
@endsection

@section('content')
<div class="animated fadeInDown">
    <div class="content" id="content">
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('roles.index') }}" class="btn btn-primary m-r-5 m-b-5">Quay về</a></li>
        </ol>
        <h1 class="page-header">Tạo mới nhóm</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Có lỗi xảy ra</strong><br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Tên nhóm:</strong>
                                    {!! Form::text('name_role', null, array('placeholder' => 'Tên nhóm','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Tên hiển thị:</strong>
                                    {!! Form::text('display_name', null, array('placeholder' => 'Tên hiển thị','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Mô tả:</strong>
                                    {!! Form::textarea('description', null, array('placeholder' => 'Mô tả','class' => 'form-control','style'=>'height:100px')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Quyền thực hiện: <input type="checkbox" name="checkall" id="checkall" onClick="check_uncheck_checkbox(this.checked);" />Chọn tất cả</div></strong>
                                    <br/>
                                    @foreach($permission as $value)
                                    <label class="col-md-3">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name permission')) }}
                                        {{ $value->display_name }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection