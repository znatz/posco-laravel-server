<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{HTML::style(asset('css/bootstrap.css'))}}
{{--    {{HTML::style(asset('css/bootstrap-table.css'))}}--}}
    {{HTML::script(asset('js/bootstrap.js'))}}
{{--    {{HTML::script(asset('js/bootstrap-table.js'))}}--}}
{{--    {{HTML::script(asset('js/locale/bootstrap-table-ja-JP.js'))}}--}}
    <title>HandyPOSサーバー</title>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $("input[type='radio']").change(function(){
                $(this).attr('checked', 'checked');
                  $('#item_form').submit();
            });
        });
    </script>
</head>
<body>
<div class="container">
    @include('layout.navbar')
    @include('message.form')
    <div class="row well well-lg">
        <div class="col-md-4">
            @yield('contents4')
        </div>
        <div class="col-md-8">
            @yield('contents5')
        </div>
    </div>
</div>
</body>
</html>