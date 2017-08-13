@extends('layouts.app')

@section('content')
<div class="animated fadeInDown">
    <div class="content" id="content">
        <ol class="breadcrumb pull-right">
            @role('admin')
                <li><a href="{{ route('roles.create') }}" class="btn btn-primary m-r-5 m-b-5">Thêm nhóm</a></li>
            @endrole
        </ol>
        <h1 class="page-header">Quản lý nhóm tài khoản</h1>
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
                                <th>Tên nhóm</th>
                                <th>Tên hiển thị</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Xem</a>
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Sửa</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
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
{!! $roles->render() !!}
@endsection