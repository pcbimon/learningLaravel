@extends('layout/app')
@section('content')
<form class="" action="/post" method="post">
  <input type="text" name="title" value="">
  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
  <input type="submit" name="submit" value="Submit">
</form>
@endsection
@section('footer')

@endsection
