@extends('ookawa1.layouts')

   <h1>OOKAWA1 SESSION</h1>
@section('content')

<p>{{$session_data}}</p>
   <form action="/ookawa1/session" method="post">
     {{ csrf_field() }}
    <input type="text" name="input"> 
    <input type="submit" value="send">
  </form>
@endsection

