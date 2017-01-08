@extends('layout/app')
@section('content')
<h1>Edit Post</h1>
{!! Form::model($post,(['method'=>'PUT','action'=>['PostController@update',$post->id]])) !!}
<div class="form-group">
  {!! Form::label('title','Title') !!}
  {!! Form::text('title',null,['class'=>'form-control']) !!}
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
  {!! Form::submit('UPDATE Post', ['class' => 'btn btn-info']) !!}
</div>
{!! Form::close() !!}
{!! Form::open(['method'=>'delete','action'=>['PostController@destroy',$post->id]]) !!}
<div class="form-group">
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
  {!! Form::submit('Delete', ['class' => 'btn btn-info']) !!}
</div>
{!! Form::close() !!}

{{-- <form class="" action="/post/{{$post->id}}" method="post">

  <input type="hidden" name="_method" value="PUT">
  <input type="text" name="title" value="{{$post->title}}">
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
  <input type="submit" name="submit" value="UPDATE">
</form>
<form class="" action="/post/{{$post->id}}" method="post">
  <input type="hidden" name="_method" value="DELETE">
  <input type="submit" name="" value="Delete">
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
</form> --}}
@endsection
@section('footer')

@endsection
