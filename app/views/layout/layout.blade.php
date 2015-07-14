<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{HTML::style(asset('css/bootstrap.min.css'))}}
    {{HTML::script(asset('js/bootstrap.min.js'))}}
    <title>HandyPOSサーバー</title>
</head>
<body>
@yield('contents')
</body>
</html>