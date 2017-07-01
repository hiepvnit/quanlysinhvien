<style>
    .pace-top .pace-progress,.pace-top .pace:before{top:0}
    .pace-top .pace .pace-activity{top:11px}
</style>
@extends('layouts.app')

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

    <div class="login-content">
        <form class="margin-bottom-0" role="form" method="POST" action="{{ route('login') }}">
            <!--                        {{ csrf_field() }}-->

            <div class="form-group m-b-20{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required placeholder="Địa chỉ email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
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
                <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                    Lấy lại mật khẩu?
                </a>-->
            </div>
        </form>
    </div>
</div>
@endsection
