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
<div class="container">
@include('layout.navbar')
    <div class="row well well-lg">
        <div class="col-xs-7">
            @yield('contents')
        </div>
        <div class="col-xs-3">
            @yield('contents2')
        </div>
    </div>
     <div class="row well well-lg">
        <div class="col-xs-3">
            @yield('contents3')
        </div>
        <div class="col-xs-7">
            @yield('contents4')
        </div>
    </div>
</div>
</body>
</html>