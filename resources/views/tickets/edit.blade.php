@extends('master')
@section('title', 'Edit a ticket')
@section('content')
<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">
<form class="form-horizontal" method="post">
@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<fieldset>
<legend>{!! trans('main.fedit_ticket') !!}</legend>
<div class="form-group">
<label for="title" class="col-lg-2 control-label">{!! trans('main.ftitle') !!}</label>
<div class="col-lg-10">
<input type="text" class="form-control" id="title" name="title" value="{!! $ticket->title !!}">
</div>
</div>
<div class="form-group">
<label for="content" class="col-lg-2 control-label">{!! trans('main.fcontent') !!}</label>
<div class="col-lg-10">
<textarea class="form-control" rows="3" id="content" name="content">{!! $ticket->content !!}</textarea>
</div>
</div>
<div class="form-group">
<div class="col-lg-10">
<label for="content" class="col-lg-2 control-label">{!! trans('main.fclose_ticket') !!}</label>
<input type="checkbox" name="status" {!! $ticket->status?"":"checked"!!}>
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
<button class="btn btn-default">{!! trans('main.cancel') !!}</button>
<button type="submit" class="btn btn-primary">{!! trans('main.fupdate') !!}</button>
</div>
</div>
</fieldset>
</form>
</div>
</div>
@endsection