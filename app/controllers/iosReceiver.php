<?php

class iosReceiver extends \BaseController
{
    public static function showtransfer($f)
    {
        $file_db = new PDO('sqlite:' . $f);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $file_db->query('SELECT * FROM transfer;');
        /*
        1. Clear all old data of receiptlines before sending to clien
        2. Datafromio when deleted, set it to receipt line
        */

        foreach ($result as $m) {
            $r = new Receiptrecord();
            $r->tantoID     = $m["tantoID"];
            $r->goodsTitle  = $m["goodsTitle"];
            $r->kosu        = $m["kosu"];
            $r->orderTime   = $m["time"];
            $r->receiptNo   = $m["receiptNo"];
            $r->tableNO     = $m["tableNO"];
            $r->progress    = "受注済み";
            $r->price       = 0;
            $r->serveTime   = "";
            $r->paymentTime = "";
            $r->payment_id  = 0;
            $r->save();
        }

        $file_db = new PDO('sqlite:' . $f);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $file_db->query('SELECT * FROM transfer;');
        foreach ($result as $m) {
            $d = new Datafromio();
            $d->tanto       = $m["tantoID"];
            $d->goodsTitle  = $m["goodsTitle"];
            $d->kosu        = $m["kosu"];
            $d->time        = $m["time"];
            $d->receiptNo   = $m["receiptNo"];
            $d->tableNO     = $m["tableNO"];
            $d->save();

        }
        unlink($f);
    }

    public function index()
    {
        $file = basename($_FILES['file']['name']);
        $uploadfile = $_POST['tanto'] . $file;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo $file;
        } else {
            echo "error";
        }


        self::showtransfer($uploadfile);

    }

}
