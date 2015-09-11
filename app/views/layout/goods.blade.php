<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/tab_icon.png">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    {{HTML::style("http://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css")}}
    {{HTML::style(asset('css/bootstrap.css'))}}
    {{--    {{HTML::style(asset('css/bootstrap-table.css'))}}--}}
    {{HTML::script(asset('js/bootstrap.js'))}}
    {{--    {{HTML::script(asset('js/bootstrap-table.js'))}}--}}
    {{--    {{HTML::script(asset('js/locale/bootstrap-table-ja-JP.js'))}}--}}
    <title>HandyPOSサーバー</title>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $("input[type='radio']").change(function () {
                $(this).attr('checked', 'checked');
                $('#item_form').submit();
            });
            $('.pop').on('click', function () {
                $('.imagepreview').attr('src', $(this).children().attr('src'));
                $('#imagemodal').modal('show');
            });

//            Suppress warning from datatable
            window.alert = (function () {
                var nativeAlert = window.alert;
                return function (message) {
                    window.alert = nativeAlert;
                    message.indexOf("DataTables warning") === 0 ?
                            console.warn(message) :
                            nativeAlert(message);
                }
            })();
            $('#myTable').DataTable({
                "autoWidth": false,
                "aaSorting": [],
                "bSort": false,
                "language": {
                    "sProcessing": "処理中...",
                    "sLengthMenu": "_MENU_ 件表示",
                    "sZeroRecords": "データはありません。",
                    "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
                    "sInfoEmpty": " 0 件中 0 から 0 まで表示",
                    "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                    "sInfoPostFix": "",
                    "sSearch": "キーワード検索:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "先頭",
                        "sPrevious": "前",
                        "sNext": "次",
                        "sLast": "最終"
                    }
                }
            });


            if (!('webkitSpeechRecognition' in window)) {
                $('#messageArea').html(
                        "<p>webkitSpeechRecognitionが見つかりません。PC版のChromeで試してみてください。</p>"
                );
                return;
            } else {
                $('#messageArea').html(
                        "<p>音声認識できるブラウザーです。</p>"
                );
            }


            if (!('SpeechSynthesisUtterance' in window)) {
                $('#messageArea').html(
                        "<p>SpeechSynthesisUtteranceが見つかりません。PC版のChromeで試してみてください。</p>"
                );
                return;
            } else {
                $('#messageArea').html(
                        "<p>音声認識できるブラウザーです。</p>"
                );
            }

            var recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;

            recognitionFormControl(false);


            function speakUp(text) {
                var synthes = new SpeechSynthesisUtterance();
                synthes.voiceURI = 'native';
                synthes.volume = 1;
                synthes.rate = 1;
                synthes.pitch = 1;
                synthes.text = text;
                synthes.lang = 'ja-JP';
//                synthes.onend = function (e) {
//                    alert('Finished in ' + event.elapsedTime + ' seconds.');
//                };
                speechSynthesis.speak(synthes);
            }

            recognition.lang = "ja-JP";
            recognition.start();

            $('#recognitionStartButton').click(function () {
                recognitionFormControl(true);
                recognition.lang = "ja-JP";
                recognition.start();
            });
            $('#recognitionStopButton').click(function () {
                recognitionFormControl(false);
                recognition.stop();
            });


            var chnToNum = {
                "一":1,
                "二":2,
                "三":3,
                "四":4,
                "五":5,
                "ご":5,
                "六":6,
                "七":7,
                "八":8,
                "九":9,
                "十":10,
                "十一":11,
                "十二":12
            };
            function submitID(text) {
                window.console.log("called :" + text);
                index = text.substring(0, 1);

                if (chnToNum.hasOwnProperty(index)) index = chnToNum[index];
                window.console.log("index : " + index);
                window.console.log ($("input[value=" + index + "]").length);
                if ($("input[value=" + index + "]").length) {
                    speakUp(index + "番、了解しました。");
                } else {
                    speakUp(index + "番、ありません。");
                }
                $("input[value=" + index + "]").attr('checked', 'checked');
                $('#item_form').submit();
            }

            function submitID2(text) {
                window.console.log("called :" + text);
                index = text.substring(0, 2);

                if (chnToNum.hasOwnProperty(index)) index = chnToNum[index];
                window.console.log("index : " + index);
                window.console.log ('input[value=' + index + ']');
                window.console.log ($("input[value=" + index + "]").length);
                if ($("input[value=" + index + "]").length) {
                    speakUp(index + "番、了解しました。");
                } else {
                    speakUp(index + "番、ありません。");
                }
                $("input[value=" + index + "]").attr('checked', 'checked');
                $('#item_form').submit();
            }

            function clearForm() {
                window.console.log("clear");
                speakUp("フォームをクリアします。");
                $('input[name="clearForm"]').click();
            }

            function changeSearch(text) {
                window.console.log("Search : " + text);
                $('input[type="search"]').val(text);
                $('input[type="search"]').keyup();
            }

            function setFocus(name) {
                $('input[name="' + name + '"').focus();
            }

            recognition.onresult = function (e) {
                var results = e.results;
                for (var i = e.resultIndex; i < results.length; i++) {
//                    if (results[i].isFinal) {
                    count = 1;
                    if (results[i].length > 0) {
                        window.console.log(results[i][0].transcript);
                        transcript = results[i][0].transcript;
                        if (transcript.substring(1, 2) == "番") {
                            submitID(transcript);
                        } else if (transcript.substring(2, 3) == "番") {
                            submitID2(transcript);
                        } else if (transcript.substring(1, 3) == "ばん") {
                            submitID(transcript);
                        } else if (transcript.indexOf("クリア") != -1) {
                            clearForm();
                        } else if (transcript.indexOf("けして") != -1 || transcript.indexOf("決して") != -1) {
                            changeSearch("");
                        } else if (transcript.indexOf("商品名") != -1) {
                            setFocus("title");
                        } else if (transcript.indexOf("価格") != -1) {
                            setFocus("price");
                        } else if (transcript.indexOf("原価") != -1) {
                            setFocus("genka");
                        } else if (transcript.indexOf("部門") != -1) {
                            setFocus("Bumon");
                        } else if (transcript.indexOf("個数") != -1) {
                            setFocus("Kosu");
                        } else if (transcript.indexOf("探して") != -1) {
                            transcript = transcript.replace("探して","");
                            transcript = transcript.replace("を","");
                            changeSearch(transcript);
                        }
                        var confidence = results[i][0].confidence;
                        $('#messageArea').html(
                                "<p>state: onresult<br>" +
                                "confidence: " + confidence + "</p>"
                        );

                    } else {
                        $('input[type="search"]').val(results[i][0].transcript).addClass('isNotFinal');
                    }
                }
            };
/*

            recognition.onsoundstart = function () {
                speakUp("認識開始");
            };
*/

            recognition.onsoundend = function () {
                speakUp("認識終了");
            }
            recognition.onend = function (e) {
                recognition.start();
            };

            function recognitionFormControl(start) {
                if (start) {
                    speakUp("ご用件どうぞ。");
                    $('#recognitionStartButton').attr('disabled', 'true');
                    $('#recognitionStopButton').attr('disabled', 'false');
                    $('#recognitionStopButton').removeAttr('disabled');
                } else {
                    $('#recognitionStopButton').attr('disabled', 'true');
                    $('#recognitionStartButton').attr('disabled', 'false');
                    $('#recognitionStartButton').removeAttr('disabled');
                }
            }

        });
    </script>
</head>
<body>
<div class="container">
    @include('layout.navbar')
    <div class="row well well-lg">
        @section('lightbox')
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <img src="" class="imagepreview" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        @show
        <div class="col-md-4">
            @yield('contents4')
        </div>
        <div class="col-md-8">
            @yield('contents5')
        </div>
    </div>
    <div class="text-center">
        {{ QrCode::size(100)->generate(Request::url()); }}
        <p>この画面のアドレス</p>
    </div>
</div>
</body>
</html>