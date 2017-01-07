@extends('layout/app')
@section('content')
<h1>Edit Post</h1>
<form class="" action="/post/{{$post->id}}" method="post">

  <input type="hidden" name="_method" value="PUT">
  <input type="text" name="title" value="{{$post->title}}">
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
  <input type="submit" name="submit" value="Submit">
</form>
<form class="" action="/post/{{$post->id}}" method="post">
  <input type="hidden" name="_method" value="DELETE">
  <input type="submit" name="" value="Delete">
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
</form>
@endsection
@section('footer')

@endsection
