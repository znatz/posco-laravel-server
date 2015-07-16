<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{HTML::style(asset('css/bootstrap.css'))}}
    {{HTML::script(asset('js/bootstrap.js'))}}
    <title>HandyPOSサーバー</title>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $("input[type='radio']").change(function () {
                $(this).attr('checked', 'checked');
                $('#item_form').submit();
            });
        });
    </script>
</head>
<body>
<div class="container">
    @include('layout.navbar')
    <div class="well center-block text-center well">
        @yield('contents')
    </div>
</div>
</body>
</html>