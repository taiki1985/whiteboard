@extends('layouts.master')

@section('title', 'Hotel削除')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/del.css') }}">
@endsection

@section('content')
  <div class="bl_rgstTable">
    <form action="{{ action('HotelController@delete')}}" method="post">
      <table>
        <tbody>
            {{ csrf_field() }}
            <input class="id" name="id" type="hidden" value="{{ $form->id }}">
            <tr><th><label for="name">名前</label></th><td class="name" name="name" type="text">{{ $form->name }}</td></tr>
            <tr><th><label for="name_ruby">名前(ふりがな)</label></th><td class="name_ruby" name="name_ruby" type="text">{{ $form->name_ruby }}</td></tr>
            <tr><th><label for="name_eng">名前(英語)</label></th><td class="name_eng" name="name_eng" type="text">{{ $form->name_eng }}</td></tr>
            <tr><th><label for="postcode">郵便番号</label></th><td class="postcode" name="postcode" type="text">{{ $form->postcode }}</td></tr>
            <tr><th><label for="address">住所</label></th><td class="address" name="address">{{ $form->address }}</td></tr>
            <tr><th><label for="address_eng">住所(英語)</label></th><td class="address_eng" name="address_eng">{{ $form->address_eng }}</td></tr>
            <tr><th><label for="tel">電話番号</label></th><td class="tel" name="tel" type="text">{{ $form->tel }}</td></tr>
            <tr><th><label for="short_num">短縮</label></th><td class="short_num" name="short_num" type="text">{{ $form->short_num }}</td></tr>
            <tr><th><label for="fax">FAX番号</label></th><td class="fax" name="fax" type="text">{{ $form->fax }}</td></tr>
            <tr><th><label for="email">Eメール</label></th><td class="email" name="email" type="text">{{ $form->email }}</td></tr>
            <tr><th><label for="web">WEB</label></th><td class="web" name="web" type="text">{{ $form->web }}</td></tr>
            <tr><th><label for="check_in">チェックイン</label></th><td class="check_in" name="check_in" type="text">{{ $form->check_in }}</td></tr>
            <tr><th><label for="check_out">チェックアウト</label></th><td class="check_out" name="check_out" type="text">{{ $form->check_out }}</td></tr>
            <tr><th><label for="remarks">備考</label></th><td class="remarks" name="remarks">{{ $form->remarks }}</td></tr>
            <tr><th><label for="created_user_id">初回登録者</label></th><td class="created_user_id" name="created_user_id" type="number">{{ $form->created_user_id }}</td></tr>
            <tr><th><label for="updated_user_id">更新登録者</label></th><td class="updated_user_id" name="updated_user_id" type="number">{{ $form->updated_user_id }}</td></tr>
            <tr><th><label for="created_at">初回登録日時</label></th><td class="created_at" name="created_at" type="number">{{ $form->created_at }}</td></tr>
            <tr><th><label for="updated_at">更新登録日時</label></th><td class="updated_at" name="updated_at" type="number">{{ $form->updated_at }}</td></tr>
          </tbody>
      </table>
      <div class="bl_btnUnit">
        <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('HotelController@index')}}">キャンセル</a>
      </div>
      <!-- /.bl_btnUnit -->
    </form>
  </div>
  <!-- /.bl_rgstTable -->
@endsection


</body>
</html>