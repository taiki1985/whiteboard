@extends('layouts.master')

@section('title', 'Airline削除')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/del.css') }}">
@endsection

@section('content')
  <div class="bl_rgstTable">
    <form action="{{ action('AirlineController@delete')}}" method="post">
      <table>
        <tbody>
            {{ csrf_field() }}
            <input class="id" name="id" type="hidden" value="{{ $form->id }}">
            <tr><th><label for="two_letter">2LT</label></th><td class="two_letter" name="two_letter" type="text">{{ $form->two_letter }}</td></tr>
            <tr><th><label for="name">名前</label></th><td class="name" name="name" type="text">{{ $form->name }}</td></tr>
            <tr><th><label for="name_ruby">名前(ふりがな)</label></th><td class="name_ruby" name="name_ruby" type="text">{{ $form->name_ruby }}</td></tr>
            <tr><th><label for="name_eng">名前(英語)</label></th><td class="name_eng" name="name_eng" type="text">{{ $form->name_eng }}</td></tr>
            <tr><th><label for="tel">電話番号</label></th><td class="tel" name="tel" type="text">{{ $form->tel }}</td></tr>
            <tr><th><label for="short_num">短縮</label></th><td class="short_num" name="short_num" type="text">{{ $form->short_num }}</td></tr>
            <tr><th><label for="fax">FAX番号</label></th><td class="fax" name="fax" type="text">{{ $form->fax }}</td></tr>
            <tr><th><label for="email">Eメール</label></th><td class="email" name="email" type="text">{{ $form->email }}</td></tr>
            <tr><th><label for="remarks">備考</label></th><td class="remarks" name="remarks">{{ $form->remarks }}</td></tr>
            <tr><th><label for="start">開始時間</label></th><td class="start" name="start">{{ $form->start }}</td></tr>
            <tr><th><label for="end">終了時間</label></th><td class="end" name="end">{{ $form->end }}</td></tr>
            <tr><th><label for="saturday">土曜日</label></th><td class="saturday" name="saturday">{{ $form->saturday }}</td></tr>
            <tr><th><label for="sunday">日曜日</label></th><td class="sunday" name="sunday">{{ $form->sunday }}</td></tr>
            <tr><th><label for="national_holiday">祝日</label></th><td class="national_holiday" name="national_holiday">{{ $form->national_holiday }}</td></tr>
            <tr><th><label for="ok_board">OK TO BOARD</label></th><td class="ok_board" name="ok_board">{{ $form->ok_board }}</td></tr>
            <tr><th><label for="immigration_notice">入管通報</label></th><td class="immigration_notice" name="immigration_notice">{{ $form->immigration_notice }}</td></tr>
            <tr><th><label for="created_user_id">初回登録者</label></th><td class="created_user_id" name="created_user_id" type="number">{{ $form->created_user_id }}</td></tr>
            <tr><th><label for="updated_user_id">更新登録者</label></th><td class="updated_user_id" name="updated_user_id" type="number">{{ $form->updated_user_id }}</td></tr>
            <tr><th><label for="created_at">初回登録日時</label></th><td class="created_at" name="created_at" type="number">{{ $form->created_at }}</td></tr>
            <tr><th><label for="updated_at">更新登録日時</label></th><td class="updated_at" name="updated_at" type="number">{{ $form->updated_at }}</td></tr>
          </tbody>
      </table>
      <div class="bl_btnUnit">
        <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('AirlineController@index')}}">キャンセル</a>
      </div>
      <!-- /.bl_btnUnit -->
    </form>
  </div>
  <!-- /.bl_rgstTable -->
@endsection


</body>
</html>