@extends('layouts.master')
@section('title') Create User @stop
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
@if ($errors->has())
@foreach ($errors->all() as $error)
<div class='bg-danger alert'>{{ $error }}</div>
@endforeach
@endif
<h1><i class='fa fa-user'></i> Edit User</h1>
{{ Form::model($user, ['role' => 'form', 'url' => 'admintool/users/' . $user->id, 'method' => 'PUT']) }} 
<div class='form-group'>
{{ Form::label('username', '姓名') }}
{{ Form::text('username', null, ['placeholder' => $user->username, 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('hall', '會所') }}
{{ Form::text('hall', null, ['placeholder' => $user->hall, 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('bgroup', '大區') }}
{{ Form::text('bgroup', null, ['placeholder' => $user->bgroup, 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('sgroup', '小區') }}
{{ Form::text('sgroup', null, ['placeholder' => $user->sgroup, 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('trainingtype', '參加訓練:') }}&nbsp&nbsp
{{ Form::label('trainingtype', '弟兄訓練') }}
@if ($user->brothers_t == '1')
{{ Form::checkbox('brothers_t', '1', true) }}&nbsp&nbsp
@else
{{ Form::checkbox('brothers_t', '1', false) }}&nbsp&nbsp
@endif
{{ Form::label('trainingtype', '姊妹訓練') }}
@if ($user->sisters_t == '1')
{{ Form::checkbox('sisters_t', '1', true) }}&nbsp&nbsp
@else
{{ Form::checkbox('sisters_t', '1', false ) }}&nbsp&nbsp
@endif
{{ Form::label('trainingtype', '生命成全訓練') }}
@if ($user->life_t == '1')
{{ Form::checkbox('life_t', '1', true) }}
@else
{{ Form::checkbox('life_t', '1', false ) }}
@endif
</div>
<div class='form-group'>
{{ Form::label('carduid', '悠遊卡號') }}
{{ Form::text('carduid', null, ['placeholder' => $user->carduid, 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}&nbsp
</div>
{{ Form::close() }}
</div>
@stop
