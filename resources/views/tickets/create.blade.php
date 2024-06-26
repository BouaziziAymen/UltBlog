@extends('master')
@section('title', 'Contact')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">
<form class="form-horizontal" method="post">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

<fieldset>
<legend>{!! trans('main.ticket') !!}</legend>
<div class="form-group">
<label for="title" class="col-lg-2 control-label">{!! trans('main.ftitle') !!}</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="title" placeholder="Title"  name="title">
</div>
</div>
<div class="form-group">
<label for="content" class="col-lg-2 control-label">{!! trans('main.fcontent') !!}</label>
<div class="col-lg-10">
<textarea class="form-control" rows="3" id="content"  name="content"></textarea>
<span class="help-block">Feel free to ask us any question.</span>
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button class="btn btn-default">{!! trans('main.cancel') !!}</button>
<button type="submit" class="btn btn-primary">{!! trans('main.submit') !!}</button>
</div>
</div>
</fieldset>
</form>
</div>
</div>
@endsection