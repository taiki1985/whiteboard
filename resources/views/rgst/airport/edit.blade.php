@extends('layouts.master')

@section('title', 'Airport編集')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/form.css') }}">
@endsection

@section('content')
  <div class="bl_rgstForm_wrapper">
    <div class="bl_rgstForm">
      <form action="{{ action('AirportController@edit')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <label for="type">国内外選択</label>
        <select class="type" name="type">
          <option value="">----</option>
          <option value="国内線" @if($form->type =='domestic') selected  @endif>国内線</option>
          <option value="国際線" @if($form->type =='international') selected  @endif>国際線</option>
        </select>
        <label for="three_letter">3LT</label><input class="three_letter" name="three_letter" type="text" value="{{ $form->three_letter }}">
        @if ($errors->has('three_letter'))
        <div class="bl_rgstForm_err">{{ $errors->first('three_letter') }}</div>
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
        <label for="remarks">備考</label><textarea class="remarks" name="remarks" value="{{ $form->remarks }}"></textarea>
        <label for="created_user_id">初回登録者</label><input class="created_user_id" name="created_user_id" type="number" value="{{ $form->created_user_id }}">
        <label for="updated_user_id">更新登録者</label><input class="updated_user_id" name="updated_user_id" type="number" value="{{ $form->updated_user_id }}">
        <div class="bl_btnUnit">
          <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('AirportController@index')}}">キャンセル</a>
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