@extends('layouts.master')

@section('title', 'Rank編集')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/form.css') }}">
@endsection

@section('content')
  <div class="bl_rgstForm_wrapper">
    <div class="bl_rgstForm">
      <form action="{{ action('RankController@edit')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $form->id }}">
        <label for="name">ランク名前</label><input class="name" name="name" type="text" value="{{ $form->name }}">
        @if ($errors->has('name'))
        <div class="bl_rgstForm_err">{{ $errors->first('name') }}</div>
        @endif
        <label for="name_srt">ランク名前(略語)</label><input class="name_srt" name="name_srt" type="text" value="{{ $form->name_srt }}">
        @if ($errors->has('name_srt'))
        <div class="bl_rgstForm_err">{{ $errors->first('name_srt') }}</div>
        @endif
        <label for="created_user_id">初回登録者</label><input class="created_user_id" name="created_user_id" type="number" value="{{ $form->created_user_id }}">
        <label for="updated_user_id">更新登録者</label><input class="updated_user_id" name="updated_user_id" type="number" value="{{ $form->updated_user_id }}">
        <div class="bl_btnUnit">
          <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('RankController@index')}}">キャンセル</a>
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