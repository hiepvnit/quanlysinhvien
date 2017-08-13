@extends('layouts.app')

@section('content')
<div class="animated fadeInDown">
    <div class="content" id="content">
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('roles.index') }}" class="btn btn-primary m-r-5 m-b-5">Quay về</a></li>
        </ol>
        <h1 class="page-header">Chi tiết</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Tên:</strong>
                                    {{ $role->display_name }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Mô tả:</strong>
                                    {{ $role->description }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Các thao tác được phép:</strong>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection