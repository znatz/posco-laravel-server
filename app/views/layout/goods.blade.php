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
            ;

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


            $('#recognitionStartButton').click(function () {
                recognitionFormControl(true);
                recognition.lang = "ja-JP";

                recognition.start();
            });
            $('#recognitionStopButton').click(function () {
                recognitionFormControl(false);

                recognition.stop();
            });


            function submitID(text) {
                window.console.log("called :" + text);
                index = text.substring(0, 1);
                window.console.log(index);

                speakUp(index + "番、了解しました。");
                $("input[value=" + index + "]").attr('checked', 'checked');
                $('#item_form').submit();

            }

            function clearForm() {
                window.console.log("clear");
                speakUp("フォームをクリアします。");
                $('input[name="clearForm"]').click();
            }

            recognition.onresult = function (e) {
                var results = e.results;
                for (var i = e.resultIndex; i < results.length; i++) {
                    if (results[i].isFinal) {
                        if (results[i][0].transcript.substring(1, 2) == "番") submitID(results[i][0].transcript);
                        if (results[i][0].transcript.indexOf("クリア") != -1) clearForm();
                        $('input[type="search"]').val(results[i][0].transcript).removeClass('isNotFinal');
                        $('input[type="search"]').keyup();
                        var confidence = results[i][0].confidence;
                        $('#messageArea').html(
                                "<p>state: onresult<br>" +
                                "confidence: " + confidence + "</p>"
                        );

                    } else {
                        $('#recognitionText').val(results[i][0].transcript).addClass('isNotFinal');
                    }
                }
            };

            function recognitionFormControl(start) {
                if (start) {
                    speakUp("どうぞ、しゃべってください。");
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
</div>
</body>
</html>