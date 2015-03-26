@extends('layouts.rollcall_master')
@section('title') Add Record @stop
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
@if ($errors->has())
@foreach ($errors->all() as $error)
<div class='bg-danger alert'>{{ $error }}</div>
@endforeach
@endif
<h1><i class='fa fa-user'></i> 新增點名記錄</h1>
{{ Form::open(['role' => 'form', 'url' => 'admintool/rollcall']) }}

<div class='form-group'>
  <label class="desc" id="title2" for="Field2">
  日期
  </label><br>
  <span>
    <input id="Field2-1" name="Field2-1" type="text" class="field text" value="" size="2" maxlength="2" tabindex="2" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2-1">MM</label>
  </span>
  <span class="symbol">/</span>
  <span>
    <input id="Field2-2" name="Field2-2" type="text" class="field text" value="" size="2" maxlength="2" tabindex="3" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2-2">DD</label>
  </span>
  <span class="symbol">/</span>
  <span>
    <input id="Field2" name="Field2" type="text" class="field text" value="" size="4" maxlength="4" tabindex="4" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2">YYYY</label>
  </span>

  <span id="cal2">
    <img id="pick2" class="datepicker" src="https://knt.wufoo.com/images/icons/calendar.png" alt="Pick a date." data-date-format="yyyy-mm-dd"
                                       data-date="<?php echo date("Y-m-d H:i:s", strtotime('+12 hours')); ?>" />
  </span>
<br>
<!-- JavaScript -->
<script>
  __RULES = [];
  __ENTRY = [];
  __PRICES = null;
</script>

</div>
<div class='form-group'>
{{ Form::label('trainingtype', '參加訓練:') }}&nbsp&nbsp
{{ Form::label('trainingtype', '弟兄訓練') }}
{{ Form::radio('training', 'brothers_t') }}&nbsp&nbsp
{{ Form::label('trainingtype', '姊妹訓練') }}
{{ Form::radio('training', 'sisters_t') }}&nbsp&nbsp
{{ Form::label('trainingtype', '生命成全訓練') }}
{{ Form::radio('training', 'life_t') }}
</div>

<div class='form-group'>
{{ Form::label('username', '姓名') }}
{{ Form::text('username', null, ['placeholder' => '姓名', 'class' => 'form-control']) }}
</div>
<div class='form-group'>
{{ Form::label('training_st', '訓練狀態') }}&nbsp&nbsp
{{ Form::label('training_st', '準時') }}
{{ Form::radio('status', 'ontime') }}&nbsp&nbsp
{{ Form::label('training_st', '遲到') }}
{{ Form::radio('status', 'late') }}&nbsp&nbsp
{{ Form::label('training_st', '請假') }}
{{ Form::radio('status', 'leave') }}
</div>
<div class='form-group'>
{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}&nbsp
{{ Form::reset('Reset', ['class' => 'btn btn-danger']) }} 
</div>
{{ Form::close() }}
</div>
@stop
