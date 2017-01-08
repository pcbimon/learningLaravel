@extends('layout/app')
@section('content')
<ul>
  @foreach ($posts as $post)
    <div class="image-container">
      <img src="{{$post->path}}" alt="" width="200px" height="200px">
    </div>
    <li><a href="{!!route('post.show',$post->id)!!}">{{$post->title}}</a></li>
  @endforeach
</ul>

@endsection
@section('footer')

@endsection
