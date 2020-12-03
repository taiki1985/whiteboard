{{-- @extends('layouts.register') --}}
@extends('layouts.master')

@section('title', 'Port一覧')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/index.css') }}">
@endsection

@section('content')
  {{-- <h1>@section('title', 'Port')</h1> --}}
  <div class="bl_rgstTable">
    <form action="{{ action('PortController@get_items')}}" method="post">
      {{ csrf_field() }}
      <div class="bl_btnUnit">
        <a class="el_btn" href="{{ action('PortController@add') }}">新規登録</a>
        <input class="el_btn" type="submit" value="一括選択">
      </div>
      <!-- /.bl_BtnUnit -->
      <table>
        <thead>
          <tr>
            <th></th>
            <th>{{-- 閲覧 --}}</th>
            <th>{{-- 変更 --}}</th>
            <th>名前</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
            <tr>
              <td><input class="checkbox" type="checkbox" name="{{ $item->id }}" value="{{ $item->id }}"></td>
              <td><a href="{{ action('PortController@delete', ['id' => $item->id ]) }}">[閲覧]</a></td>
              <td><a href="{{ action('PortController@edit', ['id' => $item->id ]) }}">[変更]</a></td>
              <td>{{ $item->name }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </form>
  </div>
  <!-- /.bl_rgstTable -->
@endsection
