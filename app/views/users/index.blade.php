@extends('layouts.master')

@section('title') Users @stop

@section('content')
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> User Administration 
        <a href="/logout" class="btn btn-default pull-right">Logout</a>
        <a href="users/create" class="btn btn-success pull-right">Add User</a>
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>聖徒姓名</th>
                    <th>會所</th>
                    <th>大區</th>
                    <th>小區</th>
                    <th>悠遊卡號</th>
                    <th>弟兄訓練</th>
                    <th>姊妹訓練</th>
                    <th>生命成全訓練</th>
                    <th>編輯</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->hall}}</td>
                    <td>{{ $user->bgroup}}</td>
                    <td>{{ $user->sgroup}}</td>
                    <td>{{ $user->carduid}}</td>
                    <td>{{ $user->brothers_t}}</td>
                    <td>{{ $user->sisters_t}}</td>
                    <td>{{ $user->life_t}}</td>
                    <td>
                        <a href="users/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(array('route' => array('admintool.users.destroy', $user->id), 'method' => 'delete')) }}
                        {{ Form::submit('Delete', array('onclick' => "if(!confirm('請確認是否要刪除使用者?')){return false;};",
                           'class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop 
