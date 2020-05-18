@extends('ookawa1.layouts')

<h1>ookawa1 sessionindex</h1>

<style>
  .pagination { font-size:10pt; }
  .pagination { display-size:inline-block }
</style>

@section('content')

<table>
<tr><th>Name</th><th>Mail</th><th>Age</th></tr>
@foreach($items as $item)
  <tr>
     <td>{{$item->name}}</td>
     <td>{{$item->mail}}</td>
     <td>{{$item->age}}</td>
  </tr>
@endforeach
</table>
{{ $items->links() }}

@endsection
