<?php

class iosReceiver2 extends \BaseController
{
    public static function showtransfer($f)
    {
        $file_db = new PDO('sqlite:' . $f);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $file_db->query('SELECT * FROM transfer;');
       foreach ($result as $m) {
           $d = new Datafromio();
           $d->tanto = $m["tantoID"];
           $d->goodsTitle = $m["goodsTitle"];
           $d->kosu = $m["kosu"];
           $d->time = $m["time"];
           $d->receiptNo = $m["receiptNo"];
           $d->tableNO = $m["tableNO"];
           $d->save();

           $i = Item::where('title', $d->goodsTitle)->first();

           $r = new ReceiptLine();
           $r->tantoID = $m["tantoID"];
           $r->goodsTitle = $m["goodsTitle"];
           $r->kosu = $m["kosu"];
           $r->time = $m["time"];
           $r->receiptNo = $m["receiptNo"];
           $r->tableNO = $m["tableNO"];
           $r->price = $i->price;
           $r->save();
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
