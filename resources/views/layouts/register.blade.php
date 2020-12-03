<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
  <header>
    <div class="header-section">
      <div class="container">
      </div>
    </div>
  </header>
  <div class="container">
    
    <div class="title-section">
      <h1>@yield('title')</h1>
    </div>

    <div class="table-section">
      @yield('table')
    </div>

    <div class="confirmation-section">
      @yield('confirmation')
    </div>

    <div class="form-section">
      @yield('form')
    </div>

    <div class="btn toppage">
      <a href="#">トップページ</a>
    </div>

  </div>

</body>
</html>