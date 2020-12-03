@extends('layouts.register')

@section('title', 'Immigration')


@section('table')
  <div class="btn">
    <a href="/immigration/add">＋新規登録</a>
  </div>

  <form action="/immigration/get_items" method="post">
    {{ csrf_field() }}
    <input class="btn" type="submit" value="一括選択">
    <table>
      <thead>
        <tr>
          <th></th>
          <th>{{-- 閲覧 --}}</th>
          <th>{{-- 変更 --}}</th>
          <th>名前</th>
          <th>管轄</th>
          <th>郵便番号</th>
          <th>住所</th>
          <th>電話番号</th>
          <th>短縮番号</th>
          <th>FAX番号</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
          <tr>
            <td><input class="checkbox" type="checkbox" name="{{ $item->id }}" value="{{ $item->id }}"></td>
            <td><a href="/immigration/del?id={{ $item->id }}">[閲覧]</a></td>
            <td><a href="/immigration/edit?id={{ $item->id }}">[変更]</a></td>
            <td>{{ $item->name_jpn }}</td>
            <td>{{ $item->jurisdiction }}</td>
            <td>{{ $item->postcode }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->tel }}</td>
            <td>{{ $item->short_num }}</td>
            <td>{{ $item->fax }}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </form>
@endsection
