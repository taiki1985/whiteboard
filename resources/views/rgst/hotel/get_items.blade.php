@extends('layouts.master')

@section('title', 'Hotel')

@section('content')

{{-- <form action="/rgst/Hotel/export_csv" method="get"> --}}
<form action="{{ action('HotelController@export_csv')}}" method="get">
  {{ csrf_field() }}
  <input class="el_btn" type="submit" value="CSV作成">
</form>
<table>
  <thead>
    <tr>
      <th>名前</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection