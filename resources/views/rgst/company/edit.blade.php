@extends('layouts.master')

@section('title', 'Company編集')

@section('stylesheet')
  <link rel="stylesheet" href="{{ asset('css/rgst/form.css') }}">
@endsection

@section('content')
<div class="bl_rgstForm_wrapper">
  <div class="bl_rgstForm">
    <form action="{{ action('CompanyController@edit')}}" method="post">
      {{ csrf_field() }}
      <input class="id" name="id" type="hidden" value="{{ $form->id }}">
      <label for="four_letter">4レター</label><input class="four_letter" name="four_letter" type="text" value="{{ $form->four_letter }}">
      @if ($errors->has('four_letter'))
      <div class="bl_rgstForm_err">{{ $errors->first('four_letter') }}</div>
      @endif
      <label for="company_form">会社形態</label>
      <select class="company_form" name="company_form">
        <option value="">----</option>
        <option value="株式会社(前株)" @if($form->company_form =='株式会社(前株)') selected  @endif>株式会社(前株)</option>
        <option value="株式会社(後株)" @if($form->company_form =='株式会社(後株)') selected  @endif>株式会社(後株)</option>
      </select>
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
      <label for="postcode">郵便番号</label><input class="postcode" name="postcode" type="text" value="{{ $form->postcode }}">
      @if ($errors->has('postcode'))
      <div class="bl_rgstForm_err">{{ $errors->first('postcode') }}</div>
      @endif
      <label for="address">住所</label><textarea class="address" name="address" value="{{ $form->address }}"></textarea>
      @if ($errors->has('address'))
      <div class="bl_rgstForm_err">{{ $errors->first('address') }}</div>
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
      <label for="incharge">担当者</label><input class="incharge" name="incharge" type="text" value="{{ $form->incharge }}">
      @if ($errors->has('incharge'))
      <div class="bl_rgstForm_err">{{ $errors->first('incharge') }}</div>
      @endif
      <label for="incharge_phone">担当者連絡先</label><input class="incharge_phone" name="incharge_phone" type="text" value="{{ $form->incharge_phone }}">
      @if ($errors->has('incharge_phone'))
      <div class="bl_rgstForm_err">{{ $errors->first('incharge_phone') }}</div>
      @endif
      <label for="remarks">備考</label><textarea class="remarks" name="remarks" value="{{ $form->remarks }}"></textarea>
      <label for="created_user_id">初回登録者</label><input class="created_user_id" name="created_user_id" type="number" value="{{ $form->created_user_id }}">
      <label for="updated_user_id">更新登録者</label><input class="updated_user_id" name="updated_user_id" type="number" value="{{ $form->updated_user_id }}">
      <div class="bl_btnUnit">
        <input class="el_btn" name="submit" type="submit" value="送信"><a class="el_btn" href="{{ action('CompanyController@index')}}">キャンセル</a>
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