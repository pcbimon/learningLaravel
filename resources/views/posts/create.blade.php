@extends('layout/app')
@section('content')
  <h1>Create Post</h1>
{{-- <form class="" action="/post" method="post"> --}}
{!! Form::open(['method'=>'POST','action'=>'PostController@store','files'=>true]) !!}



{!! csrf_field() !!}
<div class="form-group">
  {!! Form::label('title','Title') !!}
  {!! Form::text('title',null,['class'=>'form-control']) !!}
  {{-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> --}}
</div>
 {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
  {{-- <input type="text" name="title" value=""> --}}
  <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
      {!! Form::label('inputname', 'File :') !!}
      {!! Form::file('file', ['required' => 'required']) !!}
      <p class="help-block">Help block text</p>
      <small class="text-danger">{{ $errors->first('inputname') }}</small>
  </div>
{!! Form::close() !!}
{{-- error --}}
@if (count($errors)>0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
@endsection
@section('footer')

@endsection
