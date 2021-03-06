@extends('layouts.master')

@section('title', 'Country削除')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/del.css') }}">
@endsection

@section('content')
  <div class="bl_rgstTable">
    <form action="{{ action('CountryController@delete')}}" method="post">
      <table>
        <tbody>
            {{ csrf_field() }}
            <input class="id" name="id" type="hidden" value="{{ $form->id }}">
            <tr><th><label for="name">名前</label></th><td class="name" name="name" type="text">{{ $form->name }}</td></tr>
            <tr><th><label for="name_eng">名前(英語)</label></th><td class="name_eng" name="name_eng" type="text">{{ $form->name_eng }}</td></tr>
            <tr><th><label for="two_letter">国コード(2桁)</label></th><td class="two_letter" name="two_letter" type="text">{{ $form->two_letter }}</td></tr>
            <tr><th><label for="three_letter">国コード(3桁)</label></th><td class="three_letter" name="three_letter" type="text">{{ $form->three_letter }}</td></tr>
            <tr><th><label for="remarks">備考</label></th><td class="remarks" name="remarks">{{ $form->remarks }}</td></tr>
            <tr><th><label for="created_user_id">初回登録者</label></th><td class="created_user_id" name="created_user_id" type="number">{{ $form->created_user_id }}</td></tr>
            <tr><th><label for="updated_user_id">更新登録者</label></th><td class="updated_user_id" name="updated_user_id" type="number">{{ $form->updated_user_id }}</td></tr>
            <tr><th><label for="created_at">初回登録日時</label></th><td class="created_at" name="created_at" type="number">{{ $form->created_at }}</td></tr>
            <tr><th><label for="updated_at">更新登録日時</label></th><td class="updated_at" name="updated_at" type="number">{{ $form->updated_at }}</td></tr>
          </tbody>
      </table>
      <div class="bl_btnUnit">
        <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('CountryController@index')}}">キャンセル</a>
      </div>
      <!-- /.bl_btnUnit -->
    </form>
  </div>
  <!-- /.bl_rgstTable -->
@endsection


</body>
</html>