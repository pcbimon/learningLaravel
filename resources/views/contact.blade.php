@extends('layout/app')
@section('content')
  <h1>Contact Page</h1>
  @if (count($people))
    @foreach ($people as $person)
        <li>{{$person}}</li>
    @endforeach
  @endif
@endsection
@section('footer')
  <script type="text/javascript">
    //alert('Hello visitor')
  </script>
@endsection
