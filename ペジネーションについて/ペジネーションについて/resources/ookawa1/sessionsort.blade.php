@extends('ookawa1.layouts')


<h1>ookawa1 sessionsort</h1>

<style>
  .pagination { font-size:10pt; }
  .pagination { display-size:inline-block }
  tr th a:link { color :white ;}
  tr th a:visited { color:white; }
  tr th a:hover{ color:white; }
  tr th a:active{ color: white;}
</style>

@section('content')

<table>
<tr>
  <th><a href="/ookawa1/sessionsort?sort=name">name</a></th>
  <th><a href="/ookawa1/sessionsort?sort=mail">mail</a></th>
  <th><a href="/ookawa1/sessionsort?sort=age">age</a></th>
@foreach($items as $item)
  <tr>
     <td>{{$item->name}}</td>
     <td>{{$item->mail}}</td>
     <td>{{$item->age}}</td>
  </tr>
@endforeach
</table>
{{ $items->appends(['sort' => $sort])->links() }}

@endsection

