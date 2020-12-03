{{-- @extends('layouts.register') --}}
@extends('layouts.master')

@section('title', 'Airport一覧')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/index.css') }}">
@endsection

@section('content')
  {{-- <h1>@section('title', 'Airport')</h1> --}}
  <div class="bl_rgstTable">
    <form action="{{ action('AirportController@get_items')}}" method="post">
      {{ csrf_field() }}
      <div class="bl_btnUnit">
        <a class="el_btn" href="{{ action('AirportController@add') }}">新規登録</a>
        <input class="el_btn" type="submit" value="一括選択">
      </div>
      <!-- /.bl_BtnUnit -->
      <table>
        <thead>
          <tr>
            <th></th>
            <th>{{-- 閲覧 --}}</th>
            <th>{{-- 変更 --}}</th>
            <th>3LT</th>
            <th>種類</th>
            <th>名前</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
            <tr>
              <td><input class="checkbox" type="checkbox" name="{{ $item->id }}" value="{{ $item->id }}"></td>
              <td><a href="{{ action('AirportController@delete', ['id' => $item->id ]) }}">[閲覧]</a></td>
              <td><a href="{{ action('AirportController@edit', ['id' => $item->id ]) }}">[変更]</a></td>
              <td>{{ $item->three_letter }}</td>
              <td>{{ $item->type }}</td>
              <td>{{ $item->name }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </form>
  </div>
  <!-- /.bl_rgstTable -->
@endsection
