@extends('layouts.register')

@section('title', 'Immigration')


@section('table')

<form action="/immigration/export_csv" method="get">
  {{ csrf_field() }}
  <input class="btn" type="submit" value="CSV作成">
</form>

<table>
  <thead>
    <tr>
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
@endsection
