@extends('layouts.master')

@section('title', 'Airline')

@section('content')

{{-- <form action="/rgst/immigration/export_csv" method="get"> --}}
<form action="{{ action('AirlineController@export_csv')}}" method="get">
  {{ csrf_field() }}
  <input class="el_btn" type="submit" value="CSV作成">
</form>
<table>
  <thead>
    <tr>
      <th>名前</th>
      <th>管轄</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->jurisdiction }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection