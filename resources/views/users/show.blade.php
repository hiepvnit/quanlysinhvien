@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="animated fadeInDown">
    <div class="content" id="content">
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('users.index') }}" class="btn btn-primary m-r-5 m-b-5">Quay lại</a></li>
        </ol>
        <h1 class="page-header">Chi tiết user</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Họ tên:</strong>
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quyền:</strong>
                                @if(!empty($user->roles))
                                @foreach($user->roles as $v)
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
@endsection