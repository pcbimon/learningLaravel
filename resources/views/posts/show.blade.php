@extends('layout/app')
@section('content')
<h1><a href="{!!route('post.edit',$post->id)!!}">{{$post->title}}</a></h1>
@endsection
@section('footer')

@endsection
