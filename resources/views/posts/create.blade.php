@extends('layout/app')
@section('content')
  <h1>Create Post</h1>
{{-- <form class="" action="/post" method="post"> --}}
{!! Form::open(['method'=>'POST','action'=>'PostController@store']) !!}
{!! csrf_field() !!}
<div class="form-group">
  {!! Form::label('title','Title') !!}
  {!! Form::text('title',null,['class'=>'form-control']) !!}
  {{-- <input type="hidden" name="_token" value="{!! csrf_token() !!}"> --}}
</div>
 {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
  {{-- <input type="text" name="title" value=""> --}}
{!! Form::close() !!}
@endsection
@section('footer')

@endsection
