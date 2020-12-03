<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/master.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset(@yield('stylesheet'))}}"> --}}
  @yield('stylesheet')
</head>
<body>
  <header class="ly_header">
    <div class="ly_header_inner">
      <div class="bl_header_ttl">
        <h1>Growell</h1>
      </div>
      <!-- /.bl_header_ttl -->
      <ul class="bl_header_list">
        <li>TVカレンダー</li>
        <li>各種登録</li>
        <li>過去データ検索</li>
      </ul>
      <div class="bl_header_auth">
        <h1>ログイン</h1>
      </div>
      <!-- /.bl_header_auth -->
    </div>
    <!-- /.ly_header_inner -->
  </header>
  <main>
    <div class="ly_content">
      <h1>@yield('title')</h1>
      @yield('content')
    </div>
    <!-- /.ly_content -->
  </main>
  <footer>
    <div class="ly_footer">
      <div class="ly_footer_inner">
        <small class="el_footerCopyright">© 2020 Growell Co. Ltd.</small>
      </div>
      <!-- /.ly_footer_inner -->
    </div>
    <!-- /.ly_footer -->
  </footer>
</body>
</html>