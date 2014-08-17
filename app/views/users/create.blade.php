@extends('layouts.master')
@section('title') Create User @stop
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
@if ($errors->has())
@foreach ($errors->all() as $error)
<div class='bg-danger alert'>{{ $error }}</div>
@endforeach
@endif
<h1><i class='fa fa-user'></i> Add User</h1>
{{ Form::open(['role' => 'form', 'url' => 'admintool/users']) }}
<div class='form-group'>
{{ Form::label('username', '姓名') }}
{{ Form::text('username', null, ['placeholder' => '姓名', 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('hall', '會所') }}
{{ Form::text('hall', null, ['placeholder' => '會所 ', 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('bgroup', '大區') }}
{{ Form::text('bgroup', null, ['placeholder' => '大區', 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('sgroup', '小區') }}
{{ Form::text('sgroup', null, ['placeholder' => '小區', 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('trainingtype', '參加訓練:') }}&nbsp&nbsp
{{ Form::label('trainingtype', '弟兄訓練') }}
{{ Form::checkbox('brothers_t', '1', false) }}&nbsp&nbsp
{{ Form::label('trainingtype', '姊妹訓練') }}
{{ Form::checkbox('sisters_t', '1', false ) }}&nbsp&nbsp
{{ Form::label('trainingtype', '生命成全訓練') }}
{{ Form::checkbox('life_t', '1', false ) }}
</div>
<div class='form-group'>
{{ Form::label('carduid', '悠遊卡號') }}
{{ Form::text('carduid', null, ['placeholder' => '悠遊卡號', 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}&nbsp
{{ Form::reset('Reset', ['class' => 'btn btn-danger']) }} 
</div>
{{ Form::close() }}
</div>
@stop
