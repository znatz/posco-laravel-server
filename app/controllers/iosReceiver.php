<?php

class iosReceiver extends \BaseController
{

    public function index()
    {
        $file = basename($_FILES['file']['name']);
        $uploadfile = $_POST['tanto'] . $file;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo $file;
        } else {
            echo "error";
        }

    }

}
