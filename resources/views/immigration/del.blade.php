@extends('layouts.register')

@section('title', 'Immigration')

@section('form')
<table>
  <tbody>
    <form action="/immigration/del" method="post">
      {{ csrf_field() }}
      <input class="id" name="id" type="hidden" value="{{ $form->id }}">
      <tr><th><label for="name_jpn">名前</label></th><td class="name_jpn" name="name_jpn" type="text">{{ $form->name_jpn }}</td></tr>
      <tr><th><label for="name_eng">名前(英語)</label></th><td class="name_eng" name="name_eng" type="text">{{ $form->name_eng }}</td></tr>
      <tr><th><label for="jurisdiction">管轄</label></th><td class="jurisdiction" name="jurisdiction" type="text">{{ $form->jurisdiction }}</td></tr>
      <tr><th><label for="postcode">郵便番号</label></th><td class="postcode" name="postcode" type="text">{{ $form->postcode }}</td></tr>
      <tr><th><label for="address">住所</label></th><td class="address" name="address">{{ $form->address }}</td></tr>
      <tr><th><label for="tel">電話番号</label></th><td class="tel" name="tel" type="text">{{ $form->tel }}</td></tr>
      <tr><th><label for="short_num">短縮</label></th><td class="short_num" name="short_num" type="text">{{ $form->short_num }}</td></tr>
      <tr><th><label for="fax">FAX番号</label></th><td class="fax" name="fax" type="text">{{ $form->fax }}</td></tr>
      <tr><th><label for="email">Eメール</label></th><td class="email" name="email" type="text">{{ $form->email }}</td></tr>
      <tr><th><label for="remarks">備考</label></th><td class="remarks" name="remarks">{{ $form->remarks }}</td></tr>
      <tr><th><label for="created_user_id">初回登録者</label></th><td class="created_user_id" name="created_user_id" type="number">{{ $form->created_user_id }}</td></tr>
      <tr><th><label for="updated_user_id">更新登録者</label></th><td class="updated_user_id" name="updated_user_id" type="number">{{ $form->updated_user_id }}</td></tr>
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