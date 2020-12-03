@extends('layouts.master')

@section('title', 'Airport削除')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/del.css') }}">
@endsection

@section('content')
  <div class="bl_rgstTable">
    <form action="{{ action('AirportController@delete')}}" method="post">
      <table>
        <tbody>
            {{ csrf_field() }}
            <input class="id" name="id" type="hidden" value="{{ $form->id }}">
            <tr><th><label for="type">国内外選択</label></th><td class="type" name="type" type="type">{{ $form->three_letter }}</td></tr>
            <tr><th><label for="three_letter">3LT</label></th><td class="three_letter" name="three_letter" type="three_letter">{{ $form->three_letter }}</td></tr>
            <tr><th><label for="name">名前</label></th><td class="name" name="name" type="text">{{ $form->name }}</td></tr>
            <tr><th><label for="name_ruby">名前(ふりがな)</label></th><td class="name_ruby" name="name_ruby" type="text">{{ $form->name_ruby }}</td></tr>
            <tr><th><label for="name_eng">名前(英語)</label></th><td class="name_eng" name="name_eng" type="text">{{ $form->name_eng }}</td></tr>
            <tr><th><label for="remarks">備考</label></th><td class="remarks" name="remarks">{{ $form->remarks }}</td></tr>
            <tr><th><label for="created_user_id">初回登録者</label></th><td class="created_user_id" name="created_user_id" type="number">{{ $form->created_user_id }}</td></tr>
            <tr><th><label for="updated_user_id">更新登録者</label></th><td class="updated_user_id" name="updated_user_id" type="number">{{ $form->updated_user_id }}</td></tr>
            <tr><th><label for="created_at">初回登録日時</label></th><td class="created_at" name="created_at" type="number">{{ $form->created_at }}</td></tr>
            <tr><th><label for="updated_at">更新登録日時</label></th><td class="updated_at" name="updated_at" type="number">{{ $form->updated_at }}</td></tr>
          </tbody>
      </table>
      <div class="bl_btnUnit">
        <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('AirportController@index')}}">キャンセル</a>
      </div>
      <!-- /.bl_btnUnit -->
    </form>
  </div>
  <!-- /.bl_rgstTable -->
@endsection


</body>
</html>