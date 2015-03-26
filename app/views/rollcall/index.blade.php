@extends('layouts.rollcall_master')

@section('title') RollCall @stop

@section('content')
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> RollCall Administration 
        <a href="/logout" class="btn btn-default pull-right">Logout</a>
        <a href="rollcall/create" class="btn btn-success pull-right">Add Record</a>
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>聖徒姓名</th>
                    <th>參訓日期</th>
                    <th>狀態</th>
                    <th>編輯</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rollcall as $record)
                <tr>
                    <td>{{ $record->username }}</td>
                    <td>{{ $record->record_date}}</td>
                    <td>{{ $record->record}}</td>
                    <td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop 
