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
@endsection
@section('footer')

@endsection
