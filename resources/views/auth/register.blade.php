@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="animated fadeInDown">
    <div class="content" id="content">
        <h1 class="page-header">Đăng ký </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-body">
                        <form class="" role="form" method="POST" action="{{ route('register.create') }}">
    <!--                        {{ csrf_field() }}-->

                            <div class="form-group col-md-6{{ $errors->has('ho_lot') ? ' has-error' : '' }}">
                                <label for="ho_lot">Họ lót <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="ho_lot" id="ho_lot" placeholder="Họ lót" value="{{ old('ho_lot') }}">
                                @if ($errors->has('ho_lot'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ho_lot') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Tên <span class="text-danger">(*)</span></label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Tên" value="{{ old('name') }}"autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="name">Tên đăng nhập <span class="text-danger">(*)</span></label>
                                <input id="username" type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail <span class="text-danger">(*)</span></label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('ngay_sinh') ? ' has-error' : '' }}">
                                <label for="ngay_sinh">Ngày sinh <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control datepicker" name="ngay_sinh" id="" placeholder="Ngày sinh" value="{{ old('ngay_sinh') }}">
                                @if ($errors->has('ngay_sinh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ngay_sinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('gioi_tinh') ? ' has-error' : '' }}">
                                <label for="gioi_tinh">Giới tính <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                                    <option value="">[Chọn giới tính]</option>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                                @if ($errors->has('gioi_tinh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gioi_tinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('thon_xa') ? ' has-error' : '' }}">
                                <label for="thon_xa">Thôn xã <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="thon_xa" id="" placeholder="Thôn xã" value="{{old('thon_xa')}}">
                                @if ($errors->has('thon_xa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thon_xa') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6{{ $errors->has('huyen') ? ' has-error' : '' }}">
                                <label for="huyen">Huyện <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="huyen" id="huyen">
                                    <option value="">[Chọn huyện]</option>
                                    @foreach ($huyens as $huyen)
                                        @if(old('huyen') == $huyen->HuyenID)
                                            <option value="{{$huyen->HuyenID}}" selected>{{$huyen->TenHuyen}}</option>
                                        @else
                                            <option value="{{$huyen->HuyenID}}">{{$huyen->TenHuyen}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('huyen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('huyen') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6{{ $errors->has('tinh') ? ' has-error' : '' }}">
                                <label for="tinh">Tỉnh <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="tinh" id="tinh">
                                    <option value="">[Chọn tỉnh]</option>
                                    @foreach ($tinhs as $tinh)
                                        @if(old('tinh') == $tinh->TinhID)
                                            <option value="{{$tinh->TinhID}}" selected>{{$tinh->TenTinh}}</option>
                                        @else
                                            <option value="{{$tinh->TinhID}}">{{$tinh->TenTinh}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('tinh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sdt_nharieng">SDT nhà riêng</label>
                                <input type="text" class="form-control" name="sdt_nharieng" id="sdt_nharieng" placeholder="SDT nhà riêng" value="{{old('sdt_nharieng')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sdt_didong">SDT di động</label>
                                <input type="text" class="form-control" name="sdt_didong" id="sdt_didong" placeholder="SDT di động" value="{{old('sdt_didong')}}">
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Mật khẩu <span class="text-danger">(*)</span></label>
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm">Xác nhận mật khẩu</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
