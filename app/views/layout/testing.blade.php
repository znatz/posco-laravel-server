<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/tab_icon.png">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{HTML::style(asset('css/bootstrap.css'))}}
    {{HTML::script(asset('js/bootstrap.js'))}}
    <title>HandyPOSサーバー</title>
    <script type="text/javascript">
        jQuery(document).ready(function () {


            $("#save").click(function () {
                var hostUrl = '{{URL::route('testing.receiver')}}';
                $.ajax({
                    url: hostUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: {img: document.getElementById('img').src},
                    timeout: 10000,
                    success: function (data) {
                        alert(data);
                        if (data.indexOf("Male") != -1) alert("男だね！");
                        if (data.indexOf("Female") != -1) alert("女だね！");

//                        window.console.log(data["face"][0]["attribute"]["age"]);
                        var age;
                        var gender;
                        var glass;
                        $.each($.parseJSON(data), function (i1, v1) {
                            if (i1 == "face") {
                                $.each(v1, function (i2, v2) {
                                    if (i2 == "0") {
                                        $.each(v2, function (i3, v3) {
                                            window.console.log("i3 " + i3 + " v3 " + v3);
                                            $.each(v3, function (item, value) {
                                                window.console.log("item " + item + " value " + value);
                                                if (item == "age") {
                                                    age = value["value"];
                                                    $('#age').val(age);
                                                    window.console.log("age : " + age);
                                                }
                                                if (item == "gender") {
                                                    gender = value["value"];
                                                    if(gender=="Female") gender = "女性";
                                                    if(gender=="Male") gender = "男性";
                                                    $('#gender').val(gender);
                                                    window.console.log("gender : " + gender);
                                                }
                                                if (item == "glass") {
                                                    glass = value["value"];
                                                    if(glass=="none") glass = "無し";
                                                    if(glass!="none") glass = "有り";
                                                    $('#glass').val(glass);
                                                    window.console.log("glass : " + glass);
                                                }
                                            });
                                        });
                                    }
                                });
                            }
                        });
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("error");
                    }
                });
            })
            ;

            var video = document.getElementById('video');
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');
            var localMediaStream = null;

            //カメラ使えるかチェック
            var hasGetUserMedia = function () {
                return (navigator.getUserMedia || navigator.webkitGetUserMedia ||
                navigator.mozGetUserMedia || navigator.msGetUserMedia);
            };

            //エラー
            var onFailSoHard = function (e) {
                console.log('エラー!', e);
            };

            //カメラ画像キャプチャ
            var snapshot = function () {
                if (localMediaStream) {
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    document.getElementById('img').src = canvas.toDataURL('image/png');
                }
            };

            if (hasGetUserMedia()) {
                console.log("カメラ OK");
            } else {
                alert("未対応ブラウザです。");
            }

            window.URL = window.URL || window.webkitURL;
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
                    navigator.mozGetUserMedia || navigator.msGetUserMedia;
            navigator.getUserMedia({video: true}, function (stream) {
                video.src = window.URL.createObjectURL(stream);
                localMediaStream = stream;
            }, onFailSoHard);

            $("#capture").click(function () {
                snapshot();
                $('#capture_images').hidden = false;
                $("#save").click();
            });
            $("#stop").click(function () {
                localMediaStream.stop();
            });
            $("video").click(function () {
                snapshot();
                $('#capture_images').hidden = false;
            });

        })
        ;
    </script>
</head>
<body>
<div class="container">
    @include('layout.navbar')
    <div class="well center-block text-center well">
        {{--<video id="video" autoplay width="640" height="480"></video>--}}
        @yield('contents')
    </div>
</div>
</body>
</html>