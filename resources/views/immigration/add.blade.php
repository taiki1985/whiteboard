@extends('layouts.register')

@section('title', 'Immigration')

@section('form')
  <table>
    <tbody>
      <form action="/immigration/add" method="post">
        {{ csrf_field() }}
        <tr><th><label for="name_jpn">名前</label></th><td><input class="name_jpn" name="name_jpn" type="text" value="{{ old('name_jpn') }}"></td></tr>
        @if ($errors->has('name_jpn'))
        <tr><th>ERROR</th><td>{{ $errors->first('name_jpn') }}</td></tr>
        @endif
        <tr><th><label for="name_eng">名前(英語)</label></th><td><input class="name_eng" name="name_eng" type="text" value="{{ old('name_eng') }}"></td></tr>
        @if ($errors->has('name_eng'))
        <tr><th>ERROR</th><td>{{ $errors->first('name_eng') }}</td></tr>
        @endif
        <tr><th><label for="jurisdiction">管轄</label></th><td><input class="jurisdiction" name="jurisdiction" type="text" value="{{ old('jurisdiction') }}"></td></tr>
        @if ($errors->has('name'))
        <tr><th>ERROR</th><td>{{ $errors->first('jurisdiction') }}</td></tr>
        @endif
        <tr><th><label for="postcode">郵便番号</label></th><td><input class="postcode" name="postcode" type="text" value="{{ old('postcode') }}"></td></tr>
        @if ($errors->has('postcode'))
        <tr><th>ERROR</th><td>{{ $errors->first('postcode') }}</td></tr>
        @endif
        <tr><th><label for="address">住所</label></th><td> <textarea class="address" name="address" value="{{ old('address') }}"></textarea></td></tr>
        @if ($errors->has('address'))
        <tr><th>ERROR</th><td>{{ $errors->first('address') }}</td></tr>
        @endif
        <tr><th><label for="tel">電話番号</label></th><td> <input class="tel" name="tel" type="text" value="{{ old('tel') }}"></td></tr>
        @if ($errors->has('tel'))
        <tr><th>ERROR</th><td>{{ $errors->first('tel') }}</td></tr>
        @endif
        <tr><th><label for="short_num">短縮</label></th><td> <input class="short_num" name="short_num" type="text" value="{{ old('short_num') }}"></td></tr>
        @if ($errors->has('short_num'))
        <tr><th>ERROR</th><td>{{ $errors->first('short_num') }}</td></tr>
        @endif
        <tr><th><label for="fax">FAX番号</label></th><td><input class="fax" name="fax" type="text" value="{{ old('fax') }}"></td></tr>
        @if ($errors->has('fax'))
        <tr><th>ERROR</th><td>{{ $errors->first('fax') }}</td></tr>
        @endif
        <tr><th><label for="email">Eメール</label></th><td><input class="email" name="email" type="text" value="{{ old('email') }}"></td></tr>
        @if ($errors->has('email'))
        <tr><th>ERROR</th><td>{{ $errors->first('email') }}</td></tr>
        @endif
        <tr><th><label for="remarks">備考</label></th><td> <textarea class="remarks" name="remarks" value="{{ old('remarks') }}"></textarea></td></tr>
        <tr><th><label for="created_user_id">初回登録者</label></th><td><input class="created_user_id" name="created_user_id" type="number" value="{{ old('created_user_id') }}"></td></tr>
        <tr><th><label for="updated_user_id">更新登録者</label></th><td><input class="updated_user_id" name="updated_user_id" type="number" value="{{ old('updated_user_id') }}"></td></tr>
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