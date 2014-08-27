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
{{ Form::label('gender', 'B/S') }}<br>
{{ Form::label('gender', '弟兄') }}
{{ Form::radio('gender', 'B') }}&nbsp
{{ Form::label('gender', '姊妹') }}
{{ Form::radio('gender', 'S') }}
</div>
<div class='form-group'>
{{ Form::label('hall', '會所') }}&nbsp
{{ Form::select('hall', ['12'=>'12','36'=>'36','37'=>'37'], ['class' => 'field']) }}&nbsp
{{ Form::label('bgroup', '大區') }}&nbsp
{{ Form::select('bgroup', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','S'=>'學生'], ['class' => 'field']) }} &nbsp
{{ Form::label('sgroup', '小區') }}&nbsp
{{ Form::select('sgroup', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9'], ['class' => 'field']) }}
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
<a href='http://128.199.158.31/admintool/users'>{{ Form::button('Cancel', ['class' => 'btn btn-danger']) }} </a>
</div>
{{ Form::close() }}
</div>
@stop
