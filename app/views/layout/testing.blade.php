<?php
$str = file_get_contents("php://input");
file_put_contents("/tmp/upload.jpg", pack("H*", $str));?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/tab_icon.png">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{HTML::style(asset('css/bootstrap.css'))}}
    {{HTML::script(asset('js/bootstrap.js'))}}
    {{HTML::script(asset('js/jquery.webcam.min.js'))}}
    {{HTML::script(asset('js/jquery.webcam.js'))}}
    <title>HandyPOSサーバー</title>
    <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery("#webcam").webcam({

                width: 320,
                height: 240,
                mode: "callback",
                swffile: "./jscam_canvas_only.swf", // canvas only doesn't implement a jpeg encoder, so the file is much smaller

                onTick: function(remain) {

                    if (0 == remain) {
                        jQuery("#status").text("Cheese!");
                    } else {
                        jQuery("#status").text(remain + " seconds remaining...");
                    }
                },

                onSave: function(data) {

                    var col = data.split(";");
                    // Work with the picture. Picture-data is encoded as an array of arrays... Not really nice, though =/
                },

                onCapture: function () {
                    webcam.save("/test.php");

                    // Show a flash for example
                },

                debug: function (type, string) {
                    // Write debug information to console.log() or a div, ...
                },

                onLoad: function () {
                    // Page load
                    var cams = webcam.getCameraList();
                    for(var i in cams) {
                        jQuery("#cams").append("<li>" + cams[i] + "</li>");
                    }
                }
            });

            $("#save").on("click",function(){
                webcam.onCapture();
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