<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="./css/blended_layout.css">
    <link rel="stylesheet" type="text/css" href="./css/search.css">
    <title>POSCO IOS</title>
    <style>
        input {
            height: 50px;
        }

        .form_label {
            display: inline-block;
            width:100px;
        }

    </style>
<body>
<section>
    <form method="POST">
        <fieldset>
            <label class="form_label" for="id"> ID : </label><input type="text" name="id" size="100"/> <br/>
            <label class="form_label" for="name">担当者 :　</label><input type="text" name="name" size="100"/><br/>
            <input type="submit" name="submit" value="追加"/>
            <input type="submit" name="clearTransfer" value="注文記録を消す"/>
        </fieldset>
    </form>
    <?php

    if(isset($_POST["submit"])) {
        Employee::store($_POST['name']);
    }

        $es = Employee::all();
    ?>
 <dl>
        @foreach ($es as $e)
                <dt>Tanto</dt>
                <dd>{{ $e->name }}</dd>
        @endforeach
  </dl>
</section>
</body></html>
