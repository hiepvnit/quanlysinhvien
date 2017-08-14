@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="login bg-black animated fadeInDown">

    <div class="login-header">
        <div class="brand">
            <span class="logo"></span> Vinanippon
            <small>quản lý học viên</small>
        </div>
        <div class="icon">
            <i class="fa fa-sign-in"></i>
        </div>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="login-content">
        <form class="margin-bottom-0" role="form" method="POST" action="{{ route('login') }}">
            <!--                        {{ csrf_field() }}-->

            <div class="form-group m-b-20{{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" type="text" class="form-control input-lg" name="username" value="{{ old('username') }}" placeholder="Tên đăng nhập">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group m-b-20{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Mật khẩu">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="checkbox m-b-20">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                </label>
            </div>

            <div class="login-buttons">
                <button type="submit" class="btn btn-success btn-block btn-lg">
                    Đăng nhập
                </button>
            </div>
            <div class="m-t-20">
                Chưa có tài khoản? Click vào <a href="{{ url('/register') }}" class="login_button">ĐÂY</a>
            </div>
        </form>
    </div>
</div>
@endsection
