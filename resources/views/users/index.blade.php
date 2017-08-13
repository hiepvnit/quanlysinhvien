@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="animated fadeInDown">
    <div class="content" id="content">
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('users.create') }}" class="btn btn-primary m-r-5 m-b-5">Thêm users mới</a></li>
        </ol>
        <h1 class="page-header">Quản lý users</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            @foreach ($data as $key => $user)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->roles))
                                        @foreach($user->roles as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td> {{ ($user->public_flg == 1) ? 'Hoạt động' : 'Chờ duyệt' }} </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Xem</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Sửa</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! $data->render() !!}
@endsection