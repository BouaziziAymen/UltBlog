@extends('master')
@section('title', 'Blog')
<style>
.written-by{
    font-size:9px;
    color: #001f3f;

}
</style>
@section('content')
<div class="container col-md-8 col-md-offset-2">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
@if ($posts->isEmpty())
<p> There is no post.</p>
@else
<?php $i = 0;?>
@foreach ($posts as $post)
<div class="panel panel-default">
<div class="panel-heading">
<a href="{!! action('BlogController@show', $post->slug) !!}">{!! $post->title !!}</a>
<p class="written-by"><em>Soumis par:</em><strong>{!! $users[$i++]->name !!}.</strong></p>
</div>


<div class="panel-body">
{!! mb_substr($post->content,0,500) !!}
</div>
</div>
@endforeach
@endif
</div>
@endsection