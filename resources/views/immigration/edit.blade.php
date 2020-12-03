@extends('layouts.register')

@section('title', 'Immigration')

@section('form')
<table>
  <tbody>
    <form action="/immigration/edit" method="post">
      {{ csrf_field() }}
      <input class="id" name="id" type="hidden" value="{{ $form->id }}">
      <tr><th><label for="name_jpn">名前</label></th><td><input class="name_jpn" name="name_jpn" type="text" value="{{ $form->name_jpn }}"></td></tr>
      <tr><th><label for="name_eng">名前(英語)</label></th><td><input class="name_eng" name="name_eng" type="text" value="{{ $form->name_eng }}"></td></tr>
      <tr><th><label for="jurisdiction">管轄</label></th><td><input class="jurisdiction" name="jurisdiction" type="text" value="{{ $form->jurisdiction }}"></td></tr>
      <tr><th><label for="postcode">郵便番号</label></th><td><input class="postcode" name="postcode" type="text" value="{{ $form->postcode }}"></td></tr>
      <tr><th><label for="address">住所</label></th><td> <textarea class="address" name="address" value="{{ $form->address }}">{{ $form->address }}</textarea></td></tr>
      <tr><th><label for="tel">電話番号</label></th><td> <input class="tel" name="tel" type="text" value="{{ $form->tel }}"></td></tr>
      <tr><th><label for="short_num">短縮</label></th><td> <input class="short_num" name="short_num" type="text" value="{{ $form->short_num }}"></td></tr>
      <tr><th><label for="fax">FAX番号</label></th><td><input class="fax" name="fax" type="text" value="{{ $form->fax }}"></td></tr>
      <tr><th><label for="email">Eメール</label></th><td><input class="email" name="email" type="text" value="{{ $form->email }}"></td></tr>
      <tr><th><label for="remarks">備考</label></th><td> <textarea class="remarks" name="remarks" value="{{ $form->remarks }}">{{ $form->remarks }}</textarea></td></tr>
      <tr><th><label for="created_user_id">初回登録者</label></th><td><input class="created_user_id" name="created_user_id" type="number" value="{{ $form->created_user_id }}"></td></tr>
      <tr><th><label for="updated_user_id">更新登録者</label></th><td><input class="updated_user_id" name="updated_user_id" type="number" value="{{ $form->updated_user_id }}"></td></tr>
      <tr>
        <th></th>
        <td>
          <div class="send-cancel">
            <input class="btn submit" name="submit" type="submit" value="送信"><a class="btn cancel" href="#">キャンセル</a>
          </div>
        </td>
      </tr>
    </form>
  </tbody>
</table>    
@endsection
</body>
</html>