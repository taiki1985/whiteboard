@extends('layouts.master')

@section('title', 'Immigration作成')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/form.css') }}">
@endsection

@section('content')
  <div class="bl_rgstForm_wrapper">
    <div class="bl_rgstForm">
      <form action="{{ action('ImmigrationController@add')}}" method="post">
        {{ csrf_field() }}
        <label for="name">名前</label><input class="name" name="name" type="text" value="{{ old('name') }}">
        @if ($errors->has('name'))
        <div class="bl_rgstForm_err">{{ $errors->first('name') }}</div>
        @endif
        <label for="name_ruby">名前(ふりがな)</label><input class="name_ruby" name="name_ruby" type="text" value="{{ old('name_ruby') }}">
        @if ($errors->has('name_ruby'))
        <div class="bl_rgstForm_err">{{ $errors->first('name_ruby') }}</div>
        @endif
        <label for="name_eng">名前(英語)</label><input class="name_eng" name="name_eng" type="text" value="{{ old('name_eng') }}">
        @if ($errors->has('name_eng'))
        <div class="bl_rgstForm_err">{{ $errors->first('name_eng') }}</div>
        @endif
        <label for="jurisdiction">管轄</label><input class="jurisdiction" name="jurisdiction" type="text" value="{{ old('jurisdiction') }}">
        @if ($errors->has('name'))
        <div class="bl_rgstForm_err">{{ $errors->first('jurisdiction') }}</div>
        @endif
        <label for="postcode">郵便番号</label><input class="postcode" name="postcode" type="text" value="{{ old('postcode') }}">
        @if ($errors->has('postcode'))
        <div class="bl_rgstForm_err">{{ $errors->first('postcode') }}</div>
        @endif
        <label for="address">住所</label><textarea class="address" name="address" value="{{ old('address') }}"></textarea>
        @if ($errors->has('address'))
        <div class="bl_rgstForm_err">{{ $errors->first('address') }}</div>
        @endif
        <label for="tel">電話番号</label><input class="tel" name="tel" type="text" value="{{ old('tel') }}">
        @if ($errors->has('tel'))
        <div class="bl_rgstForm_err">{{ $errors->first('tel') }}</div>
        @endif
        <label for="short_num">短縮</label><input class="short_num" name="short_num" type="text" value="{{ old('short_num') }}">
        @if ($errors->has('short_num'))
        <div class="bl_rgstForm_err">{{ $errors->first('short_num') }}</div>
        @endif
        <label for="fax">FAX番号</label><input class="fax" name="fax" type="text" value="{{ old('fax') }}">
        @if ($errors->has('fax'))
        <div class="bl_rgstForm_err">{{ $errors->first('fax') }}</div>
        @endif
        <label for="email">Eメール</label><input class="email" name="email" type="text" value="{{ old('email') }}">
        @if ($errors->has('email'))
        <div class="bl_rgstForm_err">{{ $errors->first('email') }}</div>
        @endif
        <label for="remarks">備考</label><textarea class="remarks" name="remarks" value="{{ old('remarks') }}"></textarea>
        <label for="created_user_id">初回登録者</label><input class="created_user_id" name="created_user_id" type="number" value="{{ old('created_user_id') }}">
        <label for="updated_user_id">更新登録者</label><input class="updated_user_id" name="updated_user_id" type="number" value="{{ old('updated_user_id') }}">
        <div class="bl_btnUnit">
          <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('ImmigrationController@index')}}">キャンセル</a>
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