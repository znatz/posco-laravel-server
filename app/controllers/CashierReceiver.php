<?php

class CashierReceiver extends \BaseController
{
    public static function logToReceiptRecords($f)
    {
        $file_db = new PDO('sqlite:' . $f);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $file_db->query('SELECT * FROM transactions;');
        $receiptNO = "";
        foreach ($result as $m) {
            $receiptNo = $m["receiptNo"];

        }

        $receiptRecords = Receiptrecord::where(['receiptNo' => $receiptNo, 'progress' => '提供済み'])->get();
        foreach ($receiptRecords as $receiptRecord) {
            $receiptRecord->payment_id = $m['payment_id'];
            $receiptRecord->progress = "支払い済み";
            $receiptRecord->save();
        }
        $receiptlines = ReceiptLine::where('receiptNo', $receiptNo)->get();
        foreach ($receiptlines as $receiptline) {
            ReceiptLine::destroy($receiptline->id);
        }

        $file_db = new PDO('sqlite:' . $f);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $file_db->query('SELECT * FROM payments;');
        foreach ($result as $m) {
            $payment = new Payment();
            $payment->price = $m["price"];
            $payment->payment = $m["payment"];
            $payment->changes = $m["changes"];
            $payment->time = $m["time"];
            $payment->uuid = $m["uuid"];
            $payment->save();
        }

//        unlink($f);
    }

    public function index()
    {
        $file = basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
            echo $file;
        } else {
            echo "error";
        }


        self::logToReceiptRecords($file);

    }

    /*
     *
     class CashierReceiver extends \BaseController {


        public function index()
        {
            $file = basename($_FILES['file']['name']);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
                echo $file;
            } else {
                echo "error";
            }

        }

        public function create()
        {
            //
        }

        public function store()
        {
            //
        }

        public function show($id)
        {
        }


        public function edit($id)
        {
        }


        public function update($id)
        {
        }


        public function destroy($id)
        {
        }

    */
}