@extends('layouts.master')

@section('title', 'Airline編集')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/form.css') }}">
@endsection

@section('content')
  <div class="bl_rgstForm_wrapper">
    <div class="bl_rgstForm">
      <form action="{{ action('AirlineController@edit')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <label for="two_letter">2LT</label><input class="two_letter" name="two_letter" type="text" value="{{ $form->two_letter }}">
        @if ($errors->has('two_letter'))
        <div class="bl_rgstForm_err">{{ $errors->first('two_letter') }}</div>
        @endif
        <label for="name">名前</label><input class="name" name="name" type="text" value="{{ $form->name }}">
        @if ($errors->has('name'))
        <div class="bl_rgstForm_err">{{ $errors->first('name') }}</div>
        @endif
        <label for="name_ruby">名前(ふりがな)</label><input class="name_ruby" name="name_ruby" type="text" value="{{ $form->name_ruby }}">
        @if ($errors->has('name_ruby'))
        <div class="bl_rgstForm_err">{{ $errors->first('name_ruby') }}</div>
        @endif
        <label for="name_eng">名前(英語)</label><input class="name_eng" name="name_eng" type="text" value="{{ $form->name_eng }}">
        @if ($errors->has('name_eng'))
        <div class="bl_rgstForm_err">{{ $errors->first('name_eng') }}</div>
        @endif
        <label for="tel">電話番号</label><input class="tel" name="tel" type="text" value="{{ $form->tel }}">
        @if ($errors->has('tel'))
        <div class="bl_rgstForm_err">{{ $errors->first('tel') }}</div>
        @endif
        <label for="short_num">短縮</label><input class="short_num" name="short_num" type="text" value="{{ $form->short_num }}">
        @if ($errors->has('short_num'))
        <div class="bl_rgstForm_err">{{ $errors->first('short_num') }}</div>
        @endif
        <label for="fax">FAX番号</label><input class="fax" name="fax" type="text" value="{{ $form->fax }}">
        @if ($errors->has('fax'))
        <div class="bl_rgstForm_err">{{ $errors->first('fax') }}</div>
        @endif
        <label for="email">Eメール</label><input class="email" name="email" type="text" value="{{ $form->email }}">
        @if ($errors->has('email'))
        <div class="bl_rgstForm_err">{{ $errors->first('email') }}</div>
        @endif
        <label for="start">開始時間</label><input class="start" name="start" type="time" value="{{ $form->start }}">
        <label for="end">終了時間</label><input class="end" name="end" type="time" value="{{ $form->end }}">
        <label for="saturday">土曜日</label>
        <select class="saturday" name="saturday">
          <option value="">----</option>
          <option value="yes" @if($form->saturday == 'yes') selected  @endif>有</option>
          <option value="no" @if($form->saturday == 'no') selected  @endif>無</option>
        </select>
        <label for="sunday">日曜日</label>
        <select class="sunday" name="sunday">
          <option value="">----</option>
          <option value="yes" @if($form->sunday == 'yes') selected  @endif>有</option>
          <option value="no" @if($form->sunday == 'no') selected  @endif>無</option>
        </select>
        <label for="national_holiday">祝日</label>
        <select class="national_holiday" name="national_holiday">
          <option value="">----</option>
          <option value="yes" @if($form->national_holiday == 'yes') selected  @endif>有</option>
          <option value="no" @if($form->national_holiday == 'no') selected  @endif>無</option>
        </select>
        <label for="ok_board">OK TO BOARD</label>
        <select class="ok_board" name="ok_board">
          <option value="">----</option>
          <option value="yes" @if($form->ok_board =='yes') selected  @endif>要</option>
          <option value="no" @if($form->ok_board =='no') selected  @endif>不要</option>
        </select>
        <label for="immigration_notice">入管通報</label>
        <select class="immigration_notice" name="immigration_notice">
          <option value="">----</option>
          <option value="yes" @if($form->immigration_notice =='yes') selected  @endif>要</option>
          <option value="no" @if($form->immigration_notice =='no') selected  @endif>不要</option>
        </select>
        <label for="remarks">備考</label><textarea class="remarks" name="remarks" value="{{ $form->remarks }}"></textarea>
        <label for="created_user_id">初回登録者</label><input class="created_user_id" name="created_user_id" type="number" value="{{ $form->created_user_id }}">
        <label for="updated_user_id">更新登録者</label><input class="updated_user_id" name="updated_user_id" type="number" value="{{ $form->updated_user_id }}">
        <div class="bl_btnUnit">
          <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('AirlineController@index')}}">キャンセル</a>
        </div>
        <!-- /.bl_btnUnit -->
      </form>
    </div>
    <!-- /.bl_rgstForm -->
  </div>
  <!-- /.bl_rgstForm_wrapper -->
@endsection
</body>
</html>