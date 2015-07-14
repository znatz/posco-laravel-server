<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3"/>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{HTML::style(asset('css/bootstrap.min.css'))}}
    {{HTML::script(asset('js/bootstrap.min.js'))}}
    <title>HandyPOSサーバー</title>
</head>
<body>
<div class="container">
    @include('layout.navbar')
    @yield('contents')
    @yield('contents2')
</div>
</body>
</html>